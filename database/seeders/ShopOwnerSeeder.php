<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Shop;

class ShopOwnerSeeder extends Seeder
{
    public function run(): void
    {
        // ── Shop Owner 1: TechZone Store ──────────────────────────────────────
        $owner1 = User::create([
            'name'     => 'Kasun Perera',
            'email'    => 'kasun@techzone.lk',
            'password' => Hash::make('password'),
            'role'     => 'shop_owner',
        ]);

        Shop::create([
            'user_id'       => $owner1->id,
            'shop_name'     => 'TechZone Store',
            'logo'          => null,
            'cover_image'   => null,
            'location'      => '45 Galle Road, Colombo 03',
            'contact_phone' => '+94 77 123 4567',
            'contact_email' => 'kasun@techzone.lk',
            'description'   => 'Your one-stop shop for the latest laptops, PCs and accessories.',
            'is_active'     => true,
        ]);

        // ── Shop Owner 2: GamersHub ────────────────────────────────────────────
        $owner2 = User::create([
            'name'     => 'Nimali Silva',
            'email'    => 'nimali@gamershub.lk',
            'password' => Hash::make('password'),
            'role'     => 'shop_owner',
        ]);

        Shop::create([
            'user_id'       => $owner2->id,
            'shop_name'     => 'GamersHub LK',
            'logo'          => null,
            'cover_image'   => null,
            'location'      => '12 Duplication Road, Colombo 04',
            'contact_phone' => '+94 76 234 5678',
            'contact_email' => 'nimali@gamershub.lk',
            'description'   => 'Gaming PCs, peripherals, consoles and everything a gamer needs.',
            'is_active'     => true,
        ]);

        // ── Shop Owner 3: ComponentKing ───────────────────────────────────────
        $owner3 = User::create([
            'name'     => 'Thilak Fernando',
            'email'    => 'thilak@componentking.lk',
            'password' => Hash::make('password'),
            'role'     => 'shop_owner',
        ]);

        Shop::create([
            'user_id'       => $owner3->id,
            'shop_name'     => 'ComponentKing',
            'logo'          => null,
            'cover_image'   => null,
            'location'      => '78 Kandy Road, Kadawatha',
            'contact_phone' => '+94 71 345 6789',
            'contact_email' => 'thilak@componentking.lk',
            'description'   => 'Specialist in PC components — CPUs, motherboards, RAM, GPUs and more.',
            'is_active'     => true,
        ]);

        // Add a few sample products for owner1
        $this->seedShopProducts($owner1->id);

        $this->command->info('✓ 3 shop owners + shops seeded. Login: kasun@techzone.lk / password');
    }

    private function seedShopProducts(int $userId): void
    {
        $statusId = DB::table('product_status')->insertGetId(['status_name' => 'Active'])
                    ?: DB::table('product_status')->where('status_name', 'Active')->value('id');

        $products = [
            [
                'user_id'          => $userId,
                'name'             => 'Asus VivoBook 15 Laptop',
                'brand'            => 'Asus',
                'type'             => 'LAPTOPS',
                'tags'             => 'laptop, asus, student',
                'description'      => 'Slim and lightweight 15.6" laptop for everyday computing.',
                'discounted_price' => 189000,
                'retail_price'     => 210000,
                'warranty'         => '1 Year',
                'in_stock'         => 'In Stock',
                'qty'              => 5,
                'status_id'        => 1,
                'image'            => 'ProductImages/placeholder.jpg',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'user_id'          => $userId,
                'name'             => 'Logitech G502 Gaming Mouse',
                'brand'            => 'Logitech',
                'type'             => 'MOUSE',
                'tags'             => 'mouse, gaming, logitech',
                'description'      => 'High-performance gaming mouse with 11 programmable buttons.',
                'discounted_price' => 12500,
                'retail_price'     => 14000,
                'warranty'         => '2 Years',
                'in_stock'         => 'In Stock',
                'qty'              => 20,
                'status_id'        => 1,
                'image'            => 'ProductImages/placeholder.jpg',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insertOrIgnore($product);
        }
    }
}
