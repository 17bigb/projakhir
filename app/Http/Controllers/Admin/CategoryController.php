<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Admin/Category/Index',[
            'categories' => $categories,
            'search'=> $request->search
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $title = $request->name;
        $category->slug = str($title)->slug();
        if ($request->hasFile('image')) {
            $image = $request->file('image');            
            $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();            
            $image->move('category_image', $uniqueName);            
            $category->image = env('APP_URL').'/category_image/' . $uniqueName;
        }
        if($category->save()){           
            Cache::forget('category_global');
            return redirect()->route('admin.category.index')->with('success', 'Category successfully added.');
        }else{
            return redirect()->back()->with('errors', 'Failed create category');
        }
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $title = $request->name;
        $category->slug = str($title)->slug();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();            
            $image->move('category_image', $uniqueName);            
            $category->image = env('APP_URL').'/category_image/' . $uniqueName;
        }

        $category->update();
        Cache::forget('category_global');
        return redirect()->route('admin.category.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if($category){
            $filePath = public_path('category_image/' . str_replace(env('APP_URL').'/category_image/', '', $category->image));
            if (is_file($filePath)) {
                unlink($filePath);
            }

            $category->delete();
        }
        Cache::forget('category_global');
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }

    public function deleteImage($slug){
        $image = Category::where('slug', $slug)->first();
        if($image){
            $filePath = public_path('category_image/' . str_replace(env('APP_URL').'/category_image/', '', $image->image));
            if (is_file($filePath)) {
                unlink($filePath);
            }

            $image->image = '';
            $image->save();
            return redirect()->route('admin.category.index')->with('success', 'Image deleted successfully');
        }else{
            return redirect()->back()->with('errors', 'Image not found');

        }
    }
}
