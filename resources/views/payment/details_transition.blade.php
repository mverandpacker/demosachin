@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif

      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        
                <div class="mdc-card p-0">
        
                  <h6 class="card-title card-padding pb-0">Single Purchase</h6>
                   <!-- <div class="mx-3 "><input type="search" placeholder="email and name"  name="search"  style=" border: 1px groove  orange;">
               
                   <button class="btn btn-primary" >Search</button> 
                  </div> -->
                  <div class="row d-flex mx-auto" style="box-shadow:0px 0px 1px 0px #7a00ff; width:500px;height:230px;padding:10px; border-radius:2px;">
                        <div class="col" style="height:20px;margin-left:50px; margin-top:25px; ">  <p>
                        <img src="{{url('product_image/',$buyproduct[0]->Photo)}}" alt="product" width="200">
                    </p></div>
                        <div class="col mt-4" style="height:20px; margin-left:50px; ">
                        <p>Title : {{$buyproduct[0]->Title}} </p>
                        <p>Model : {{$buyproduct[0]->Model}} </p>
                        <p>Serial NO : {{$buyproduct[0]->Serial_NO}} </p>
                  <p>Date : {{$buyproduct[0]->Date}}</p>
                  <p>Description : {{$buyproduct[0]->Description}}</p>
                    </div>
                  </div>
             
              <div >
                <div class="d-flex mt-3 mb-4" style="justify-content: space-evenly;">
                    <div class="p-2 font-bold" style="background-color:#9ecfff;color:white;border-radius:3px; box-shadow:0px 0px 5px 0px #9ecfff;">  <p class="mt-1">Total Price   : {{$buyproduct[0]->Total_price}}</p></div>
                    <div class="p-2" style="background-color:#7aff99;color:white;border-radius:3px; box-shadow:0px 0px 5px 0px #7aff99;"> <p class="mt-1">Receive Money : {{ $paymentReceive[0]->receives}}</p></div>
                    <div class="p-2" style="background-color:#ff8680;color:white;border-radius:3px; box-shadow:0px 0px 5px 0px #ff8680;"><p class="mt-1">Pending Amount : {{$buyproduct[0]->Total_price - $paymentReceive[0]->receives }}</p></div>
                </div>
                <!-- <div >

                    <p>
                        <img src="{{url('product_image/',$buyproduct[0]->Photo)}}" alt="product" width="150">
                    </p>
                </div> -->
                <!-- <div >
                <p>Title : {{$buyproduct[0]->Title}} </p>
                  <p>Date : {{$buyproduct[0]->Date}}</p>
                  </div>
                <p>Total Price   : {{$buyproduct[0]->Total_price}}</p>
                <p>Receive Money : {{ $paymentReceive[0]->receives}}</p>
                <p>Pending Amount : {{$buyproduct[0]->Total_price - $paymentReceive[0]->receives }}</p>
              </div> -->
                <div>
                 
                </div> 
               
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th >#</th>
                          <th >Date</th>
                          <th>Receive_Money</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        
                          @foreach($All_transaction as $transaction)
                          <tr>
                        <td>{{$loop->iteration}}</td>
                       <td>{{$transaction->Date}}</td>
                       <td>{{$transaction->Total_money}}</td>
                       
                        </tr>
                             @endforeach
                      </tbody>
                    </table>
            
                 
                
              
                  </div>
                  
                </div>
              </div>
    </div>
  </div>
 @endsection