<?php

namespace App\Modules;
class PricingRules
{
    public $rules = [];
    public function add_rule($product_id, $quantity, $new_price)
    {
        $this->rules[$product_id] = (object)['product_id' => $product_id, 'quantity' => $quantity, 'new_price' => $new_price];
    }
}