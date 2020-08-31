<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with('order', 'order.orderedProducts', 'order.customer:id,first_name,last_name')
            ->orderBy('id', 'desc')->get();
        return view('admin_def.pages.bill_index', compact('bills'));
    }

    public function show($id)
    {
        $bill = Bill::findOrFail($id);
        $order = $bill->order;
        return view('admin_def.pages.bill_show', compact('bill', 'order'));
    }
}
