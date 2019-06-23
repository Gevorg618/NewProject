<?php


namespace App\Contracts;


interface ProductsInterface

{
    /**
     * @return mixed
     */
    public function getAllProducts();

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

}
