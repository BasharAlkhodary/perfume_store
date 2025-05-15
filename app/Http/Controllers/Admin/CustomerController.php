<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Customer;
use App\Models\Admin\Customer as AdminCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::latest()->paginate(8);
        return view('Admin.Customer.index',compact('customer'))->with('i', (request()->input('page',1) -1)*8);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('Admin.Customer.create',compact('customer'));

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
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('Admin.Customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer -> delete();
        return redirect('Admin.Customer.index');
    }

    public function softDelete($id)
    {
        $customer = Customer::find($id);
        $customer -> delete();
        return redirect('Admin.Customer.index');
    }

    public function trash()
    {
        $customer = Customer::withTrashed()->latest();
    }

    public function restore($id)
    {
        $customer = Customer::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('Admin.Customer.index');
    }

    
    public function forceDelete($id)
    {
        $customer = Customer::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('Admin.Customer.index');
    }
}
