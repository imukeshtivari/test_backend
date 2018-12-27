<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $products = Product::all();
            $tmp = [];
            foreach($products as $product){
                $product['category'] = $product->category;
                array_push($tmp, $product);
            }

            return response()->json([
                "products" => $tmp,
                "status" => 200
            ]);
        }catch(\Exception $ex){
            return response()->json([
                "message" => $ex->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = request()->only(["title", "category_id", "price", "description", "image"]);

            $product = Product::create([
                "title" => $data['title'],
                "category_id" => $data['category_id'],
                "price" => $data['price'],
                "description" => $data['description'],
                "image" => $data['image']
            ]);

            return response()->json([
                "product" => $product,
                "status" => 200
            ]);
        }catch(\Exception $ex){
            return response()->json([
                "message" => $ex->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            "product"=> $product,
            "status" => 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try{

            $data = request()->only(["title", "category_id", "price", "description", "image"]);

            $product->title = $data['title'];
            $product->category_id = $data['category_id'];
            $product->price = $data['price'];
            $product->description = $data['description'];
            $product->image = $data['image'];

            $product->save();

            return response()->json([
                "product" => $product,
                "status" => 200
            ]);
        }catch(\Exception $ex){
            return response()->json([
                "message" => $ex->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try{
            $product->delete();

            return response()->json([
                "product" => $product,
                "status" => 200
            ]);
        }catch(\Exception $ex){
            return response()->json([
                "message" => $ex->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    public function upload(Request $request){
        try{
            $url = $request->image->store("images", "public");
            $display_url = asset("storage/{$url}");

            return response()->json([
                "url" => $url,
                "display_url" => $display_url
            ]);
        }catch(\Exception $ex){
            return response()->json([
                "message" => $ex->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
