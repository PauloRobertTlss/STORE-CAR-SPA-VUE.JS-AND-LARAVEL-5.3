<?php

namespace StoreTI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SaleLine.
 *
 * @package namespace StoreTI\Models;
 */
class SaleLine extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','sale_order_id','units','product_id','price_current'];

    public function sale(){
        return $this->belongsTo(SaleOrder::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
