<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'username',
        'order_id',
        'customer_address',
        'customer_phone',
        'user_kelurahan',
        'user_kecamatan',
        'cod_ammount',
        'status_sending',
        'status_cod_ammount',
        'status_pod',
        'status_order',
        'keterangan',
    ];

    public static function index()
    {
        return Order::all();
    }

    public static function updateStatusSent(Order $order)
    {
        $order->update([
            'status_sending' => 'sent',
        ]);
    }

    public static function updateStatusSentPending(Order $order)
    {
        if ($order->status_order == 'delivered') {
            $order->update([
                'status_sending' => 'sent',
            ]);
        } else {
            $order->update([
                'status_sending' => 'pending',
            ]);
        } 
    }

    public static function updateStatusPaid(Order $order)
    {
        $order->update([
            'status_cod_ammount' => 'paid',
        ]);
    }

    public static function updateStatusPaidPending(Order $order)
    {
        if ($order->status_order == 'delivered') {
            $order->update([
                'status_cod_ammount' => 'paid',
            ]);
        } else {
            $order->update([
                'status_cod_ammount' => 'pending',
            ]);
        } 
    }
    
    public static function updateStatusPod(Order $order)
    {
        $order->update([
            'status_pod' => 'pod',
        ]);
    }

    public static function updateStatusPodPending(Order $order)
    {
        if ($order->status_order == 'delivered') {
            $order->update([
                'status_pod' => 'pod',
            ]);
        } else {
            $order->update([
                'status_pod' => 'pending',
            ]);
        } 
    } 

    public static function updateStatusDel(Order $order)
    {
        if ($order->status_sending == 'pending') {
            $order->update([
                'status_order' => 'undelivered',
            ]);
        } else if ($order->status_cod_ammount == 'pending') {
            $order->update([
                'status_order' => 'undelivered',
            ]);
        } else if ($order->status_pod == 'pending') {
            $order->update([
                'status_order' => 'undelivered',
            ]);
        } else {
            $order->update([
                'status_order' => 'delivered',
            ]);
        }   
    }

    public static function updateStatusDelUndelivery(Order $order)
    {
        $order->update([
            'status_order' => 'undelivered',
        ]);
    }
}
