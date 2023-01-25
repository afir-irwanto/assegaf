<?php

namespace App\Imports;

use App\Models\Sales;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sales([
            'item'     => $row['item'],
            'customer'    => $row['customer'], 
            'quantity'    => $row['quantity'], 
            'price'    => $row['price'], 
            'total_price'    => $row['total_price'], 
        ]);
    }
}
