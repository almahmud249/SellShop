<?php

namespace App\Models\model;

use App\Models\model\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function product()
    {
        return $this->hasOne(Product::class,"product_id","id");
    }
}
