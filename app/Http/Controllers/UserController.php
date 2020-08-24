<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\UserRegisterRequest;
use App\Traits\UserTrait;

class UserController extends Controller
{
    use UserTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', '<', 2)->orderBy('id', 'desc')->get();
        $user_type = 'Customer';
        return view('admin_def.pages.user_index', compact('users', 'user_type'));
    }

    public function admin()
    {
        $users = User::where('role_id', '>=', 2)->get();
        $user_type = 'Admin';
        return view('admin_def.pages.user_admin_index', compact('users', 'user_type'));
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
    public function store(UserRegisterRequest $request)
    {
        $request->validated();
        try {
            $request['remember_token'] = \Str::random(16); 
            $request['password'] = \Hash::make($request->password);
            $user = User::create($request->all());
            if ($user->save()) {
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e)->withInput();
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
        $user = User::findOrFail($id);
        $orders = $this->getOrders($user, false);
        $bills = $orders->where('status', Order::STT['completed']);
        return view('admin_def.pages.user_show', compact('user', 'orders', 'bills'));
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
        //
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
