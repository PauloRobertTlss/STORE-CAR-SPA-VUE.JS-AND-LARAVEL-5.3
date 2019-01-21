<?php

namespace StoreTI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SaleOrder.
 *
 * @package namespace StoreTI\Models;
 */
class SaleOrder extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','client_id','address_id'];

    public function client(){
        return $this->belongsTo(Customer::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function lines(){
        return $this->hasMany(SaleLine::class);
    }
}
