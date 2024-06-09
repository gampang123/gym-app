<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.dataOrder.index', compact('orders'));
    }
    
    public function viewCart()
    {
        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)->get();

        return view('user.layouts.cart', compact('orders'));
    }

    public function viewHistory()
    {
        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)->get();
        return view('user.layouts.history', compact('orders'));
    }

    public function submitOrder(Request $request)
    {
        $productId = $request->product_id;

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        $totalPayment = $product->price * $request->duration;

        $order = new Order;
        $order->user_id = Auth::id();
        $order->id_product = $productId;
        $order->order_date = $request->order_date;
        $order->order_time = $request->order_time;
        $order->duration = $request->duration;
        $order->total_payment = $totalPayment;

        $order->save();

        return Redirect::route('user.cart')->with('success', 'Pesanan berhasil.');
    }

    public function orderForm(Request $request)
    {
        $productId = $request->query('product_id');
        $product = Product::findOrFail($productId);

        return view('user.order', compact('product'));
    }

    public function generateInvoice($id_order)
    {
        $order = Order::find($id_order);

        if (!$order) {
            return redirect()->back()->with('error', 'Order tidak ditemukan');
        }

        $pdf = Pdf::loadView('user.invoice', compact('order'));

        return $pdf->download('bukti_pemesanan_' . $order->id_order . '_' . $order->user->name . '.pdf');
    }

}