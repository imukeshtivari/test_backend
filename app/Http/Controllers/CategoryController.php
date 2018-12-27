<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categories = Category::all();

            return response()->json([
                "categories" => $categories,
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
            $data = request()->only(["name"]);

            $category = Category::create([
                "name" => $data['name']
            ]);

            return response()->json([
                "category" => $category,
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json([
            "category"=> $category,
            "status" => 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try{
            $data = request()->only(["name"]);

            $category->name = $data['name'];

            $category->save();

            return response()->json([
                "category" => $category,
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();

            return response()->json([
                "category" => $category,
                "status" => 200
            ]);
        }catch(\Exception $ex){
            return response()->json([
                "message" => $ex->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
