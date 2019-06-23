<?php


namespace App\Repositories;


use App\Contracts\OrdersInterface;
use App\Models\Orders\Order;

class OrdersRepository implements OrdersInterface
{
    protected $model;


    /**
     * OrdersRepository constructor.
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->model = $order;
    }


    /**
     * @return mixed
     */
    public function getAllOrders()
    {
        return $this->model->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

}
