<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Log;
use App\Models\Product;
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
                $order->status = 0;
                $order->save();

                $cart = session()->get('cart');
                for ($x = 1; $x <= $request->input('idmax'); $x++) {
                    $product = Product::findOrFail($x);
                    if (isset($cart[$product->id])) {
                        $product->amount =  $product->amount - $cart[$product->id]['quantity'];

                        $log = new Log();
                        $log->name = $order->name;
                        $log->orderid = $order->id;
                        $log->pname = $product->name;
                        $log->amount = $cart[$product->id]['quantity'];
                        $log->save();
                    }
                    $product->save();
                  }
                
                
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
        if (Auth::check())
        {   
            $order = Order::findOrFail($id);
            if($order->status < 1)
            {
                if (Auth::user()->isAdmin())
                {
                    return view('orders.edit',['order' => $order]);
                }
                return redirect()->back()->with('error', " Cannot allowed.");
            }
                return view('orders.edit',['order' => $order]);
            }
        return redirect()->route('login');
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
        if (Auth::check())

        {
            if ($request->input('status') <= 0 ) {
                return redirect()->back()->with('error', " Cannot be edit below 0.");
            }
            else
            {
                if($request->input('status') == 1)
                {
                    if (Auth::user()->isAdmin())
                    {
                        $order = Order::findOrFail($id);
                        $order->status = $request->input('status');
                        $order->save() ;
                        return redirect()->route('orders.index');
                    }
                    else
                    {
                        return redirect()->back()->with('error', " Cannot allowed.");
                    }
                    
                }
                else
                {
                    $order = Order::findOrFail($id);
                    if($order->status < 1)
                    {
                        if (Auth::user()->isAdmin())
                    {
                        $order->status = $request->input('status');
                        $order->save() ;
                        return redirect()->route('orders.index');
                    }
                    else
                    {
                        return redirect()->back()->with('error', " Cannot allowed.");
                    }
                    }
                    else
                    {
                        $order->status = $request->input('status');
                        $order->save() ;
                        return redirect()->route('orders.index');
                    }
                    return redirect()->route('orders.index');
                }
                
            }
        }
        return redirect()->route('login');
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
