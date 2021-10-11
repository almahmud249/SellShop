<?php

namespace App\Http\Controllers;

use App\Models\model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddProduct(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required|max:12',
            'brand_id' => 'required|max:12',
            'cat_id' => 'required|max:12',
            'price' => 'required|max:12',
            'photo' => 'required',
            'quantity' => 'required|max:12',

        ],

            [
                'brand_id.required' => 'This field is required',
                'cat_id.required' => 'This field is required',
            ]

        );
        // $data= $request->all();
        // dd($data);

        $strpos = strpos($request->photo, ';');
        $sub = substr($request->photo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time() . "." . $ex;
        $img = Image::make($request->photo)->resize(2000, 2000);
        $upload_path = public_path() . "/img/";
        $img->save($upload_path . $name);

        $data = array();
        $data['name'] = $request->name;
        $data['cate_id'] = $request->cat_id;
        $data['barn_id'] = $request->brand_id;
        $data['price'] = $request->price;
        $data['discount_price'] = $request->discount_price;
        $data['quantity'] = $request->quantity;
        if ($request->color) {
            $color = implode(',', $request->color);
            $data['color'] = $color;

        }
        if ($request->size) {
            $size = implode(',', $request->size);
            $data['size'] = $size;

        }

        $data['image'] = $name;
        $data['description'] = $request->description;

        DB::table('products')->insert($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetProduct()
    {
        // return $data =DB::table('products')->orderBy('id','desc')->get();
        return $posts = Product::with('brand', 'category')->orderBY('id', 'DESC')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetItem(Request $request)
    {
        $data = DB::table('products')->where('id', $request->id)->first();
        $data->color = explode(',', $data->color);
        $data->size = explode(',', $data->size);

        return $data;

        //   return $posts = Product::with('brand','category')->where('id',$request->id)->first();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function UpdateItem(Request $request)
    {

        // $data= $request->all();
        // dd($data);
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required|max:12',
            'barn_id' => 'required|max:12',
            'cate_id' => 'required|max:12',
            'price' => 'required|max:12',
            'image' => 'required',
            'quantity' => 'required|max:12',

        ],

            [
                'barn_id.required' => 'This field is required',
                'cate_id.required' => 'This field is required',
            ]

        );
        // $data= $request->all();
        // dd($data);
        $OldPic = Product::find($request->id);
        if ($OldPic->image == $request->image) {
            // $strpos = strpos($request->image, ';');
            // $sub = substr($request->image, 0, $strpos);
            // $ex = explode('/', $sub)[1];
            // $name = time() . "." . $ex;
            // $img = Image::make($request->image)->resize(2000, 2000);
            // $upload_path = public_path() . "/img/";
            // $img->save($upload_path . $name);

            $data = array();
            $data['name'] = $request->name;
            $data['cate_id'] = $request->cate_id;
            $data['barn_id'] = $request->barn_id;
            $data['price'] = $request->price;
            $data['discount_price'] = $request->discount_price;
            $data['quantity'] = $request->quantity;
            $color = implode(',', $request->color);
            $size = implode(',', $request->size);
            $data['color'] = $color;
            $data['size'] = $size;
            $data['image'] = $request->image;
            $data['description'] = $request->description;

            DB::table('products')->where('id', $request->id)->update($data);
        } else {
            if ($OldPic->image) {
                $filePath = public_path() . '/img/' . $OldPic->image;
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }
            }

            $strpos = strpos($request->image, ';');
            $sub = substr($request->image, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->image)->resize(2000, 2000);
            $upload_path = public_path() . "/img/";
            $img->save($upload_path . $name);

            $data = array();
            $data['name'] = $request->name;
            $data['cate_id'] = $request->cate_id;
            $data['barn_id'] = $request->barn_id;
            $data['price'] = $request->price;
            $data['discount_price'] = $request->discount_price;
            $data['quantity'] = $request->quantity;
            $color = implode(',', $request->color);
            $size = implode(',', $request->size);
            $data['color'] = $color;
            $data['size'] = $size;
            $data['image'] = $name;
            $data['description'] = $request->description;

            DB::table('products')->where('id', $request->id)->update($data);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function DeleteItem(Request $request)
    {
        $pic = Product::where('id', $request->id)->select('image')->first();

        if ($pic->image) {
            $filePath = public_path() . '/img/' . $pic->image;
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }
        return $data = DB::table('products')->where('id', $request->id)->delete();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function filter($data)
    {
        $data = JSON_decode($data);

        $field = $data->field;
        $data = $data->data;
        if ($field === "price") {
            $pro = $this->priceRange($data);
        } else if ($field === "size" || $field === "color") {
            $pro = $this->SizeColor($data,$field);
        } else {
            $pro = Product::where($field, $data)->paginate(10);
        }
        return $pro;
    }

    public function priceRange($data)
    {
        $min = $data[0];
        $max = $data[1];
        $pro = Product::whereBetween('price', [$min, $max])->paginate(10);

        return $pro;
    }

    public function SizeColor($data,$field)
    {

        $pro=Product::query()->where($field,"like","%{$data}%")->paginate(10);
        return $pro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function GetViewProduct(Request $request)
    {
         $pro=DB::table('products')->where('id',$request->pro_id)->first();
        dd($pro);
    }
}
