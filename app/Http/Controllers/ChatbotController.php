<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function getChatbotProducts()
    {
        $products = Product::with(['features'])
            ->where('status_id', 1)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id ?? 0,
                    'name' => $product->name ?? 'Unknown Product',
                    'type' => $product->type ?? 'Unknown Type',
                    'tags' => $product->tags ? array_map('trim', explode(',', $product->tags)) : [],
                    'desc' => $product->description ?? '',
                    'dis_price' => isset($product->discounted_price) ? number_format($product->discounted_price, 0) . ' LKR' : '0 LKR',
                    'ret_price' => isset($product->retail_price) ? number_format($product->retail_price, 0) . ' LKR' : '0 LKR',
                    'features' => $product->features->pluck('feature')->filter()->toArray(),
                    'warranty' => $product->warranty ?? 'No warranty',
                    'in_stock' => (bool)($product->in_stock ?? false),
                    'image' => $product->image ? asset($product->image) : '/api/placeholder/300/200',
                    'deal_start' => $product->deal_start ?? null,
                    'deal_end' => $product->deal_end ?? null,
                    'created_at' => $product->created_at,
                ];
            });

        return response()->json($products);
    }

    public function getContactDetails()
    {
        return response()->json([
            'phone' => '📞 You can reach us at <span class="text-blue-400 font-semibold">0769417154</span> - we\'re available during business hours!',
            'email' => '📧 Drop us an email at <span class="text-blue-400 font-semibold">novaLinkcomputers@gmail.com</span> - we typically respond within 24 hours!',
            'address' => '📍 Visit our showroom at <span class="text-blue-400 font-semibold">No. 12/B, Galle Road, Matara</span> - come see our products in person!',
            'hours' => '🕒 We\'re open <span class="text-green-400 font-semibold">Monday to Saturday, 9:00 AM - 7:00 PM</span>. Closed on Sundays and public holidays.'
        ]);
    }
}