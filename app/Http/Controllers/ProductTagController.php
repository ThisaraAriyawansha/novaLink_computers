<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTag;

class ProductTagController extends Controller
{
    public function index()
    {
        return response()->json(ProductTag::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tag_name' => 'required|string|max:255',
        ]);

        $tag = ProductTag::create($request->all());

        return response()->json(['message' => 'Tag added', 'tag' => $tag], 201);
    }

    public function show($id)
    {
        $tag = ProductTag::find($id);

        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        return response()->json($tag);
    }

    public function update(Request $request, $id)
    {
        $tag = ProductTag::find($id);

        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        $request->validate([
            'tag_name' => 'sometimes|string|max:255',
        ]);

        $tag->update($request->all());

        return response()->json(['message' => 'Tag updated', 'tag' => $tag]);
    }

    public function destroy($id)
    {
        $tag = ProductTag::find($id);

        if (!$tag) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        $tag->delete();

        return response()->json(['message' => 'Tag deleted']);
    }
}
