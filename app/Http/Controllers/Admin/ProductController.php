<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use App\ProductCategory;
use App\ProductTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
       

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        

        $categories = ProductCategory::all()->pluck('name', 'id');

        $tags = ProductTag::all()->pluck('name', 'id');

        return view('admin.products.create', compact('categories', 'tags'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));

        if ($request->input('photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        

        $categories = ProductCategory::all()->pluck('name', 'id');

        $tags = ProductTag::all()->pluck('name', 'id');

        $product->load('categories', 'tags');

        return view('admin.products.edit', compact('categories', 'tags', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));

        if ($request->input('photo', false)) {
            if (!$product->photo || $request->input('photo') !== $product->photo->file_name) {
                $product->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($product->photo) {
            $product->photo->delete();
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        

        $product->load('categories', 'tags');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
