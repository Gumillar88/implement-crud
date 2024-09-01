<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $orders = Order::select(['id', 'total_price', 'order_date', 'created_at']);
            return datatables()->of($orders)
                ->editColumn('order_date', function ($order) {
                    return $order->order_date->format('d-m-Y');
                })
                ->make(true);
        }

        return view('orders.index');
    }

    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'total_price' => 0,
            'order_date' => now()->toDateString(),
        ]);

        $totalPrice = 0;
        
        foreach ($validated['products'] as $productData) {
            // Mengambil produk berdasarkan ID
            $product = Product::find($productData['id']);
            $quantity = $productData['quantity'];
            $subtotal = $product->price * $quantity;

            // Menyimpan item pesanan
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
            ]);

            $totalPrice += $subtotal;
        }

        // Memperbarui total harga pesanan
        $order->update(['total_price' => $totalPrice]);

        return redirect()->route('orders.show', $order->id);
    }

    public function show(Order $order)
    {
        $orderItems = $order->orderItems()->with('product')->get();
        return view('orders.show', compact('order', 'orderItems'));
    }
}