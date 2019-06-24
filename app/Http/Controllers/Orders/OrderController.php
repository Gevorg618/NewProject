<?php

namespace App\Http\Controllers\Orders;


use App\Http\Controllers\Controller;

use App\Models\Orders\Order;
use App\Repositories\OrdersRepository;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Order::whereHas('products')->with('products')->first();
        $customer = $user->customers;
        $users = $user->products;
        return view('user.order.order',compact('users','customer'));
    }

    /**
     * @param OrdersRepository $orderRepo
     * @return mixed
     * @throws \Exception
     */
    public function ordersList(OrdersRepository $orderRepo)
    {
        $users = $orderRepo->getAllOrders();
        return datatables()->of($users)->make(true);

    }
}
