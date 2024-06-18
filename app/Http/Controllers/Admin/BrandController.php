<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Admin/Brand/Index',[
            'brands' => $brands,
            'search'=> $request->search
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->name = $title = $request->name;
        $brand->slug = str($title)->slug();
        if ($request->hasFile('image')) {
            $image = $request->file('image');            
            $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();            
            $image->move('brand_image', $uniqueName);          
            $brand->image = env('APP_URL').'/brand_image/' . $uniqueName;
        }
        if($brand->save()){          
            Cache::forget('brand_global');
            return redirect()->route('admin.brand.index')->with('success', 'Brand successfully added.');
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
        $brand = Brand::findOrFail($id);
        $brand->name = $title = $request->name;
        $brand->slug = str($title)->slug();
        if ($request->hasFile('image')) {
            $image = $request->file('image');            
            $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move('brand_image', $uniqueName);           
            $brand->image = env('APP_URL').'/brand_image/' . $uniqueName;
        }

        $brand->update();
        Cache::forget('brand_global');
        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if($brand){
            $filePath = public_path('brand_image/' . str_replace(env('APP_URL').'/brand_image/', '', $brand->image));
            if (is_file($filePath)) {
                unlink($filePath);
            }

            $brand->delete();
        }
        Cache::forget('category_global');
        return redirect()->route('admin.brand.index')->with('success', 'Brand deleted successfully.');
    }

    public function deleteImage($slug){
        $image = Brand::where('slug', $slug)->first();
        if($image){
            $filePath = public_path('brand_image/' . str_replace(env('APP_URL').'/brand_image/', '', $image->image));
            if (is_file($filePath)) {
                unlink($filePath);
            }

            $image->image = '';
            $image->save();
            return redirect()->route('admin.brand.index')->with('success', 'Image deleted successfully');
        }else{
            return redirect()->back()->with('errors', 'Image not found');

        }
    }
}
