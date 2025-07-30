<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductStatus;

class ProductStatusController extends Controller
{
    public function index()
    {
        return response()->json(ProductStatus::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
        ]);

        $status = ProductStatus::create($request->all());

        return response()->json(['message' => 'Status added', 'status' => $status], 201);
    }

    public function show($id)
    {
        $status = ProductStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        return response()->json($status);
    }

    public function update(Request $request, $id)
    {
        $status = ProductStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        $request->validate([
            'status_name' => 'sometimes|string|max:255',
        ]);

        $status->update($request->all());

        return response()->json(['message' => 'Status updated', 'status' => $status]);
    }

    public function destroy($id)
    {
        $status = ProductStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        $status->delete();

        return response()->json(['message' => 'Status deleted']);
    }
}
