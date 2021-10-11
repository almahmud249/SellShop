<?php

namespace App\Models\model;

use App\Models\model\Brand;
use App\Models\model\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'cate_id', 'barn_id', 'discount_price', 'quantity', 'color', 'size', 'image'];
    protected $guarded = [];

    /**
     * Get the category te Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'barn_id','id');
    }
}
