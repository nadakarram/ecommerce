<div class="container my-5">
    @if ($error!="")
   
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{$error}} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    
        
    @endif
    
    @if ($secuess!="")
   
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{$secuess}} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    
        
    @endif
<div class="row  ">
<div class=" ">
<div class="row">
    <div class="card card-custom  col-md-8">
                <h5 class="card-title "><i class="fas fa-shopping-cart text-warning"></i> Order summary</h5>
               
              
                <table class="table table-borderless mt-3     ">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($cartitems as $cartitem )<tr>
                            @if ($cartitem->type=="offer")
                          
                            @foreach ($offers as $offer )

                               
                               @if ($cartitem->product_id==$offer->id)
                       
                       
                            <td>
                                <a href="/offerdetails/{{$offer->id}}"><img src="{{asset("storage/".$offer->offer_image1)}}" alt="image" height="50" width="50"></a>
                                {{$offer->name}}
                            </td>
                            <td> offer</td>
                          
                       
                            @endif 
                            @endforeach
                                
                            @else
                            @foreach ($products as $product ) 
                            @if ($cartitem->product_id==$product->id)
                           
                                <td>
                                    <a href="/productdetails/{{$product->id}}"><img src="{{asset("storage/".$product->image1)}}" alt="image" height="50" width="50"></a>
                                    {{$product->name}}
                                </td>
                                <td>product</td>
                              
                           
                            @endif    
                            @endforeach
                            @endif

                      
                          <td>$ {{$cartitem->price}}</td>
                            <td>{{$cartitem->quantity}}</td>
                            <td>${{$cartitem->price*$cartitem->quantity}} </td>
                            <td class="text-center"><a   wire:click="deletefromcart({{$cartitem->id}})"><i class="fas fa-trash-alt text-dark" ></i></a></td>
                           </tr>
                        @endforeach
                 
                 
                    </tbody>
                </table>
                    
                <div class="text-center  mt-5">
                    <a  href="/shop" class="btn btn-outline-dark w-25"><i class="fas fa-shopping-bag"></i> start shopping</a >
               </div>
               

    </div>
    <div class="col-md-4">
        <div class="w-100">
            <!-- Payment Method -->
            
                {{-- <div class="card card-custom mb-4">
                    <h5 class="card-title">Payment method</h5>
                    <select class="form-select mb-3">
                        <option selected>Visa</option>
                        <option>Mastercard</option>
                        <option>PayPal</option>
                    </select>
                
                </div> --}}
            <!-- Order Summary -->
                <div class="card card-custom bg-light">
                    <h5 class="card-title"><i class="fas fa-shopping-bag text-warning"></i> Summary</h5>
                    <ul class="list-group list-group-flush bg-light">
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <span>Subtotal</span>
                            <span>$ {{$subtotal}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <span>Discount</span>
                            <span>${{$discount}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <span>Shipping</span>
                            <span>${{$Shipping}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold bg-light">
                            <span>Total</span>
                            <span>${{$subtotal+$Shipping-$discount}}</span>
                        </li>
                    </ul>
                    <button wire:click="makeorder" class="btn btn-purple mt-3 w-100">Order Now</button>
                </div>
    
            </div>
    </div>

</div>
           
            <!-- Delivery Options -->
            <div class="card card-custom mb-4 mt-4  col-md-8">
                <h5 class="mb-4"><i class="fas fa-drivers-license text-danger"></i> Delivery options</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="delivery-option  px-3 py-2   @if ($date!="standerd")
                        active
                            
                        @endif" id="instant-delivery" wire:click="deliveryoption('quick')" >
                            <h5>$22</h5>
                            <p>Instant delivery</p>
                            <p class="text-muted">Est. arrival: 2 Days</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                    
                        <div class="delivery-option  px-3 py-2  @if ($date=="standerd")
                        active
                            
                        @endif" id="standard-delivery" wire:click="deliveryoption('standerd')" >
                            <h5>$12</h5>
                            <p>Standard delivery</p>
                            <p class="text-muted">Est. arrival:
                                <small>Est. arrival: <?php
                                $date = date('Y-m-d', strtotime('+14 days'));
                                echo $date;?></p>
                        </div>
                    </div>
            
            
                </div>
            </div>
            <!-- Recipient Information -->
            <div class="card card-custom col-md-8">
                <h5 class="card-title mb-2"><i class="fas fa-person text-secondary"></i> Recipient information </h5>
                <form class="" wire:submit="updateUserData">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" wire:model="name" class="form-control" id="name" placeholder="Jane Doe" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="text" wire:model="phone_number" class="form-control" id="phone_number" placeholder="+1 123 456 7890" value="{{$user->phone_number}}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" wire:model="address" id="address" placeholder="123 Main St, Springfield" value="{{$user->address}}">
                    </div>
                    <input type="submit" class="btn btn-purple-outline " value="change">
                </form>
            </div>
        </div>


        

    </div>
    
 
</div>  








