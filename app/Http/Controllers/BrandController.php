<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\Brand\BrandRepositoryInterface;

class BrandController extends Controller
{
    protected $brandRepo;

    public function __construct(BrandRepositoryInterface $brandRepo)
    {
        $this->brandRepo = $brandRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brandRepo->orderBy('id', 'desc')->get();
        return view('admin_def.pages.brand_index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request['slug'] = \Str::random(16);
            $brand = $this->brandRepo->create($request->all());
            if ($brand->save()) {
                return redirect()->back();
            }
        } catch (\Exception $e) {

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
        $brand = $this->brandRepo->findOrFail($id);
        $products = Product::where('brand_id', $id)->orderBy('id', 'desc')->get();
        return view('admin_def.pages.brand_show', compact('brand', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = $this->brandRepo->find($id);
        $brand->fill($request->all());
        if ($brand->save()) {
            return redirect()->back();
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
        $product = Product::where('brand_id', $id)->get();
        if (count($product) == 0) {
            $delete = $this->brandRepo->find($id)->delete();
            if ($delete) {
                return redirect()->route('admin.brand.index');
            }
        }
        return redirect()->back();
    }
}
