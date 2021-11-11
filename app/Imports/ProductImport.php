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
        Product::updateorCreate([
            'sku' => $row['sku']
            ],

            [
                'sku' => $row['sku'],
                'name' => $row['name'],
                'key_words' => $row['key_words'],
                'description' => $row['description'],
                'specs' => $row['specs'],
                'normal_price' => $row['normal_price'],
                'discount' => $row['discount'],
                'final_price' => ($row['normal_price']-(($row['normal_price']*$row['discount'])/100)),
                'quantity' => $row['quantity'],
                'max_per_order' => $row['max_per_order'],
                'materials' => $row['materials'],
                'maker' => $row['maker'],
                'provider_id' => Auth::user()->provider_id,
                'category_id' => $row['category_id'],
                'imported' => '1'
                
            ]);
        /*if(!(Product::find($row['sku']))){
                Product::where('imported',0)->delete();
        }*/
    }
}
