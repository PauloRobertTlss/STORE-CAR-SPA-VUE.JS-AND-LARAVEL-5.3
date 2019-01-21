<?php

namespace StoreTI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Customer.
 *
 * @package namespace StoreTI\Models;
 */
class Customer extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name'];

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable')->orderBy('contacts.id', 'desc');
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function sales(){
        return $this->hasMany(SaleOrder::class);
    }

}
