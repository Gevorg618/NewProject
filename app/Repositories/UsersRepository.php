<?php


namespace App\Repositories;


use App\Contracts\UsersInterface;
use App\Models\Customers\Customer;
use App\User;

class UsersRepository implements UsersInterface
{
    protected $model;


    /**
     * UsersRepository constructor.
     * @param User $user
     */
    public function __construct(Customer $user)
    {
        $this->model = $user;
    }


    /**
     * @return mixed
     */
    public function getAllUsers()
    {
        return $this->model->get();
    }
}
