<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->name = request('name');
        $data->price = request('price');
        $data->stock = request('stock');
        $data->created_at = request('created_at');
        $data->updated_at = request('updated_at');
        $data->save();
        return response ()->json('data created', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::find($id);
        return response ()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);

        Product::where('id', '=', $id)
        ->update([
           'name' => request('name'),
           'price' => request('price'),
           'stock' => request('stock'),
           'created_at' => request('created_at'),
           'updated_at' => request('updated_at'),
        ]);
        return response ()->json('data updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id', $id)->delete();
        return response ()->json('data deleted', 200);
    }
}