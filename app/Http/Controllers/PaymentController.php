<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Order;

class PaymentController extends Controller
{
    public function pay($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Prepare unique order_id to avoid conflicts
        $uniqueOrderId = $order->id_order . '-' . time();

        // Prepare transaction details
        $transactionDetails = [
            'order_id' => $uniqueOrderId,
            'gross_amount' => $order->total_payment,
        ];

        // Prepare item details
        $itemDetails = [
            [
                'id' => $order->product->id_product,
                'price' => $order->product->price,
                'quantity' => 1,
                'name' => $order->product->name_product,
            ],
        ];

        // Prepare customer details
        $customerDetails = [
            'first_name' => $order->user->name,
            'email' => $order->user->email,
        ];

        // Prepare transaction payload
        $transaction = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
            'callbacks' => [
                'finish' => route('payment.notification') // URL for notification handling
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($transaction);
            return view('user.pay', compact('snapToken', 'order'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function notificationHandler(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            $order = Order::where('id_order', explode('-', $request->order_id)[0])->first();
            if ($order) {
                switch ($request->transaction_status) {
                    case 'capture':
                        $order->payment_date = now();
                        $order->status = 'Lunas';
                        $order->save();
                        return response()->json(['payment_status' => 'Lunas']);
                        break;
                    case 'deny':
                        // Handle other cases
                        break;
                    case 'challenge':
                        // Handle other cases
                        break;
                    default:
                        // Handle other cases
                        break;
                }
            }
        }
    }

    
}
