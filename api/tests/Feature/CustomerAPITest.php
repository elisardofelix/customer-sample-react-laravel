<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerAPITest extends TestCase
{
    use RefreshDatabase;
    protected function initDatabase()
    {
        Artisan::call('migrate');
    }

    protected function resetDatabase()
    {
        Artisan::call('migrate:reset');
    }


    /**
     * Basic test for customer api end-points of the application 
     *
     * @return void
     */
    public function test_the_application_all_customers_returns_a_successful_response()
    {
        $response = $this->get('api/customers');

        $response->assertStatus(200);
    }

    public function test_the_application_customer_by_id_returns_a_successful_response()
    {
        $response = $this->get('api/customers/1');

        $response->assertStatus(200);
    }
}
