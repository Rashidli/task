<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show_orders()
    {

        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('show_orders', compact('orders'));

    }

    public function create_orders(OrderRequest $request)
    {

        Order::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'order_date' => $request->order_date,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('add', 'Data added to datatable');

    }

    public function update_orders(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->title = $request->title;
        $order->description = $request->description;
        $order->price = $request->price;
        $order->order_date = $request->order_date;

        $order->save();
        return redirect()->back()->with('update', 'Data updated');
    }

    public function delete_orders($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return back()->with('delete','Successfully deleted');
    }
}
