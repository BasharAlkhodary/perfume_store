<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
public function __construct()
{
    // كل الكنترولر محمي ولازم تسجيل الدخول عشان تخش عالعمليات كلها ما عدا فانكشن ال index & show  :(->exept)
    // $this->middleware('auth')->except(['index','show']);


    // ينفذ الميدلوير على ما بداخل المصفوفة فقط :(->only)
    $this->middleware('auth')->only(['create','edit','destroy','store', 'update']);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfume = Perfume::latest()->paginate(8);
        return view('Admin.Perfume.trash', compact('perfume'));
    }

    public function trashedPerfume ()
    {
        $perfume = Perfume::onlyTrashed()->latest()->paginate(8);
        return view('Admin.Perfume.trash', compact('perfume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Perfume.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            // التحقق من وصول البيانات
            // dd($request->all());
        
            // التحقق من صحة البيانات
            $request->validate([
                'name' => 'required|string|max:100|min:3|unique:perfumes,name',
                // 'concentration_type' => 'required|numeric|min:90|max:99',
                'price' => 'required|numeric',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'size' => 'required|numeric',
                'description' => 'nullable|string',
                'gender' => 'required|in:male,female,unisex', // حسب ما تسمح به القيم عندك
            ]);
        
            // أخذ جميع البيانات
            $input = $request->all();
        
            // معالجة الصورة إن وُجدت
            if ($image = $request->file('picture')) {
                $destinationPath = public_path('imagesOfPerfume/');
                $profileImage = time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['picture'] = $profileImage;
            }
        
            // إنشاء السجل
            Perfume::create($input);
        
            // إعادة التوجيه مع رسالة نجاح
            return redirect()->route('perfume.index')->with('success', 'The perfume was added successfully.');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfume  $perfume
     * @return \Illuminate\Http\Response
     */
    public function show(Perfume $perfume)
    {
        return view('Admin.perfume.show', compact('perfume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfume  $perfume
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfume  $perfume)
    {
        return view('Admin.perfume.edit', compact('perfume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfume  $perfume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfume $perfume)
    {
        $request->validate([
            'name' => ['required','string','between:3,255',"unique:perfumes,name,{$perfume->id}"],
            // 'concentration_type' => 'required|numeric|min:90|max:99',
            'price' => ['required','numeric '],
            'picture' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg'],
            'size' => ['required','numeric'],
            'description' => ['nullable'],
            'gender' => ['required'] ,
        ]);
        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'imagesOfPerfume/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['picture'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $perfume->update($input);
        return redirect()->route('perfume.index')->with('success', 'Perfume updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfume  $perfume
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfume  $perfume)
    {
        $perfume->delete();
        return redirect()->route('perfume.index')->with('delete', 'Perfume deleted Successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfume  $perfume
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $perfume= Perfume::find($id)->delete();
        return redirect()->route('perfume.index')->with('delete', 'Perfume was deleted Successfully');
    }

    // public function trashedPerfume()
    // {
    //     $perfume = Perfume::onlyTrashed()->latest()->paginate(8);
    //     return view('Admin.perfume.index', compact('perfume'));
    // }

    public function restore($id)
    {
        $perfume = Perfume::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('Admin.perfume.index');
    }

    
    public function forceDelete($id)
    {
        // أولاً: جيب السجل المحذوف
        $perfume = Perfume::onlyTrashed()->findOrFail($id);
    
        // ثانياً: تحقق أنه فعلاً محذوف (احتياط)
        if ($perfume->trashed()) {
            // حذف الصورة من مجلد public
            if ($perfume->picture) {
                $imagePath = public_path('imagesOfPerfume/' . $perfume->picture);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // حذف نهائي من قاعدة البيانات
            $perfume->forceDelete();
    
            return redirect()->route('Admin.perfume.index')->with('success', 'Perfume permanently deleted.');
        }
    
        return redirect()->route('Admin.perfume.index')->with('error', 'Perfume not found or not deleted.');
    }
}
