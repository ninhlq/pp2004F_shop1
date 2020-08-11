<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontpageController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $cart = session()->get('cart');
            $products = $this->getCartDetails();
            \View::share('cart', [
                'count' => count($cart),
                'total' => $products['total'],
            ]);
            return $next($request);
        });
    }

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
        $cart = session()->get('cart');
        if (!empty($cart)) {
            $products = Product::with('images')->findOrFail($cart);
            return view('frontpage_def.pages.cart', compact('products'));
        } else {
            return view('frontpage_def.pages.cart');
        }
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

    protected function getCartDetails()
    {
        $cart = session()->get('cart');
        $products = Product::findOrFail($cart);
        $total = $products->sum('current_price');
        $quantity = session()->get('cart-quantity');
        if (!empty($quantity)){
            foreach ($quantity as $key => $value) {
                foreach($products as $product) {
                    if ($product->id === $key) {
                        $total += $product->current_price * ($value - 1);
                    }
                }
            }
        }
        return [
            'count' => count($cart),
            'total' => $total,
        ];
    }

    public function ajaxProduct(Request $request)
    {
        $product = Product::findOrFail($request->product);
        if ($product) {
            $html = view('frontpage_def.partials.modal_product_preview')->with('product', $product)->render();
            return response()->json([
                'success' => true,
                'html' => $html,
            ]);
        } else {
            return false;
        }
    }

    public function ajaxCart(Request $request)
    {
        $cart = session()->get('cart');
        $products = Product::with('images')->findOrFail($cart);
        $quantity = session()->get('cart-quantity');
        foreach ($quantity as $key => $value) {
            foreach($products as $product) {
                if ($product->id === $key) {
                    $product->quantity = $value;
                }
            }
        }
        if ($products) {
            return response()->json([
                'success' => true,
                'data' => $products,
            ]);
        } else {
            return false;
        }
    }

    public function ajaxAddCart(Request $request)
    {
        $cart = session()->get('cart');
        if (empty($cart) || !in_array($request->product, $cart)) {
            session()->push('cart', $request->product);
        }
        $cart = session()->get('cart');
        if ($request->quantity || ( array_key_exists($request->product, session()->get('cart-quantity')) &&
            session()->get('cart-quantity')[$request->product] !== $request->quantity)) {
            session()->put('cart-quantity.' . $request->product, $request->quantity);
        }
        if (in_array($request->product, $cart)) {
            return response()->json([
                'success' => true,
                'data' => $this->getCartDetails(),
            ]);
        }
    }

    public function ajaxRemoveCart(Request $request)
    {
        $cart = session()->pull('cart', []);
        $key = array_search($request->product, $cart);
        if ($key !== false) {
            unset($cart[$key]);
        }
        session()->put('cart', $cart);
        $quantity = session()->pull('cart-quanity', []);
        if (array_key_exists($request->product, $quantity)) {
            unset($quantity[$request->product]);
        }
        session()->put('cart-quantity', $quantity);
        if (!in_array($request->product, $cart)) {
            return response()->json([
                'success' => true,
                'data' => $this->getCartDetails(),
            ]);
        }
    }

    public function ajaxEmptyCart()
    {
        session()->put('cart', []);
        session()->put('cart-quantity', []);
        if (empty(session()->get('cart'))) {
            return response()->json(true);
        }
    }
}
