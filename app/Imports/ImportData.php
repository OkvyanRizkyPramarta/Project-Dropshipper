<?php

namespace App\Imports;

use App\Models\Data;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportData implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function model(array $row)
    {
        return new Order([
            'order_date' => $this->transformDate($row[0]),
            'username' => $row[1], 
            'order_id' => $row[2], 
            'customer_address' => $row[3], 
            'customer_phone' => $row[4], 
            'user_kelurahan' => $row[5], 
            'user_kecamatan' => $row[6], 
            'cod_ammount' => $row[7], 
            'status_sending' => $row[8], 
            'status_cod_ammount' => $row[9], 
            'status_pod' => $row[10], 
            'status_order' => $row[11], 
            'keterangan' => $row[12], 
        ]);
    }
}
