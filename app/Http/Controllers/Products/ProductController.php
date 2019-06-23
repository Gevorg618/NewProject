<?php

namespace App\Http\Controllers\Products;
use App\Models\Orders\Order;
use App\Repositories\OrdersRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.product.product');
    }

    /**
     * @param ProductsRepository $productsRepo
     * @return mixed
     * @throws \Exception
     */
    public function productsList(ProductsRepository $productsRepo)
    {
        $users = $productsRepo->getAllProducts();
        return datatables()->of($users)->make(true);

    }


    /**
     * @param Request $request
     * @param ProductsRepository $productRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request,ProductsRepository $productRepo)
    {
        $data = $request->data;
        try {

            $user = $productRepo->create($data);
            $category = Order::find([5]);
            $user->orders()->attach($category);
            activity()->log($category->first()->id);
            return response()->json([
                'success' => 1,
                'message' => 'You successfully created product',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 0,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
