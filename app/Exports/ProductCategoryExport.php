<?php

namespace App\Exports;

use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductCategoryExport implements FromView{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.product.category.excel', [
            'all' => ProductCategory::where('prodcate_status',1)->orderBy('prodcate_id','DESC')->get(),
        ]);
    }
}
