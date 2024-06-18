<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductTableResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::query()
            ->with(['category', 'brand', 'product_images'])
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->OrWhere('description', 'like', '%' . $search . '%')
                    ->OrWhere('price', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('brand', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        $brands = Brand::all();
        $categories = Category::all();

        return Inertia::render('Admin/Product/Index',[
            'products' => $products,
            'brands' => $brands,
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
        $product = new Product;
        $product->title = $title = $request->title;
        $product->slug = str($title)->slug();
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if($product->save()){
            if ($request->hasFile('product_images')) {
                $productImages = $request->file('product_images');
                foreach ($productImages as $image) {                    
                    $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();                    
                    $image->move('product_images', $uniqueName);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => 'product_images/' . $uniqueName,
                    ]);
                }
            }

            return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
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
        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if ($request->hasFile('product_images')) {
            $productImages = $request->file('product_images');            
            foreach ($productImages as $image) {
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            
                $image->move('product_images', $uniqueName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'product_images/' . $uniqueName,
                ]);
            }
        }
        $product->update();
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product){
            $image = ProductImage::where('product_id', $id)->get();
            foreach ($image as $img){
                $filePath = public_path('product_images/' . str_replace('product_images/', '', $img->image));
                if (is_file($filePath)) {
                    unlink($filePath);
                }

                $image->delete();
            }

            $product->delete();
        }
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }

    public function deleteImage($id){
        $image = ProductImage::find($id);
        if($image){
            $filePath = public_path('product_images/' . str_replace('product_images/', '', $image->image));
            if (is_file($filePath)) {
                unlink($filePath);
            }

            $image->delete();
            return redirect()->route('admin.product.index')->with('success', 'Image deleted successfully');
        }else{
            return redirect()->back()->with('errors', 'Image not found');

        }
    }
}
