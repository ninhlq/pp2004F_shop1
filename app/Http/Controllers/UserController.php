<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
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
        //
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

    public function frontpageShow()
    {
        $user = \Auth::check() ? \Auth::user() : null;
        return view('frontpage_def.pages.user_account'); 
    }
}
