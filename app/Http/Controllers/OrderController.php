<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $orders = Order::get();
            return view('orders.index', ['orders' => $orders]);
        }
        return redirect()->route('login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function create()
    {
            return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->input('name') == null || $request->input('tel') == null || $request->input('address') == null) {
            return redirect()->back()->with('error', "Please fill out information .");
        }
        else
        {
            if ($request->input('amount') < 1)
            {
                return redirect()->back()->with('error', "Please purchase something.");
            }
            else
            {
                $order = New Order();
                $order->name = $request->input('name');
                $order->tel = $request->input('tel');
                $order->address = $request->input('address');
                $order->amount = $request->input('amount');
                $order->save();
                $request->session()->forget('cart');
                return redirect()
                    ->route('home')
                    ->with('success', "Payment Done");
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('home');
    }
}
