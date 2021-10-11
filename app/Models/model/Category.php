<?php

namespace App\Models\model;

use App\Models\model\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable=['name'];
    protected $guarded = [];

    public function product(){
        return $this->hasMany(Product::class,'cate_id');
    }
}
