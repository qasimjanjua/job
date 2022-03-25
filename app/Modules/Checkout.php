<?php
namespace App\Modules;
use App\Models\Product;

class Checkout
{
    private $rules = [];
    private $items = [];
    public $total = 0.0;
    public function __construct($pricingRules)
    {
        $this->rules = $pricingRules->rules;
    }

    public function scan($item)
    {
        $this->total = 0;

        $product = Product::where('product_code', $item)->first();

        if(array_key_exists($item,$this->items))
            $this->items[$item]->quantity++;
        else
            $this->items[$item] = (object)['product' => $product, 'quantity' => 1];

        foreach($this->items as $i)
        {
            $rule = false;
            if(isset($this->rules[$i->product->product_code]))
                $rule = $this->rules[$i->product->product_code];
            if($rule)
            {
                if($i->quantity >= $rule->quantity)
                    $this->total += ($rule->new_price * $i->quantity);
                else
                    $this->total += ($i->product->price * $i->quantity);

            }
            else
            {
                $this->total += ($i->product->price * $i->quantity);
            }
        }

        
    }
}