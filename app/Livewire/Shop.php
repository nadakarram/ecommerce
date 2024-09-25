<?php

namespace App\Livewire;

use App\Models\category;
use App\Models\product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
#[Layout("layouts.nav_footer")]
class Shop extends Component
{
    use WithPagination;
    public $search;
    public $filterby=0;
    public $sort="ASC";

    public $category_id;
    // public $products;
    #[On("search")]
    public function handelsearch(string $search =null){
        $this->search=$search;

    }
    public function filterbycategory($category_id){
        $this->filterby=$category_id;

    }
    public function allproduct(){
        $this->filterby=0;
        

    }
    public function sortdata(){
        $this->sort=$this->sort=="ASC"?"DESC":"ASC";
    }
    public function render()
    {
        $categories=category::all();
    
        if($this->filterby==0){
            
        //    dd(!product::where("category_id",$this->filterby)->exists());
            $this->products=product::where('name','like','%'.$this->search.'%')->orderBy('price', $this->sort)->paginate(12);
        }else{ 
            $this->products=product::where('name','like','%'.$this->search.'%')->where("category_id",$this->filterby)->orderBy('price', $this->sort)->paginate(12);
        }
       
        return view('livewire.shop',[
            "products"=>$this->products,
            "categories"=>$categories
        ]);
    }
}
