<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Services\BillplzService;

class CartController extends Controller
{
    protected $billplzService;

    public function __construct(BillplzService $billplzService)
    {
        $this->billplzService = $billplzService;
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('shop.cart', compact('cart', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity', 1);
        
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'photo' => $product->photo,
                'description' => $product->description
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $action = $request->input('action', 'update');
        
        if(isset($cart[$id])) {
            if($action === 'increase') {
                $cart[$id]['quantity']++;
            } elseif($action === 'decrease') {
                if($cart[$id]['quantity'] > 1) {
                    $cart[$id]['quantity']--;
                } else {
                    unset($cart[$id]);
                }
            } else {
                $quantity = max(1, intval($request->input('quantity', 1)));
                $cart[$id]['quantity'] = $quantity;
            }
            
            session()->put('cart', $cart);
        }
        
        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->back();
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        if(count($cart) === 0) {
            return redirect()->route('home')->with('error', 'Your cart is empty');
        }
        
        return view('shop.checkout', compact('cart', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);
        
        if(count($cart) === 0) {
            return redirect()->route('home')->with('error', 'Your cart is empty');
        }

        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'customer_name' => $request->first_name . ' ' . $request->last_name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'shipping_address' => $request->address . ', ' . $request->city . ', ' . $request->state . ', ' . $request->postcode . ', ' . $request->country,
            'total_amount' => $total,
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => $request->payment_method,
            'billplz_id' => null
        ]);

        foreach($cart as $id => $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity']
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        // If payment method is gateway, redirect to Billplz
        if ($request->payment_method === 'paypal') {
            $billplzResponse = $this->billplzService->createBill($order);
            
            if ($billplzResponse && isset($billplzResponse['url'])) {
                return redirect($billplzResponse['url']);
            } else {
                return redirect()->route('checkout.success', $order)
                    ->with('error', 'Unable to process payment. Please contact support.');
            }
        }

        return redirect()->route('checkout.success', $order)
            ->with('success', 'Order placed successfully!');
    }

    public function success(Order $order)
    {
        return view('shop.checkout-success', compact('order'));
    }
}
