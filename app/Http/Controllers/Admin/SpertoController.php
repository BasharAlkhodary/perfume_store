<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Sperto;
use Illuminate\Http\Request;

class SpertoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sperto = Sperto::latest()->paginate(8);
        return view('Admin.sperto.index', compact('sperto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.sperto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all()); للتأكد من ان المعلومات واصلة وشغالة ام لا 
        $request->validate([
            'name' => 'required',
            'concentration' => 'required|numeric|min:90|max:99',
            'price' => 'required|numeric ',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'size' => 'required|numeric'
        ]);
        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'imagesOfSperto/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['picture'] = "$profileImage";
        }
        Sperto::create($input);
        return redirect()->route('sperto.index')->with('success', 'The Sperto was added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sperto  $sperto
     * @return \Illuminate\Http\Response
     */
    public function show(Sperto $sperto)
    {
        return view('Admin.sperto.show', compact('sperto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sperto  $sperto
     * @return \Illuminate\Http\Response
     */
    public function edit(Sperto $sperto)
    {
        return view('Admin.sperto.edit', compact('sperto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sperto  $sperto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sperto $sperto)
    {
        $request->validate([
            'name' => 'required',
            'concentration' => 'required | numeric | min:90 | max:99',
            'picture' => 'nullable | image | mimes:jpeg,png,jpg,gif,svg ',
            'price' => 'required ',
            'size' => 'required | numeric'
        ]);
        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'imagesOfSperto/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['picture'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $sperto->update($input);
        return redirect()->route('sperto.index')->with('success', 'Sperto updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sperto  $sperto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sperto  $sperto)
    {
        // $sperto = Sperto::findOrFail($id);
        // $sperto->delete();

        $sperto->delete();
        return redirect()->route('sperto.index')->with('delete', 'Sperto deleted Successfully');
    }

    public function softDelete($id)
    {
        $sperto = Sperto::find($id);
        $sperto->delete();
        return redirect()->route('sperto.index')->with('delete', 'Sperto was deleted Successfully');
    }

    public function trash()
    {
        $sperto = Sperto::withTrashed()->latest();
    }

    public function restore($id)
    {
        $sperto = Sperto::onlyTrashed()->where('id', $id)->first()->restore();
        return redirect()->route('sperto.index');
    }

    public function forceDelete($id)
    {
        $sperto = Sperto::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('sperto.index');
    }
}
