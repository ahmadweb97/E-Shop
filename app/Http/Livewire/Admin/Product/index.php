<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $product_id;

    public function deleteProduct($product_id)
    {

        $this->product_id = $product_id;
    }


    public function destroyProduct()
    {

       $product = Product::find($this->product_id);

    /*     $path = 'uploads/category/'.$category->image;
       if(File::exists($path)){
          File::delete($path);
       }
 */
       if ($product->productImages) {
        foreach($product->productImages as $image){
            if (File::exists($image->image)) {
                File::delete($image->image);
            }
        }
    }


       $product->delete();
       session()->flash('msg', "Product has been deleted with all it's images successfully!");
       $this->dispatchBrowserEvent('close-modal');

    }


    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.product.index', ['products' => $products]);
    }
}
