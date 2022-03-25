<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Modules\PricingRules;
use App\Modules\Checkout;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_should_return_true()
    {
        //Basket: FR1,SR1,FR1,FR1,CF1
        //Total price expected: £22.45
        $basket = ["FR1","SR1","FR1","FR1","CF1"];

        $pricingRules = new PricingRules();
        $pricingRules->add_rule("FR1", 2, (3.11/2));
        $pricingRules->add_rule("SR1", 2, 4.50);
        

        $cart = new Checkout($pricingRules);
        foreach($basket as $b)
            $cart->scan($b);
        
        fwrite(STDERR, print_r($cart->total, TRUE));
        $this->assertTrue($cart->total === 22.45);
    }
}
