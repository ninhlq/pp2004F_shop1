<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Brand;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand')->orderBy('id', 'desc')->get();
        return view('admin_def.pages.product_index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin_def.pages.product_create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();

        try {
            $request['slug'] = \Str::random(12);
            $product = Product::create($request->all());
            
            if(str_contains($request->thumbs, ',')) {
                $images = explode(',', $request->thumbs);
                foreach($images as $value) {
                    $image = new ProductImage();
                    $image->product_id = $product->id;
                    $image->image = $value;
                    $image->save();
                }
            } else {
                $image = new ProductImage();
                $image->product_id = $product->id;
                $image->image = $request->thumbs;
            }

            if ($product->save() && $image->save()) {
                return redirect()->route('admin.product.show', $product->id)
                    ->withMessage('OK');
            }
        } catch (Exception $e) {
            \Log::error("Error at " . __METHOD__ . ". Content: {$e->getMessage()}");
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin_def.pages.product_show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        return view('admin_def.pages.product_edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $request->validated();
        try {
            $product = Product::find($id);
            $product->fill($request->all());
            if ($product->save()) {
                return redirect()->route('admin.product.show', $product->id)
                    ->withMessage('OK');
            }
        } catch (\Exception $e) {
            \Log::error("Error at " . __METHOD__ . ". Content: {$e->getMessage()}");
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
