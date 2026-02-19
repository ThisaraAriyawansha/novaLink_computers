<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
use App\Models\ProductStatus;

class ShopProductController extends Controller
{
    /** List shop owner's own products */
    public function index(Request $request)
    {
        $query = Product::where('user_id', Auth::id());

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $products = $query->paginate(15)->appends($request->only(['search', 'type']));

        $productTypes = [
            'LAPTOPS', 'ASUS ROG', 'APPLE PRODUCTS', 'GAMING CONSOLE',
            'PROCESSOR', 'MOTHERBOARD', 'RAM', 'GRAPHIC CARDS', 'CASINGS',
            'POWER SUPPLY', 'SSD NVME', 'HARD DISK', 'FANS', 'MONITORS',
            'ANTIVIRUS SOFTWARE', 'KEYBOARDS', 'MOUSE', 'MOUSE PAD',
            'HEADSET', 'SPEAKERS', 'UPS', 'TABLES', 'THERMAL PASTE',
            'COMMERCIAL SOLUTIONS', 'COOLING & LIGHTING', 'STORAGE & NAS',
            'MONITORS & ACCESSORIES', 'OPTICAL DRIVERS & PRINTERS',
            'SPEAKERS & HEADPHONES', 'KEYBOARDS, MOUSE & GAMEPADS',
            'GRAPHICS TABLET / TAB', 'DESKTOP WORKSTATIONS', 'GAMING DESKTOPS',
            'BUDGET DESKTOP COMPUTERS', 'CHAIRS', 'CABLES',
            'LIVE STREAMING & RECORDING', 'EXPANSION CARDS & NETWORKING',
            'GIFT VOUCHER',
        ];

        return view('shop.products.index', compact('products', 'productTypes'));
    }

    /** Show add product form */
    public function create()
    {
        return view('shop.products.create');
    }

    /** Store new product for shop owner */
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'brand'            => 'required|string|max:255',
            'type'             => 'required|string|max:255',
            'description'      => 'required|string',
            'discounted_price' => 'required|numeric',
            'retail_price'     => 'required|numeric',
            'warranty'         => 'required|string',
            'in_stock'         => 'required|string',
            'qty'              => 'required|integer',
            'deal_start'       => 'nullable|date',
            'deal_end'         => 'nullable|date',
            'image_path'       => 'required|image|mimes:jpeg,jpg,png,webp|max:10240',
            'tags'             => 'nullable|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('ProductImages'), $imageName);
            $imagePath = 'ProductImages/' . $imageName;
        }

        $product = Product::create([
            'user_id'          => Auth::id(),
            'name'             => $request->name,
            'brand'            => $request->brand,
            'type'             => $request->type,
            'tags'             => $request->tags,
            'description'      => $request->description,
            'discounted_price' => $request->discounted_price,
            'retail_price'     => $request->retail_price,
            'warranty'         => $request->warranty,
            'in_stock'         => $request->in_stock,
            'qty'              => $request->qty,
            'status_id'        => 1,
            'image'            => $imagePath,
            'deal_start'       => $request->deal_start,
            'deal_end'         => $request->deal_end,
        ]);

        // Save specs/features
        if ($request->has('specs')) {
            foreach ($request->input('specs') as $featureName => $featureValue) {
                if (!is_null($featureValue) && $featureValue !== '') {
                    ProductFeature::create([
                        'product_id'    => $product->id,
                        'feature_name'  => $featureName,
                        'feature_value' => $featureValue,
                    ]);
                }
            }
        }

        return redirect()->route('shop.products.index')->with('success', 'Product added successfully!');
    }

    /** Show edit form */
    public function edit($id)
    {
        $product = Product::with('features')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $existingSpecs = $product->features->pluck('feature_value', 'feature_name')->toArray();

        return view('shop.products.edit', compact('product', 'existingSpecs'));
    }

    /** Update product */
    public function update(Request $request, $id)
    {
        $product = Product::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'name'             => 'required|string|max:255',
            'brand'            => 'required|string|max:255',
            'type'             => 'required|string|max:255',
            'description'      => 'required|string',
            'discounted_price' => 'required|numeric',
            'retail_price'     => 'required|numeric',
            'warranty'         => 'required|string',
            'in_stock'         => 'required|string',
            'qty'              => 'required|integer',
            'image_path'       => 'nullable|image|mimes:jpeg,jpg,png,webp|max:10240',
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('ProductImages'), $imageName);
            $product->image = 'ProductImages/' . $imageName;
        }

        $product->fill([
            'name'             => $request->name,
            'brand'            => $request->brand,
            'type'             => $request->type,
            'tags'             => $request->tags,
            'description'      => $request->description,
            'discounted_price' => $request->discounted_price,
            'retail_price'     => $request->retail_price,
            'warranty'         => $request->warranty,
            'in_stock'         => $request->in_stock,
            'qty'              => $request->qty,
            'deal_start'       => $request->deal_start,
            'deal_end'         => $request->deal_end,
        ])->save();

        // Update specs: delete old, re-insert new
        if ($request->has('specs')) {
            $specNames = array_keys($request->input('specs'));
            $product->features()->whereIn('feature_name', $specNames)->delete();
            foreach ($request->input('specs') as $featureName => $featureValue) {
                if (!is_null($featureValue) && $featureValue !== '') {
                    ProductFeature::create([
                        'product_id'    => $product->id,
                        'feature_name'  => $featureName,
                        'feature_value' => $featureValue,
                    ]);
                }
            }
        }

        return redirect()->route('shop.products.index')->with('success', 'Product updated successfully!');
    }

    /** Change product status */
    public function toggleStatus($id)
    {
        $product = Product::where('user_id', Auth::id())->findOrFail($id);
        $product->status_id = $product->status_id == 1 ? 2 : 1;
        $product->save();
        return back()->with('success', 'Product status updated.');
    }

    // ── Features ──────────────────────────────────────────────────────────────

    /** Show all features for all of this shop's products */
    public function featuresIndex()
    {
        $myProducts = Product::where('user_id', Auth::id())->get();
        $myProductIds = $myProducts->pluck('id');
        $features = ProductFeature::with('product')
            ->whereIn('product_id', $myProductIds)
            ->orderBy('product_id')
            ->paginate(20);
        return view('shop.products.features', compact('features', 'myProducts'));
    }

    /** Add a feature to one of the shop's products */
    public function storeFeature(Request $request)
    {
        $request->validate([
            'product_id'    => 'required|exists:products,id',
            'feature_name'  => 'required|string|max:255',
            'feature_value' => 'required|string|max:255',
        ]);
        // Ensure product belongs to this shop owner
        Product::where('user_id', Auth::id())->findOrFail($request->product_id);

        ProductFeature::create([
            'product_id'    => $request->product_id,
            'feature_name'  => $request->feature_name,
            'feature_value' => $request->feature_value,
        ]);
        return back()->with('success', 'Feature added.');
    }

    /** Update a feature (AJAX) */
    public function updateFeature(Request $request, $id)
    {
        $request->validate([
            'feature_name'  => 'required|string|max:255',
            'feature_value' => 'required|string|max:255',
        ]);
        $feature = ProductFeature::findOrFail($id);
        // Ownership check
        Product::where('user_id', Auth::id())->findOrFail($feature->product_id);

        $feature->update([
            'feature_name'  => $request->feature_name,
            'feature_value' => $request->feature_value,
        ]);
        return response()->json(['success' => true]);
    }

    /** Delete a feature */
    public function deleteFeature($id)
    {
        $feature = ProductFeature::findOrFail($id);
        Product::where('user_id', Auth::id())->findOrFail($feature->product_id);
        $feature->delete();
        return response()->json(['success' => true]);
    }

    // ── Images ────────────────────────────────────────────────────────────────

    /** Show image manager for all of the shop's products */
    public function imagesIndex()
    {
        $myProducts = Product::where('user_id', Auth::id())->with('images')->get();
        return view('shop.products.images', compact('myProducts'));
    }

    /** Upload an image to one of the shop's products */
    public function storeImage(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'required|image|mimes:jpeg,jpg,png,webp|max:10240',
        ]);
        Product::where('user_id', Auth::id())->findOrFail($request->product_id);

        $image = $request->file('image_path');
        $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('OtherImage'), $imageName);

        ProductImage::create([
            'product_id' => $request->product_id,
            'image_path' => 'OtherImage/' . $imageName,
        ]);
        return back()->with('success', 'Image uploaded.');
    }

    /** Delete an image */
    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);
        Product::where('user_id', Auth::id())->findOrFail($image->product_id);

        $fullPath = public_path($image->image_path);
        if (file_exists($fullPath)) unlink($fullPath);

        $image->delete();
        return response()->json(['success' => true]);
    }
}
