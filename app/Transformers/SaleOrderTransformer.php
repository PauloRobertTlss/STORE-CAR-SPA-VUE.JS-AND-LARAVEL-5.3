<?php

namespace StoreTI\Transformers;

use League\Fractal\TransformerAbstract;
use StoreTI\Models\SaleOrder;

/**
 * Class SaleOrderTransformer.
 *
 * @package namespace StoreTI\Transformers;
 */
class SaleOrderTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['lines','customer','address'];
    /**
     * Transform the SaleOrder entity.
     *
     * @param \StoreTI\Models\SaleOrder $model
     *
     * @return array
     */
    public function transform(SaleOrder $model)
    {
        return [
            'id'         => (int) $model->id,
            'created_at' => $model->created_at->format('Y-m-d H:i:s')
        ];
    }

    public function includeLines(SaleOrder $model){
        return $this->collection($model->lines, new SaleLineTransformer());
    }

    public function includeCustomer(SaleOrder $model){

        if($model->customer_id !== null) {
            $tranf = new CustomerTransformer();
            $tranf->setDefaultIncludes(['contacts']);
            return $this->item($model->customer, $tranf);
        }
        return null;
    }

    public function includeAddress(SaleOrder $model){
        if($model->address_id !== null) {
            $tranf = new AddressTransformer();
            $tranf->setDefaultIncludes([]);
            return $this->item($model->address, $tranf);
        }
        return null;
    }



}
