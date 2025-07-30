<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductFeature;
use App\Models\Product;


class ProductFeatureController extends Controller
{
    public function addFeature()
    { 
        $product = Product::all(); 
        return view('admin.addFeature', compact('product'));
    }

    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'productid' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        try {
            // Insert data into the table
            $feature = ProductFeature::create([
                'product_id' => $request->productid,
                'feature_name' => $request->name,
                'feature_value' => $request->value,
            ]);

            // Log the created feature for debugging
            \Log::info('Feature created:', $feature->toArray());

            // Redirect with success message
            return redirect()->back()->with('success', 'Feature added successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error creating feature:', ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function showFeatures($id)
    {
        // Fetch the product
        $product = Product::find($id);
        
        // Fetch the product's features with pagination
        $features = ProductFeature::where('product_id', $id)->paginate(10); // Adjust pagination number as needed
    
        // Return the view with the product and its features
        return view('admin.manageFeature', compact('product', 'features'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'feature_name' => 'required|string|max:255',
            'feature_value' => 'required|string|max:255',
        ]);

        // Find the feature by ID
        $feature = ProductFeature::findOrFail($id);

        // Update the feature details
        $feature->feature_name = $request->input('feature_name');
        $feature->feature_value = $request->input('feature_value');
        $feature->save();

        // Return a success response
        return response()->json(['success' => true]);
    }
    
    public function deleteFeature($id)
    {
        try {
            // Find the feature by ID
            $feature = ProductFeature::find($id);

            // Check if the feature exists
            if ($feature) {
                // Delete the feature
                $feature->delete();

                // Return a success response
                return response()->json(['success' => true]);
            }

            // Return error if feature is not found
            return response()->json(['success' => false, 'error' => 'Feature not found']);

        } catch (\Exception $e) {
            // Catch any errors and return error response
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

}
