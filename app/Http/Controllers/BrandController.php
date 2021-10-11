<?php

namespace App\Http\Controllers;

use App\Models\model\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddBrand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:brands|max:255',
        ]);

        return $data = Brand::create([
            'name' => $request->name,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetBrand()
    {
        return $data =DB::table('brands')->orderBy('id','desc')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UpdateBrand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:brands|max:255',
        ]);

        return $data = Brand::where('id',$request->id)->update([
            'name' => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function DeleteBrand(Request $request)
    {
        return $data=DB::table('brands')->where('id',$request->id)->delete();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function MultiDelete(Request $request)
    {
        foreach ($request->all() as $brand) {
            Brand::find($brand['id'])->delete();
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
