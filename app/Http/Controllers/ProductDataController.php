<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductTag;
use App\Models\ProductStatus;
use Illuminate\Support\Str;

use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;
use Symfony\Component\HtmlSanitizer\HtmlSanitizer;

class ProductDataController extends Controller
{
    // Display All Products
    public function index()
    {
        $products = Product::with(['features', 'tags', 'status'])->get();
        return response()->json($products);
    }

    // Store a New Product

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'discounted_price' => 'required|numeric',
            'retail_price' => 'required|numeric',
            'warranty' => 'required|string',
            'in_stock' => 'required|string',
            'qty' => 'required|integer',
            'deal_start' => 'nullable|date',
            'deal_end' => 'nullable|date',
            'image_path' => 'required|image|mimes:jpeg,jpg,png,webp|max:10240',
            'tags' => 'nullable|string|max:255', // Added validation for tags
        ]);

        // Create a sanitizer configuration
        $config = (new HtmlSanitizerConfig())
            ->allowSafeElements() // Allows common safe HTML elements (e.g., <p>, <strong>, <ul>)
            ->allowElement('img', ['src', 'alt', 'title']) // Allow <img> with specific attributes
            ->allowElement('a', ['href', 'title', 'target']) // Allow <a> with specific attributes
            ->allowElement('table', []) // Allow <table>
            ->allowElement('tr', []) // Allow <tr>
            ->allowElement('td', []) // Allow <td>
            ->allowElement('th', []) // Allow <th>
            ->allowElement('code', []) // Allow <code>
            ->allowElement('pre', []); // Allow <pre>

        // Create a sanitizer instance
        $sanitizer = new HtmlSanitizer($config);

        // Sanitize the description
        $cleanDescription = $sanitizer->sanitize($request->input('description'));

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('ProductImages'), $imageName);
            $imagePath = 'ProductImages/' . $imageName;
        }

        // Create a new product
        $product = new Product([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'type' => $request->input('type'),
            'tags' => $request->input('tags'),
            'description' => $cleanDescription, // Use sanitized description
            'discounted_price' => $request->input('discounted_price'),
            'retail_price' => $request->input('retail_price'),
            'warranty' => $request->input('warranty'),
            'in_stock' => $request->input('in_stock'),
            'qty' => $request->input('qty'),
            'status_id' => 1,
            'image' => $imagePath,
            'deal_start' => $request->input('deal_start'),
            'deal_end' => $request->input('deal_end'),
        ]);

        // Save the product to the database
        $product->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    // Show a Single Product
    public function show($id)
    {
        $product = Product::with(['features', 'tags', 'status'])->find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }


    public function addProduct()
    {
        return view('admin.addProduct');
    }

    public function getProducts()
    {
        // Fetch products with related data (features, tags)
        $products = Product::with(['features', 'tags'])
                           ->where('status_id', 1)  // Only active products (status_id = 1)
                           ->get();

        // Format the response as needed
        $formattedProducts = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'type' => $product->type,
                'tags' => $product->tags,
                'desc' => $product->description,
                'dis_price' => $product->discounted_price . ' LKR',
                'ret_price' => $product->retail_price . ' LKR',
                'features' => $product->features->pluck('feature_name')->toArray(),  // Assuming features have 'feature_name'
                'Warranty' => $product->warranty,
                'in_stock' => $product->in_stock,
                'image' => asset('' . $product->image),  // Adjust path as needed
            ];
        });

        return response()->json($formattedProducts);
    }

    public function manageProduct(Request $request)
    {
        $query = Product::query();
        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }
        $product = $query->paginate(10);
        return view('admin.manageProduct', compact('product'));
    }


    public function updateProductStatus(Request $request)
    {
        $product = Product::find($request->id);

        if ($product) {
            // Get all status IDs and cycle to the next one
            $statuses = ProductStatus::pluck('id')->toArray();
            $currentIndex = array_search($product->status_id, $statuses);
            $newStatusId = $statuses[($currentIndex + 1) % count($statuses)]; // Get next status

            // Update status
            $product->status_id = $newStatusId;
            $product->save();

            return response()->json([
                'success' => true,
                'new_status' => $product->status->status_name
            ]);
        }

        return response()->json(['success' => false]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.productUpdate', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'type' => 'required|string',
            'tags' => 'required|string',
            'description' => 'required|string',
            'discounted_price' => 'required|numeric',
            'retail_price' => 'required|numeric',
            'warranty' => 'required|string',
            'in_stock' => 'required|string',
            'qty' => 'required|integer',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'deal_start' => 'nullable|date',
            'deal_end' => 'nullable|date',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Create a sanitizer configuration
        $config = (new HtmlSanitizerConfig())
            ->allowSafeElements() // Allows common safe HTML elements (e.g., <p>, <strong>, <ul>)
            ->allowElement('img', ['src', 'alt', 'title']) // Allow <img> with specific attributes
            ->allowElement('a', ['href', 'title', 'target']) // Allow <a> with specific attributes
            ->allowElement('table', []) // Allow <table>
            ->allowElement('tr', []) // Allow <tr>
            ->allowElement('td', []) // Allow <td>
            ->allowElement('th', []) // Allow <th>
            ->allowElement('code', []) // Allow <code>
            ->allowElement('pre', []); // Allow <pre>

        // Create a sanitizer instance
        $sanitizer = new HtmlSanitizer($config);

        // Sanitize the description
        $cleanDescription = $sanitizer->sanitize($request->input('description'));

        // Update product details
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->type = $request->type;
        $product->tags = $request->tags;
        $product->description = $cleanDescription; // Use sanitized description
        $product->discounted_price = $request->discounted_price;
        $product->retail_price = $request->retail_price;
        $product->warranty = $request->warranty;
        $product->in_stock = $request->in_stock;
        $product->qty = $request->qty;

        // Handle Image Upload
        if ($request->hasFile('image_path')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('ProductImages'), $imageName);
            $product->image = 'ProductImages/' . $imageName;
        }

        // Update deal start and end dates if provided
        $product->deal_start = $request->has('deal_start') ? $request->deal_start : null;
        $product->deal_end = $request->has('deal_end') ? $request->deal_end : null;

        // Save the updated product
        $product->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function viewMore($id)
    {
        // Fetch the product by ID with images
        $product = Product::with('images')->findOrFail($id);  // Ensure the 'images' method exists on the Product model

        // Fetch the images related to the product with pagination
        $images = $product->images()->paginate(10);

        // Return the view with the product and images data
        return view('admin.viewMore', compact('product', 'images'));
    }

    public function destroy($id)
    {
        $image = ProductImage::find($id);

        if (!$image) {
            return response()->json(['success' => false, 'error' => 'Image not found.'], 404);
        }

        // Delete the image file from storage if it exists
        $imagePath = public_path($image->image_url);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }



}
