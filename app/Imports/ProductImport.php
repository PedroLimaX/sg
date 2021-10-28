<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Product::updateorCreate([
            'code' => $row['code']
            ],

            [
            'code' => $row['code'],
            'name' => $row['name'],
            'key_words' => $row['key_words'],
            'description' => $row['description'],
            'specs' => $row['specs'],
            'price' => $row['price'],
            'stock' => $row['stock'],
            'max_per_order' => $row['max_per_order'],
            'materials' => $row['materials'],
            'maker' => $row['maker'],
            'provider_id' => Auth::user()->provider_id,
            'category_id' => $row['category_id'],
        ]);
    }
}
