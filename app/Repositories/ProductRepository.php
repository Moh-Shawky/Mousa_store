<?php


namespace App\Repositories;

use App\Models\Product;



class ProductRepository
{
    public function index(){
        return Product::all();
    }
    public function store($request)
    {
        $valid_data = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required',
            'rate' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        if ($request->hasFile('image')) {
            $valid_data['image'] = $request->file('image')->store('images', 'public');
        }
        $product = Product::create([
            'name' => $valid_data['product_name'], 'rate' => $valid_data['rate'],
            'description' => $valid_data['product_description'], 'price' => $valid_data['price'],
            'image' => $valid_data['image']
        ]);
        return $product;
    }
    public function find($id)
    {
        return Product::find($id);
    }
    public function update($request)
    {
        $valid_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add appropriate validation rules for the image

        ]);
        if (!empty($request->hasFile('image'))) {
            $valid_data['image'] = $request->file('image')->store('images', 'public');
        }
        $product = Product::find($request->id);
        $updated_product = $product->update($valid_data);
        return $updated_product;
    }
    public function destory($id)
    {
        $product = Product::find($id);
        return $product->delete();
    }
    public function getNumberOfProducts($num)
    {
        return Product::latest()->take($num)->get();
    }
}
