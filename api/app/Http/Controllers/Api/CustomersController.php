<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use App\Http\Resources\CustomersResource;
use App\Http\Requests\CustomersPostRequest;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = CustomerService::getAllCustomers();
        return CustomersResource::collection($customers);
    }


    /*
     * Display the specified user.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customer = CustomerService::getCustomerById($id);
        return new CustomersResource($customer);
    }
}
