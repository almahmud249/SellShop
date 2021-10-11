<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddCat(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        return $data = Category::create([
            'name' => $request->name,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetCat()
    {

        return $data =DB::table('categories')->orderBy('id','desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UpdateCat(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        return $data = Category::where('id',$request->id)->update([
            'name' => $request->name,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function DeleteCat(Request $request)
    {
        return $data=DB::table('categories')->where('id',$request->id)->delete();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function MultiDelete(Request $request)
    {
        foreach ($request->all() as $category) {
             Category::find($category['id'])->delete();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
