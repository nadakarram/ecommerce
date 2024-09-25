<?php

namespace App\Livewire;

use App\Models\cart;
use Livewire\Attributes\On;
use Livewire\Component;

class Cartcount extends Component
{
     
       public $cartcount;
 
       #[On("cart_add_item")]
       #[On("cart_remove_items")]
    public function mount(){

     
        if(cart::where("user_id",auth()->user()->id)->count()){
        
            $this->cartcount=cart::where("user_id",auth()->user()->id)->count();
           
                   }else{
            $this->cartcount=0;
            
                   } 
    }

    public function render()
    {
       
      
        return view('livewire.cartcount',["cartcount",$this->cartcount]);
    }
}
