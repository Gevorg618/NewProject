<?php


namespace App\Contracts;


interface OrdersInterface

{
    /**
     * @return mixed
     */
    public function getAllOrders();

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

}
