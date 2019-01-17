<?php

namespace StoreTI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace StoreTI\Models;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name','description','price','image_path'];


    public function tags()
    {
        return $this->morphMany(Tag::class, 'source')->orderBy('id', 'asc');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories','product_id','category_id','id');
    }


}
