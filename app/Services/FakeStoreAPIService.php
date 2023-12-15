<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class FakeStoreAPIService extends ServiceProvider
{
      protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://fakestoreapi.com/',
            // 'timeout'  => 2.0,
        ]);
    }

    public function getProducts()
    {
        try {
            $response = $this->client->get('products');
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle errors (e.g., log them or return a default response)
            return ['there are something wrong, please try again'];

        }
    }
    public function getProduct($id)
    {
        try {
            $response = $this->client->get('products/'.$id);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle errors (e.g., log them or return a default response)
            return ['there are something wrong, please try again'];

        }
    }
    public function getProductsByCategory($category)
    {
        try {
            $response = $this->client->get('products/category/'.$category);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle errors (e.g., log them or return a default response)
            return ['there are something wrong, please try again'];

        }
    }
    public function store($request)
    {
        try {
            $valid_data = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'category' => 'required',
                'image' => 'required'
            ]);
            if ($request->hasFile('image')) {
                $valid_data['image'] = $request->file('image')->store('images', 'public');
            }
            $response = $this->client->post('products/',[
                'json' => $valid_data,]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle errors (e.g., log them or return a default response)
            return ['there are something wrong, please try again'];
        }
    }
    public function update($id,$request)
    {
        try {
            $valid_data = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'category' => 'required',
                'image' => 'nullable'
            ]);
            if ($request->hasFile('image')) {
                $valid_data['image'] = $request->file('image')->store('images', 'public');
            }
            $response = $this->client->put('products/'.$id,[
                'json' => $valid_data,]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle errors (e.g., log them or return a default response)
            return ['there are something wrong, please try again'];
        }
    }
    public function destory($id)
    {
        try {
            $response = $this->client->delete('products/'.$id);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle errors (e.g., log them or return a default response)
            return ['there are something wrong, please try again'];
        }
    }


}
