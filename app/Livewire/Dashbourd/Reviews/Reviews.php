<?php

namespace App\Livewire\Dashbourd\Reviews;

use App\Models\product;
use App\Models\review;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Reviews extends Component
{
    use WithPagination;
    public $search;
  
    #[On("search")]
    public function handelsearch(string $search =null){
        
        $users=User::all();
        // foreach($users as $user){
        //     if($user->name==$search){
                // $this->search=$search;
        //     }
        // }
        // dd($this->search);
        // $this->search=$search;
      
        if($search!=null){
            foreach ($users as $user) {
            if ($user->name==$search) {

               $this->search=$user->id;
            }
            # code...
        }
         
        }else{
            $this->search=$search;
        }


    }
    public $filterby=0;
    public $ctaname="All";
    public function filterbycategory($product_id){
        $products=product::all();
        foreach ($products as $product) {
            if($product->id==$product_id){
                $this->ctaname=$product->name;
            }
            
        }
        $this->filterby=$product_id;

    }
    public function allproduct(){
        $this->filterby=0;
        

    }
    public function render()
    {
        $reviews=review::where("user_id","like","%{$this->search}%")->paginate(5);
        if($this->filterby==0){
            
            //    dd(!product::where("category_id",$this->filterby)->exists());
                $reviews=review::where('user_id','like','%'.$this->search.'%')->paginate(5);
            }else{ 
                $reviews=review::where('user_id','like','%'.$this->search.'%')->where("category_id",$this->filterby)->paginate(5);
            }
        $products=product::all();
        $users=User::all();

        return view('livewire.dashbourd.products.products')->with(['reviews'=>$reviews,"users"=>$users,"products"=>$products]);
    }
}

