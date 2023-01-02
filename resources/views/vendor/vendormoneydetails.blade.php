@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
  
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">Vendor Receive Money </h6>
                  <!-- <h6 class="text-right mr-2"><a href="" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Vendor Product</a></h6> -->
                 
                  <div class="mt-3 mb-3"> 
                  <p class="mx-3">Total Money : {{$totalProduct[0]->TotalPrd}}</p>
                  <p class="mx-3">Receive Money : {{$ReceiveMoney[0]->Recieve}}</p>
                  <p class="mx-3">Pending Money : {{$totalProduct[0]->TotalPrd - $ReceiveMoney[0]->Recieve}} </p>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr >
                          <th class="text-left">#</th>
                          <th class="text-center">Photo</th>
                          <th class="text-center">Title</th>
                          <th class="text-center">Date</th>
                          <th class="text-center">Price</th>
                          
                        
                        </tr>
                      </thead>
                   
                      <tbody>
                        
          
          @foreach($wallets as $wallet)
                        <tr >
                          <td class="text-left">{{$loop->iteration}}</td>
                            <td>
                                <img src="{{url('vendor_image',$wallet->Photo)}}" width="50" alt="receive">
                            </td>
                          <td class="text-center">{{$wallet->Title}}</td>
                          <td class="text-center">{{$wallet->Date}}</td>
                          <td class="text-center">{{$wallet->Price}}</td>
                         
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