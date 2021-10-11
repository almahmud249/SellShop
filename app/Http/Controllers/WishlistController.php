<?php

namespace App\Http\Controllers;

use App\Models\model\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $wishlist = new Wishlist;
        $wishlist->create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\model\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function AllWishList(Request $request)
    {
        // $id=$request->id;
        $data = array();
        $list = Wishlist::where("user_id", $request->id)->select('product_id')->get()->toArray();
        for ($x = 0; $x < count($list); $x++) {
            $id = $list[$x];
            $data[$x] = DB::table('products')->where('id', $id)->first();
        }
        return $data;
        //   dd($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\model\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\model\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\model\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
