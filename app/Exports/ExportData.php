<?php

namespace App\Exports;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportData implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::select(
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
        )->get(); 
    }
}
