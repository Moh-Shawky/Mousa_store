<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

use App\Services\FakeStoreAPIService;

class ProductAPIController extends Controller
{

    protected $fakeStoreService;

    public function __construct(FakeStoreAPIService $fakeStoreService)
    {
        $this->fakeStoreService = $fakeStoreService;
    }

    public function index()
    {
        $products = $this->fakeStoreService->getProducts();
        // Handle the $products array as needed in your application

        return $products;
    }
    public function show($id)
    {
        $product = $this->fakeStoreService->getProduct($id);
        // Handle the $products array as needed in your application

        return $product;
    }
    public function getProductsByCategory($category)
    {
        $product = $this->fakeStoreService->getProductsByCategory($category);
        // Handle the $products array as needed in your application

        return $product;
    }
    public function store(Request $request)
    {

        $product = $this->fakeStoreService->store($request);
        // Handle the $products array as needed in your application

        return $product;
    }
    public function update($id,Request $request)
    {
        $product = $this->fakeStoreService->update($id,$request);
        if (isset($product['error'])) {
            // Handle the error
            return response()->json(['error' => $product['error']], 400);
        }

        // Handle the successful response
        return response()->json($product, 200);
    }
    public function delete($id)
    {
        $product = $this->fakeStoreService->destory($id);
        if (isset($product['error'])) {
            // Handle the error
            return response()->json(['error' => $product['error']], 400);
        }

        // Handle the successful response
        return response()->json($product, 200);
    }


}
