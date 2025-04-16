<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\BillplzService;
use Illuminate\Http\Request;

class BillplzController extends Controller
{
    protected $billplzService;

    public function __construct(BillplzService $billplzService)
    {
        $this->billplzService = $billplzService;
    }

    public function callback(Request $request)
    {
        $data = $this->billplzService->verifyCallbackRequest($request->all());
        
        if (!empty($data['order_id']) && $data['paid']) {
            $order = Order::find($data['order_id']);
            if ($order) {
                $order->payment_status = 'paid';
                $order->billplz_id = $data['billplz_id'];
                $order->save();
            }
        }

        return response('OK');
    }

    public function redirect(Request $request)
    {
        $data = $this->billplzService->verifyRedirectRequest($request->all());
        
        if ($request->has('billplz') && isset($request->billplz['reference_1'])) {
            $orderId = $request->billplz['reference_1'];
            $order = Order::find($orderId);
            
            if ($order) {
                if ($data['paid']) {
                    $order->payment_status = 'paid';
                    $order->billplz_id = $data['billplz_id'];
                    $order->save();
                    
                    return redirect()->route('checkout.success', $order)
                        ->with('success', 'Payment successful! Your order has been confirmed.');
                } else {
                    return redirect()->route('checkout.success', $order)
                        ->with('error', 'Payment was not successful. Please try again or contact support.');
                }
            }
        }
        
        return redirect()->route('home')->with('error', 'Unable to process payment. Please try again.');
    }
} 