<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'sku' => $row[1],
            'category_id' => $row[2],
            'description' => $row[3],
            'purchase_price' => $row[4],
            'selling_price' => $row[5],
            'supplier_id' => $row[6],
        ]);
    }
}
