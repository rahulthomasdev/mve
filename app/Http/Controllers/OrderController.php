<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\VendorOrder;
use App\Utils\OrderUtility;
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
        ]);

        $order_no = OrderUtility::generateUniqueOrderNumber('MVE-');
        $order = Order::create([
            "customer_id" => auth()->id(),
            "order_date" => date('Y-m-d H:i:s'),
            "shipping_address" => $validatedData['shipping_address'],
            "total_amount" => $validatedData['total_amount'],
            "order_no" => $order_no
        ]);

        $productIds = array_column($validatedData['products'], 'product_id');

        $products = Product::whereIn('id', $productIds)->get(['id', 'vendor_id']);

        $vendor_ids = array_column(json_decode($products), 'vendor_id');

        $vendor_orders = array();

        function findVendorIdById($products, $id)
        {
            foreach ($products as $product) {
                if ($product['id'] == $id) {
                    return $product['vendor_id'];
                }
            }
            return null; // Return null if id not found
        }

        foreach ($vendor_ids as $vendor_id) {
            if (!array_key_exists($vendor_id, $vendor_orders)) {
                $vendor_order_no = OrderUtility::generateUniqueOrderNumber('MVE-V-');
                $vendor_orders[$vendor_id] = VendorOrder::create([
                    "vendor_order_no" => $vendor_order_no,
                    "expected_delivery_date" => $validatedData['expected_delivery_date'],
                    "shipping_method" => $validatedData['shipping_method'],
                    "shipping_address" => $validatedData['shipping_address'],
                    "vendor_id" => $vendor_id,
                    "order_id" => $order->id,
                ])->vendor_order_id;
                foreach ($validatedData['products'] as $product) {
                    if (findVendorIdById($products, $product['product_id']) == $vendor_id) {
                        OrderItem::create([
                            "order_id" => $order->id,
                            "vendor_order_id" => $vendor_orders[$vendor_id],
                            "product_id" => $product['product_id'],
                            "quantity" => $product['quantity'],
                            "unit_price" => $product['unit_price'],
                        ]);
                    }
                }
            }
        }

        return response()->json([$order]);
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
