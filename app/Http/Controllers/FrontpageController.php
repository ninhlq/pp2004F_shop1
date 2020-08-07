<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontpageController extends Controller
{
    public function home()
    {
        $products = Product::orderBy('id', 'desc')->paginate(20);
        return view('frontpage_def.pages.index', compact('products'));
    }

    public function productList()
    {
        return view('frontpage_def.pages.product_list');
    }

    public function productDetails()
    {
        return view('frontpage_def.pages.product_details');
    }

    public function about()
    {
        return view('frontpage_def.pages.about');
    }

    public function contact()
    {
        return view('frontpage_def.pages.contact');
    }

    public function checkout()
    {
        return view('frontpage_def.pages.checkout');
    }

    public function cart()
    {
        return view('frontpage_def.pages.cart');
    }

    public function login()
    {
        return view('frontpage_def.pages.login');
    }

    public function register()
    {
        return view('frontpage_def.pages.register');
    }

    public function search()
    {
        return view('frontpage_def.pages.search');
    }

}
