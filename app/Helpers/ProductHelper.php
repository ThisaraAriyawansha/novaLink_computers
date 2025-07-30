<?php

namespace App\Helpers;

class ProductHelper
{
    public static function filterProductsByType(array $products, string $type): array
    {
        return array_filter($products, fn($product) => strtolower($product['type']) === strtolower($type));
    }

    public static function searchProductsByName(array $products, string $query): array
    {
        return array_filter($products, fn($product) => stripos($product['name'], $query) !== false);
    }

    public static function filterProductsByPriceRange(array $products, float $minPrice, float $maxPrice): array
    {
        return array_filter($products, function ($product) use ($minPrice, $maxPrice) {
            // Remove commas and convert to float for comparison
            $price = (float) str_replace(',', '', $product['ret_price']);
            return $price >= $minPrice && $price <= $maxPrice;
        });
    }




}