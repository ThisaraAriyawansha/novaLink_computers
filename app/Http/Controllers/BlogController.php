<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    // Show all blogs
    public function addBlog()
    {
        return view('admin.addBlog');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string|max:255',
            'date' => 'nullable|date',
            'image_path' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            // Get the uploaded file
            $image = $request->file('image_path');
            
            // Generate a random unique name without original name
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('BlogImages'), $imageName);
    
            // Get the image URL (store relative path)
            $imagePath = 'BlogImages/' . $imageName;
        }

        // Save to database
        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tags,
            'date' => $request->date ?? now(),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Blog added successfully!');
    }

    // Show all blogs
    public function manageBlog(Request $request)
    {
        $search = $request->input('search');
    
        $blogs = Blog::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(5); // Paginate 5 per page
    
        return view('admin.manageBlog', compact('blogs'));
    }
    


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.updateBlog', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string|max:255',
            'date' => 'nullable|date',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        // Handle image upload if a new image is provided
        $imagePath = $blog->image; // Keep existing image by default
        if ($request->hasFile('image_path')) {
            // Delete old image if it exists
            if (file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            // Upload new image
            $image = $request->file('image_path');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('BlogImages'), $imageName);
            $imagePath = 'BlogImages/' . $imageName;
        }

        // Update blog in database
        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tags,
            'date' => $request->date ?? now(),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Blog updated successfully!');
    }
    
}
