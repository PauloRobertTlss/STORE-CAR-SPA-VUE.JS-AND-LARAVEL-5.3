<?php

namespace StoreTI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Contact.
 *
 * @package namespace StoreTI\Models;
 */
class Contact extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','source_id','source_type','contact'];
    protected $appends = ['type'];
    public $timestamps = false;

    public function getTypeAttribute()
    {
        if (filter_var($this->contact, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }
        return 'phone';
    }

    public function contactable()
    {
        return $this->morphTo('contactable');
    }
}
