<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    protected $data;
    
    public function __construct(Collection $data)
    {
        $this->data = $data;
    }
    
    public function collection()
    {
        //
//         $products =  Product::select('products.*', 'c.name as category_name')
//            ->join('categories as c', 'c.id', 'products.category_id')
//            ->orderBy('id', 'ASC')
//            ->get();
//
//         foreach ($products as $key => $data) {
//             $data->id = $key+1;
//         }
         
//         return $products;
        
        return $this->data;
    }
    
    public function map($product):array{
        
        return [
            $product->id,
            $product->name,
            $product->category_name,
            number_format($product->purchase_price, 0,','),
            number_format($product->selling_price, 0,','),
            $product->stock,
        ];
    }
    
    public function headings():array{
    
        return [
            'No',
            'Nama Produk',
            'Kategori Produk',
            'Harga Barang',
            'Harga Jual',
            'Stok'
        ];
    }
}
