<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;

class BillplzService
{
    protected $apiKey;
    protected $collectionId;
    protected $xSignatureKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('BILLPLZ_API_KEY', '');
        $this->collectionId = env('BILLPLZ_COLLECTION_ID', '');
        $this->xSignatureKey = env('BILLPLZ_X_SIGNATURE', '');
        $this->baseUrl = env('BILLPLZ_SANDBOX', true) 
            ? 'https://www.billplz-sandbox.com/api' 
            : 'https://www.billplz.com/api';
    }

    public function createBill(Order $order)
    {
        $response = Http::withBasicAuth($this->apiKey, '')
            ->post($this->baseUrl . '/v3/bills', [
                'collection_id' => $this->collectionId,
                'email' => $order->customer_email,
                'name' => $order->customer_name,
                'amount' => $order->total_amount * 100, // Convert to smallest unit (cents)
                'callback_url' => route('billplz.callback'),
                'redirect_url' => route('billplz.redirect'),
                'description' => 'Order #' . $order->id,
                'reference_1_label' => 'Order ID',
                'reference_1' => $order->id,
                'mobile' => $order->customer_phone
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function verifyRedirectRequest($data)
    {
        $billplzId = $data['billplz']['id'] ?? null;
        $billplzPaidAmount = $data['billplz']['paid'] ?? null;
        $billplzPaid = $billplzPaidAmount === 'true' || $billplzPaidAmount === true;
        
        return [
            'billplz_id' => $billplzId,
            'paid' => $billplzPaid
        ];
    }

    public function verifyCallbackRequest($data)
    {
        $billplzId = $data['id'] ?? null;
        $billplzPaidAmount = $data['paid'] ?? null;
        $billplzPaid = $billplzPaidAmount === 'true' || $billplzPaidAmount === true;
        $orderId = $data['reference_1'] ?? null;
        
        return [
            'billplz_id' => $billplzId,
            'paid' => $billplzPaid,
            'order_id' => $orderId
        ];
    }
} 