<?php

namespace Tests\Unit;


use App\Services\CustomerService;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;

class CustomerServiceTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic test of the customer service
     *
     * @return void
     */
    public function test_getAllCustomers_success()
    {
        $customers = CustomerService::getAllCustomers();

        $this->assertEquals(count($customers),1000);
    }

    public function test_getCustomerById_success()
    {
        $customer = CustomerService::getCustomerById(1);

        $this->assertEquals($customer["first_name"], "Laura");
        $this->assertEquals($customer["last_name"], "Richards");
        $this->assertEquals($customer["gender"], "Female");
    }
}
