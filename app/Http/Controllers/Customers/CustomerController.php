<?php

namespace App\Http\Controllers\Customers;


use App\Repositories\UsersRepository;
use App\Http\Controllers\Controller;


class CustomerController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.customer.customer');
    }

    /**
     * @param UsersRepository $usersRepo
     * @return mixed
     * @throws \Exception
     */
    public function usersList(UsersRepository $usersRepo)
    {
        $users = $usersRepo->getAllUsers();
        return datatables()->of($users)->make(true);
    }




}
