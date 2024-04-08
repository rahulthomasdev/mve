<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return response()->json(["message" => "Hello"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Create Order with Separate Vendor Orders based product vendors. 
        $validatedData = $request->validate([
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.unit_price' => 'required|numeric|min:0',
            'shipping_address' => 'required|string|min:5',
            'total_amount' => 'required|numeric|min:0',
            'shipping_method' => 'required|string',
            'expected_delivery_date' => 'required|date|after_or_equal:now'
            // Add more validation rules as needed
        ]);

        $user  = auth()->user();
        $products = $request['products'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
