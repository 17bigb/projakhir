<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return Inertia::render('Admin/Banner/Index',[
            'banners' => $banners,
            'search'=> $request->search
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $banner = new Banner;
        $banner->name = $title = $request->name;
        $banner->slug = str($title)->slug();
        $banner->isActive = $request->isActive;
        if ($request->hasFile('image')) {
            $image = $request->file('image');        
            $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();        
            $image->move('banner_image', $uniqueName);        
            $banner->image = env('APP_URL').'/banner_image/' . $uniqueName;
        }
        if($banner->save()){         
            Cache::forget('banner_global');
            return redirect()->route('admin.banner.index')->with('success', 'Product banner successfully.');
        }else{
            return redirect()->back()->with('errors', 'Failed create product');
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
        $banner = Banner::findOrFail($id);
        $banner->name = $title = $request->name;
        $banner->slug = str($title)->slug();
        $banner->isActive = $request->isActive;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();        
            $image->move('banner_image', $uniqueName);
            $banner->image = env('APP_URL').'/banner_image/' . $uniqueName;
        }

        $banner->update();
        Cache::forget('banner_global');
        return redirect()->route('admin.banner.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        if($banner){
            $filePath = public_path('banner_image/' . str_replace(env('APP_URL').'/banner_image/', '', $banner->image));
            if (is_file($filePath)) {
                unlink($filePath);
            }

            $banner->delete();
        }
        Cache::forget('banner_global');
        return redirect()->route('admin.banner.index')->with('success', 'Banner deleted successfully.');
    }

    public function deleteImage($slug){
        $image = Banner::where('slug', $slug)->first();
        if($image){
            $filePath = public_path('banner_image/' . str_replace(env('APP_URL').'/banner_image/', '', $image->image));
            if (is_file($filePath)) {
                unlink($filePath);
            }

            $image->image = '';
            $image->save();
            return redirect()->route('admin.banner.index')->with('success', 'Image deleted successfully');
        }else{
            return redirect()->back()->with('errors', 'Image not found');

        }
    }
}
