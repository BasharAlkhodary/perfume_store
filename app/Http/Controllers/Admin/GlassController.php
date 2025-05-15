<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Glass;
use Illuminate\Http\Request;

class GlassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $glass = Glass::latest()->paginate(8);
        return view('Admin.Glass.index',compact('glass'))->with('i', (request()->input('page',1) -1)*8);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Glass.create');

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
     * @param  \App\Models\glass  $glass
     * @return \Illuminate\Http\Response
     */
    public function show(glass $glass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\glass  $glass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $glass = Glass::find($id);
        return view('Admin.Glass.edit',compact('glass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\glass  $glass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, glass $glass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\glass  $glass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $glass = Glass::find($id);
        $glass -> delete();
        return redirect('Admin.Glass.index');
    }

    public function softDelete($id)
    {
        $glass = Glass::find($id);
        $glass -> delete();
        return redirect('Admin.Glass.index');
    }

    public function trash()
    {
        $glass = Glass::withTrashed()->latest();  
    }

    public function restore($id)
    {
        $glass = Glass::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('Admin.Glass.index');
    }

    public function forceDelete($id)
    {
        $glass = Glass::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('Admin.Glass.index');
    }
}