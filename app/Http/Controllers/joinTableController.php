<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class joinTableController extends Controller
{
    function index(){
        $customer = User::join('Customer', 'Customer.customer_id' , '=' , 'User.user_id')
        ->get(['User.*' , 'Customer.*']) ;

        return view('join_table', compact('customer'));
    }
}
