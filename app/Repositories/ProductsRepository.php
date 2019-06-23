<?php


namespace App\Repositories;


use App\Contracts\ProductsInterface;
use App\Models\Products\Product;

class ProductsRepository implements ProductsInterface
{
    protected $model;


    /**
     * ProductsRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }


    /**
     * @return mixed
     */
    public function getAllProducts()
    {
        return $this->model->get();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model->create($data);
    }
}
