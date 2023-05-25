<?php

namespace App\Services;

use App\Models\Customers;


class CustomerService
{
    public static function getAllCustomers() {
       return Customers::all(['id', 'first_name','company','gender','city']);
    }
    
    public static function getCustomerById($id) {
        return Customers::find($id);
    }
}
