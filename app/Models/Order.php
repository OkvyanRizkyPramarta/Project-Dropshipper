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
    public static function updateStatusPaid(Order $order)
    {
        $order->update([
            'status_cod_ammount' => 'paid',
        ]);
    }
    public static function updateStatusPod(Order $order)
    {
        $order->update([
            'status_pod' => 'pod',
        ]);
    }
}
