# NovaLink Computers

NovaLink Computers is a full-stack, multi-vendor e-commerce platform for a computer hardware store, built on **Laravel 10 (PHP 8.1+)**. Alongside standard storefront and admin features, it ships two AI-driven features:

- An **AI sales/support chatbot** (DeepSeek LLM integration with a local rule-based fallback).
- A **"Build My PC" hardware recommender** powered by a standalone Python/Flask machine-learning microservice that predicts a full 5-component PC spec (CPU, RAM, Storage Type, Storage Size, GPU) from a short user survey.

---

## 1. Tech Stack

| Layer            | Technology |
|-------------------|------------|
| Backend framework | Laravel 10, PHP 8.1+ |
| Database          | MySQL (see `DB/*.sql` for schema dumps) |
| Frontend build    | Vite, Blade templates, Bootstrap-based theme (`htdocs/`, `public/`) |
| PDF generation     | barryvdh/laravel-dompdf (invoices) |
| Auth               | Laravel session auth + Sanctum (API tokens) |
| Mail               | Symfony Mailer / PHPMailer (order confirmations, invoices, password reset) |
| Payments           | PayHere payment gateway integration (`CheckOutController`) |
| AI Chatbot         | DeepSeek Chat Completions API (`DeepSeekService`) with DB-backed response caching (`LLMCache`) and offline pattern-matching fallback |
| ML Recommender     | Python 3.11, Flask + Flask-CORS, TensorFlow/Keras, scikit-learn, pandas, NumPy (`python_backend/`) |

---

## 2. Project Structure

```
novaLink_computers/
├── app/
│   ├── Http/Controllers/     # ~34 controllers — storefront, admin, shop-owner, auth, payments, chatbot
│   ├── Models/                # Eloquent models (Product, Order, Shop, Bid, AIConversation, LLMCache, ...)
│   ├── Services/DeepSeekService.php   # LLM chat integration + local fallback
│   ├── Mail/                  # Invoice / order confirmation mailables
│   └── Helpers/ProductHelper.php
├── config/llm.php             # DeepSeek model/API configuration
├── database/migrations/       # Schema (users, shops, listings, tv_types, etc.)
├── routes/web.php, api.php    # Route definitions
├── DB/                        # Raw SQL schema dumps / seed data
├── htdocs/, public/           # Compiled theme assets, uploaded product/blog images
└── python_backend/            # Standalone Flask ML microservice for PC recommendations
    ├── model.py, app.py       # V1
    └── V3/
        ├── app.py, model.py   # V3 — NN + Gradient Boosting + Random Forest ensemble
        └── V3.2/               # V3.2 — production-simplified, Gradient-Boosting-only service
            ├── app.py
            ├── index.html
            ├── model/          # Trained artifacts (.pkl)
            └── digram/         # Architecture diagrams
```

---

## 3. Roles & Core Functionality

The platform has **three primary roles**, enforced via `auth` middleware plus `shop_owner` / `agent` route middleware groups (`routes/web.php`):

### 🛍️ Customer
- Browse/filter products (`ProductController`), view product detail, images, reviews.
- Cart & wishlist (`CartController`), checkout with PayHere payment (`CheckOutController`, `PaymentController`).
- Place bids in live auctions for select listings (`LiveBitController`, `Bid`, `BitOrder` models) and pay for won bids (`CustomerDashboardController::bitPay`).
- Customer dashboard: order history, profile management (`CustomerDashboardController`, `UserController`).
- Leave product reviews (`ReviewController`).
- Use the **AI chatbot** for product advice (`LLMController`) and the **Build My PC** wizard to get AI-recommended hardware specs (`BuildMyPCController`).
- Receive emailed order confirmations and PDF invoices (`InvoiceMail`, `OrderConfirmationMail`).

### 🏪 Shop Owner (Vendor)
Scoped under `shop.*` routes, gated by the `shop_owner` middleware:
- Store setup/profile (`ShopController`, `ShopProfileController`).
- Manage own product catalog, features, and images (`ShopProductController`).
- View and update order fulfillment status for orders containing their products (`ShopOrderController`).
- Manage bid-order payment status for auction sales (`ShopBitOrderController`).
- Moderate/respond to reviews on their products (`ShopReviewController`).
- Vendor-specific dashboard with sales overview (`ShopDashboardController`).

### 🛠️ Admin
Scoped under `admin.*` routes, gated by the `agent` middleware:
- Global dashboard (`DashboardController`).
- Full product CRUD, feature and image management across all shops (`ProductDataController`, `ProductFeatureController`, `ProductImageController`).
- Approve/manage vendor shops (`ShopController::adminIndex/adminCreate/adminStore/adminToggle`).
- Manage customers (`CustomerController`), orders (`OrderController`), and blog content (`BlogController`).
- Moderate reviews platform-wide (`ReviewController::manageReview`).
- Handle authentication, password resets, and login for staff (`AuthController`).

---

## 4. AI Chatbot (DeepSeek Integration)

- `app/Services/DeepSeekService.php` sends conversation context + live product catalog data to the DeepSeek Chat Completions API (`config/llm.php`).
- Responses are cached in the `llm_cache` table (`LLMCache` model) keyed by a hash of the prompt, reducing repeated API cost/latency.
- If the API key is missing or the request fails, the service **falls back to a local, pattern-matching response generator** (`localFallback`) that covers gaming, video editing, laptops, budgets, upgrades, comparisons, and workstation queries using real store inventory — so the chatbot degrades gracefully instead of failing.
- Conversation history is persisted via `AIConversation` / `AIMessage` models and exposed through `LLMController` (`/llm`, `/llm/chat`, `/llm/conversation`).

---

## 5. "Build My PC" — Python ML Recommender (`python_backend/`)

This is the most novel part of the project: a **separate Flask microservice** that predicts a complete hardware build (not just chatbot text) from a structured 8-question survey. Laravel calls it via `BuildMyPCController::proxyPredict()`, which proxies `POST /pc-advisor/predict` to `http://localhost:5000/predict`.

### Why it matters
Instead of a static "budget → template build" mapping, the store uses a model **trained on 6,000+ real user-profile responses** to predict 5 independent hardware targets simultaneously, tailoring the recommendation to job role, daily workload, software used, file sizes, and budget — giving customers (especially non-technical ones) a data-driven starting point before they manually shop the catalog.

### Model evolution
| Version | Location | Approach |
|---|---|---|
| V1 | `python_backend/model.py`, `app.py` | Initial single-model prototype |
| V3 | `python_backend/V3/` | 3-model ensemble: Neural Network (Keras) + Gradient Boosting + Random Forest, probability-averaged per output |
| **V3.2 (current)** | `python_backend/V3/V3.2/` | Production-simplified service using **only the Gradient Boosting models** (best single-model performer, ~83.9% avg accuracy) — drops the Keras NN and Random Forest to reduce inference latency and deployment weight while keeping accuracy competitive with the full ensemble |

### V3.2 — inputs, model, and outputs

**Inputs (survey, `/questions` endpoint):**
`job` role, primary daily `activity`, main `software` used, `workload` intensity (1–5), daily usage `hours`, simultaneous-app usage (`multiApp`), `budget` bracket (LKR), and typical `fileSize` — 8 raw answers expanded into **17 features** (8 base + 9 engineered interaction terms such as `workload_x_budget`, `ram_demand`, `ram_intensity`, `job_x_activity`) and normalized with a fitted `StandardScaler`.

**Model:** 5 independent `HistGradientBoostingClassifier` models (scikit-learn), one per output head, trained on 6,009 cleaned survey rows (80/20 train/test split) with `compute_sample_weight('balanced')` to counteract class imbalance.

**Outputs (`POST /predict`):** for each of the 5 targets below, the API returns the predicted tier, a human-readable component recommendation (looked up from budget-aware name tables in `app.py`), and a confidence percentage:

| Output | Classes | Standalone GB Accuracy |
|---|---|---|
| CPU Tier | Entry-level / Mid-range / High-end+Enthusiast | 83.36% |
| RAM | 8GB or less / 16GB / 32GB+ | 80.87% |
| Storage Type | HDD / eMMC / SSD (SATA vs NVMe chosen by budget) | 88.69% |
| Storage Size | ≤512GB / 1–2TB / 4TB+ | 84.19% |
| GPU Tier | Integrated / Discrete / High-end | 82.61% |

**Serialized artifacts (`V3.2/model/`):** `gb_models.pkl` (the 5 classifiers), `job_encoder.pkl`, `activity_encoder.pkl`, `software_encoder.pkl` (LabelEncoders), `scaler.pkl` (StandardScaler), `label_maps.pkl` (index → label strings), `features.pkl` (feature ordering).

**Endpoints:**
- `GET /questions` — dropdown option sets for the frontend survey form.
- `POST /predict` — accepts survey answers as JSON, returns the 5-component recommendation with confidence scores.
- `GET /` — serves the bundled standalone demo UI (`index.html`).

Full training methodology, dataset stats, architecture diagrams (`digram/`), and per-class classification reports are documented in `python_backend/V3/model_technology.txt`, `presentation_slides_model_training.txt`, and `output.txt`.

---

## 6. Setup

### Laravel app
```bash
composer install
npm install && npm run build   # or `npm run dev` for hot-reload
cp .env.example .env
php artisan key:generate
# configure DB_*, MAIL_*, DeepSeek keys (config/llm.php) and PayHere credentials in .env
php artisan migrate --seed
php artisan serve
```

### Python ML recommender (V3.2)
```bash
cd python_backend/V3/V3.2
pip install -r ../../requirements.txt
python app.py   # runs on http://localhost:5000
```
The Laravel app expects this service reachable at `http://localhost:5000` (see `BuildMyPCController::proxyPredict`); if it's unreachable, `/pc-advisor/predict` returns a 503 and the frontend should handle it gracefully.

---

## 7. Database

Raw schema/seed SQL dumps are provided under `DB/` (`novalink_computers.sql`, `novalink_computers_2.sql`, `novalink_computers_3.sql`) in addition to the Laravel migrations in `database/migrations/`.
