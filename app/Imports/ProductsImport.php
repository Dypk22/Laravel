<?php 

namespace App\Imports;
   
use App\Models\Product;
use App\Models\ProductTemp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $date = date('Y-m-d');
        return new ProductTemp([
            'code' => 'boru'.mt_rand(100000, 999999), 
            'category_id' => $row['category_id'],
            'subcategory_id' => $row['subcategory_id'], 
            'brand_id' => $row['brand_id'],
            'en_name' => $row['en_name'], 
            'hi_name' => $row['hi_name'], 
            'ma_name' => $row['ma_name'],
            'amount' => $row['amount'], 
            'min_qty' => $row['min_qty'], 
            'is_subscribe' => $row['is_subscribe'], 
            'subscribe_amount' => $row['subscribe_amount'], 
            'returnable' => $row['returnable'], 
            'unit_id' => $row['unit_id'],
            'en_description' => $row['en_description'], 
            'hi_description' => $row['hi_description'], 
            'ma_description' => $row['ma_description'], 
            'img_url' => '',//$row['img_url'], 
            'img_url_thumb' => '',//$row['img_url_thumb'], 
            'is_active' => 'inactive', //$row['is_active'], 
            'created_by' => 2022, //$row['created_by'], 
            'is_status' => null, //$row['is_status'], 
            'updated_by' => 0, //$row['updated_by'],
            'created_at' => $date, //row['created_at'],
            'updated_at' => $date, //row['updated_at']
            'availability' => 'all'
        ]);
    }
}

 ?>