<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;

    use Sortable;

    protected $fillable = [
        'order_date',
        'username',
        'order_id',
        'customer_address',
        'customer_phone',
        'user_kelurahan',
        'user_kecamatan',
        'cod_ammount',
        'product_checking',
        'status_confirm',
        'status_sending',
        'status_cod_ammount',
        'status_pod',
        'status_order',
        'keterangan',
        'status_transaction',
        'product_received',
    ];

    public $sortable = [
        'order_date', 
        'username', 
        'order_id', 
        'customer_address', 
        'customer_phone',
        'user_kelurahan',
        'user_kecamatan',
        'cod_ammount',
        'product_checking',
        'status_sending',
        'status_cod_ammount',
        'status_pod',
        'status_order',
        'keterangan',
        'status_transaction',
        'product_received',
    ];

    public function images()
   {
       return $this->hasOne(Image::class); 
   }


   /*public static function getOrderId($id)
   {
       return Image::where('order_id', $id)->get();
   }*/

   public static function getData()
    {
        return Order::with('images')->get();
    }

    public static function index()
    {
        return Order::all();
    }

    public static function updateStatusChecking(Order $order)
    {
        $order->update([
            'product_checking' => 'done',
        ]);
    }

    public static function updateStatusCheckingPending(Order $order)
    {
        if ($order->status_confirm == 'confirm') {
            $order->update([
                'product_checking' => 'done',
            ]);
        } else if ($order->status_sending == 'sent') {
            $order->update([
                'product_checking' => 'done',
            ]);
        } else if ($order->status_cod_ammount == 'paid') {
            $order->update([
                'product_checking' => 'done',
            ]);
        } else if ($order->status_pod == 'pod') {
            $order->update([
                'product_checking' => 'done',
            ]);
        } else if ($order->status_order == 'delivered') {
            $order->update([
                'product_checking' => 'done',
            ]);
        } else {
            $order->update([
                'product_checking' => 'pending',
            ]);
        }
    }

    public static function updateStatusConfirm(Order $order)
    {
        if ($order->product_checking == 'pending') {
            $order->update([
                'status_confirm' => 'pending',
            ]);
        } else {
            $order->update([
                'status_confirm' => 'confirm',
            ]);
        } 
    }

    public static function updateStatusSent(Order $order)
    {
        if ($order->status_confirm == 'pending') {
            $order->update([
                'status_sending' => 'pending',
            ]);
        } else {
            $order->update([
                'status_sending' => 'sent',
            ]);
        } 
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
        if ($order->product_checking == 'pending') {
            $order->update([
                'status_cod_ammount' => 'pending',
            ]);
        } else {
            $order->update([
                'status_cod_ammount' => 'paid',
            ]);
        }
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
        if ($order->product_checking == 'pending') {
            $order->update([
                'status_pod' => 'pending',
            ]);
        } else {
            $order->update([
                'status_pod' => 'pod',
            ]);
        }
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
        if ($order->product_checking == 'pending') {
            $order->update([
                'status_order' => 'undelivered',
            ]);
        } else if ($order->status_sending == 'pending') {
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
        if ($order->status_transaction == 'unfinished') {
            $order->update([
                'status_order' => 'undelivered',
            ]);
        } else {
            $order->update([
                'status_order' => 'delivered',
            ]);
        }
    }

    public static function updateStatusTransaction(Order $order)
    {
        
        if ($order->product_checking == 'pending') {
            $order->update([
                'status_transaction' => 'unfinished',
            ]);
        } else if ($order->status_sending == 'pending') {
            $order->update([
                'status_transaction' => 'unfinished',
            ]);
        } else if ($order->status_cod_ammount == 'pending') {
            $order->update([
                'status_transaction' => 'unfinished',
            ]);
        } else if ($order->status_pod == 'pending') {
            $order->update([
                'status_transaction' => 'unfinished',
            ]);
        } else if ($order->status_order == 'undelivered') {
            $order->update([
                'status_transaction' => 'unfinished',
            ]);
        } else {
            $order->update([
                'status_transaction' => 'finished',
            ]);
        }
    }

    public static function updateStatusTransactionUnfinished(Order $order)
    {
        if ($order->product_received == 'received') {
            $order->update([
                'status_transaction' => 'finished',
            ]);
        } else {
            $order->update([
                'status_transaction' => 'unfinished',
            ]);
        }
    }

    public static function updateStatusReceived(Order $order)
    {
        if ($order->status_transaction == 'unfinished') {
            $order->update([
                'product_received' => 'pending',
            ]);
        } else {
            $order->update([
                'product_received' => 'received',
            ]);
        }

        
    }

    public static function updateStatusReceivedPending(Order $order)
    {
        $order->update([
            'product_received' => 'pending',
        ]);
    }
    

}
