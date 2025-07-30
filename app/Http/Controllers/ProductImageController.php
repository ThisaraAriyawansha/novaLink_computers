<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductImageController extends Controller
{

    public function addImage()
    { 
        $product = Product::all(); 
        return view('admin.addImage', compact('product'));
    }
    

    public function storeImage(Request $request)
    {
        // Validation
        $request->validate([
            'productid' => 'required|exists:products,id',
            'image_path' => 'required|image|mimes:jpeg,jpg,png,webp|max:10240', // Image validation
        ]);
    
        // Handle image upload
        if ($request->hasFile('image_path')) {
            // Get the uploaded file
            $image = $request->file('image_path');
            
            // Generate a random unique name without original name
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('OtherImage'), $imageName);
    
            // Get the image URL (store relative path)
            $imagePath = 'OtherImage/' . $imageName;
        }
    
        // Store the new listing
        ProductImage::create([
            'product_id' => $request->productid,
            'image_path' => $imagePath,
        ]);
    
        // Redirect or return with success message
        return redirect()->back()->with('success', 'Image added successfully!');
    }

    public function getProductImages($productId)
    {
        $images = ProductImage::where('product_id', $productId)->get();
        return response()->json($images);
    }

    public function destroy($id)
    {
        $image = ProductImage::find($id);
    
        if (!$image) {
            return response()->json(['success' => false, 'error' => 'Image not found.'], 404);
        }
    
        $imagePath = public_path($image->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        $image->delete();
    
        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }
    
    

}
