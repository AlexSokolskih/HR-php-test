<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Partner;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders'] = Order::with('products')->with('partner')->get();

        foreach ($data['orders'] as $index => $order) {
            $order['order_price'] = $this->orderPrice($order);
        }
        //dd( $data['orders'] );
        return view('orders.orders', $data);
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
        //
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
        $data['order'] = Order::with('products')->get()->find($id);
        $data['order']->orderPrice =$this->orderPrice($data['order']);

        //dd($data['order']);
        $data['partners'] = Partner::all();
        return view('orders.edit', $data);
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
        $validatedData = $request->validate([
                                                'email' => 'required|email',
                                                'partner' => 'required|exists:partners,id',
                                                'status' => 'required|in:0,10,20'
                                            ]);

        $order = Order::find($id);
        $order->client_email = $request->email;
        $order->partner_id = $request->partner;
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.edit', $id);
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

    private function orderPrice($order)
    {
        $orderPrice = 0;
        foreach ($order->products as $index => $product) {
            $orderPrice += $product->pivot->price * $product->pivot->quantity;
        }
        return $orderPrice;
    }
}