<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $products = $this->productRepository->getNumberOfProducts(6);
        return view('index', ['products' => $products]);
    }
    public function products()
    {
        $products = Product::latest()->paginate(6);
        return view('products', ['products' => $products]);
    }
    public function create()
    {
        return view('admin.Products.createproduct');
    }
    public function store(Request $request)
    {
        $product = $this->productRepository->store($request);
        if ($product) {
            return redirect('/dashboard/products');
        }
        return back()->withErrors(['message' => 'Product not created']);
    }
    public function edit($id)
    {
        $product = $this->productRepository->find($id);
        return view('admin.Products.updateproduct', ['product' => $product]);
    }
    public function update(Request $request)
    {
        $updated_product = $this->productRepository->update($request);
        if ($updated_product) {
            return redirect('/dashboard/products');
        }
        return back()->withErrors(['message' => 'Product not updated']);
    }
    public function destory($id)
    {
        $product_deleted = $this->productRepository->destory($id);
        if ($product_deleted) {
            return redirect('/dashboard/products');
        }
        return back()->withErrors(['message' => 'Product not deleted']);
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
}
