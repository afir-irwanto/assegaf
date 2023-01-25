<?php

namespace App\Imports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PurchasesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Purchase([
            'detail'     => $row['detail'],
            'amount'    => $row['amount'], 
            'price'    => $row['price'], 
            'total_purchase'    => $row['total_purchase'], 
        ]);
    }
}
