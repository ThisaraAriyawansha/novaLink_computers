<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Shop;
use App\Models\User;

class ShopController extends Controller
{
    public function setup()
    {
        $shop = Auth::user()->shop;
        return view('shop.setup', compact('shop'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_name'     => 'required|string|max:255',
            'contact_email' => 'nullable|email',
            'logo'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data = [
            'user_id'       => Auth::id(),
            'shop_name'     => $request->shop_name,
            'location'      => $request->location,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'description'   => $request->description,
        ];

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('ShopImages/logos', 'public');
            $data['logo'] = 'storage/' . $logoPath;
        }

        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('ShopImages/covers', 'public');
            $data['cover_image'] = 'storage/' . $coverPath;
        }

        Shop::updateOrCreate(['user_id' => Auth::id()], $data);

        return redirect()->route('shop.setup')->with('success', 'Shop profile saved successfully!');
    }

    // Admin: list all shops
    public function adminIndex()
    {
        $shops = Shop::with('owner')->paginate(15);
        return view('admin.shops.index', compact('shops'));
    }

    // Admin: show create shop owner form
    public function adminCreate()
    {
        return view('admin.shops.create');
    }

    // Admin: store new shop owner account + shop profile
    public function adminStore(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:8|confirmed',
            'shop_name'     => 'required|string|max:255',
            'location'      => 'nullable|string|max:500',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'description'   => 'nullable|string',
            'logo'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Create user with shop_owner role
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'shop_owner',
        ]);

        $shopData = [
            'user_id'       => $user->id,
            'shop_name'     => $request->shop_name,
            'location'      => $request->location,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'description'   => $request->description,
            'is_active'     => true,
        ];

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('ShopImages/logos', 'public');
            $shopData['logo'] = 'storage/' . $logoPath;
        }

        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('ShopImages/covers', 'public');
            $shopData['cover_image'] = 'storage/' . $coverPath;
        }

        Shop::create($shopData);

        return redirect()->route('admin.shops.index')
            ->with('success', "Shop owner '{$user->name}' created. Login: {$user->email}");
    }

    // Admin: toggle shop active status
    public function adminToggle($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->is_active = !$shop->is_active;
        $shop->save();
        return back()->with('success', 'Shop status updated.');
    }
}
