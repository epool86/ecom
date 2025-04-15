<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BillplzService;
use App\Models\Order;

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
        
        if ($data['billplz_id'] && $data['order_id']) {
            $order = Order::where('id', $data['order_id'])->first();
            
            if ($order) {
                $order->billplz_id = $data['billplz_id'];
                $order->payment_status = $data['paid'] ? 'paid' : 'failed';
                $order->save();
            }
        }
        
        return response('OK');
    }

    public function redirect(Request $request)
    {
        $data = $this->billplzService->verifyRedirectRequest($request->all());
        
        if ($data['billplz_id']) {
            $order = Order::where('billplz_id', $data['billplz_id'])->first();
            
            if ($order) {
                if ($data['paid'] && $order->payment_status !== 'paid') {
                    $order->payment_status = 'paid';
                    $order->save();
                    
                    return redirect()->route('checkout.success', $order)
                        ->with('success', 'Payment successful! Your order has been confirmed.');
                } elseif (!$data['paid']) {
                    return redirect()->route('checkout.success', $order)
                        ->with('error', 'Payment was not successful. Please try again or contact support.');
                }
                
                return redirect()->route('checkout.success', $order);
            }
        }
        
        return redirect()->route('home')
            ->with('error', 'We could not find your order. Please contact support.');
    }
} 