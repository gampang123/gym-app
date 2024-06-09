<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('id_product');
        $product = Product::find($productId);
        
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan']);
        }
        
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name_product,
                "price" => $product->price,
                "quantity" => 1,
                "picture" => $product->picture
            ];
        }
        
        session()->put('cart', $cart);
        
        return response()->json(['success' => true, 'message' => 'Produk berhasil ditambahkan ke keranjang']);
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('user.layouts.cart', compact('cart'));
    }

    public function pay($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('viewCart')->with('error', 'Order tidak ditemukan');
        }
        
        $order->payment_date = now();  // Set the current date and time as the payment date
        $order->save();

        return redirect()->route('viewCart')->with('success', 'Order telah dibayar.');
    }

    public function generateInvoice($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('viewCart')->with('error', 'Order tidak ditemukan');
        }

        // Generate the invoice logic here, for example, creating a PDF file
        // For simplicity, we'll just return a view
        return view('user.layouts.invoice', compact('order'));
    }
}
