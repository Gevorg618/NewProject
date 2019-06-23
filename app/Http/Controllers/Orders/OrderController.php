<?php

namespace App\Http\Controllers\Orders;


use App\Http\Controllers\Controller;

use App\Repositories\OrdersRepository;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        return view('user.order.order');
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
