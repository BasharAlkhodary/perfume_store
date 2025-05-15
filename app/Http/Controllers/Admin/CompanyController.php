<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Company;
use App\Models\Admin\Company as AdminCompany;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::latest()->paginate(8);
        return view('Admin.Company.index',compact('company'))->with('i', (request()->input('page',1) -1)*8);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        return view('Admin.Company.create');

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
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('ADmin.Company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company ->delete();
        return redirect('Admin.Company.index');
    }

    public function softDelete($id)
    {
        $company = Company::find($id);
        $company ->delete();
        return redirect('Admin.Company.index');
    }

    public function trash()
    {
        $company = Company::withTrashed()->latest();
    }

    public function restore($id)
    {
        $company = Company::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('Admin.Company.index');
    }

    public function forceDelete($id)
    {
        $company = Company::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('Admin.Company.index');
    }
}
