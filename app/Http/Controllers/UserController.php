<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdmin())
        {
            return view('users.index')->with('users', User::all());
        }
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->isAdmin())
        {
            return view('users.create');
        }
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *s
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAdmin())
        {
            if ($request->input('name') == null || $request->input('pwd') == null) {
                return redirect()->back()->with('error', "Please fill out information .");
            }
            else
            {
                $user = New User();
                $user->name = $request->input('name');
                $user->email = $request->input('mail');
                $user->password = Hash::make($request->input('pwd'));
                $user->save();
                return redirect()->route('home')->with('success', "Add Done");
            }
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('home');
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
        if (Auth::user()->isAdmin())
        {
            $user = User::findOrFail($id);
            if($user->role == 'ADMIN')
            {
                return redirect()->route('home');
            }
            else {
                $user->delete();
                return redirect()->route('users.index')->with('success', "Delete Done");
            }
        }
        return redirect()->route('home');
    }
}
