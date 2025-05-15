<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Order;
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
        $order = order::latest()->paginate(8);
        return view('Admin.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Order.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'delivery' => 'required|in:yes,no',
            'notes' => 'string'
        ]);

         // أخذ جميع البيانات
            $input = $request->all();
        // إنشاء السجل
            Order::create($input);
        
            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('order.index')->with('success', 'The Order was added successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        return view('Admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('Admin.order.edit', compact('order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'delivery' => 'required|in:yes,no',
            'notes' => 'string'
        ]);

        $input = $request->all();
        $order->update($input);
        return redirect()->route('order.index')->with('success', 'Order updated Successf    ully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order -> delete();
        return redirect('Admin.Order.index');
    }

    public function softDelete($id)
    {
        $order = Order::find($id)->delete();
        return redirect()->route('order.index')->with('delete', 'Order was deleted Successfully');
    }

    public function trashedPerfume()
    {
        $order = Order::onlyTrashed()->latest()->paginate(8);
        return view('Admin.order.trash', compact('order'));
    }

    public function restore($id)
    {
        $order = Order::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('Admin.Order.index');
    }

    public function forceDelete($id)
    {
        $order = Order::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('Admin.Order.index');
    }
}
