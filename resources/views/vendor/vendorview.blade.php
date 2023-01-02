@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
  
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">All Vendor Product</h6>
                  <h6 class="text-right mr-2"><a href="{{route('vendorProduct',[$Vproduct[0]->Vendor_id])}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Vendor Product</a></h6>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr >
                          <th class="text-left">#</th>
                          <th class="text-center">Photo</th>
                          <th class="text-center">Title</th>
                          <th class="text-center">Model</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Description</th>
                          <th class="text-center">Add Money</th>
                          <th class="text-center">Receive Money</th>
                        
                        </tr>
                      </thead>
                   
                      <tbody>
                        
             @foreach($Vproduct as $Vproducts)
                        <tr >
                          <td class="text-left">{{$loop->iteration}}</td>
                          <td class="text-center">
                            <img src="{{url('vendor_image',[$Vproducts->Photo])}}" width="50" alt="product">
                          </td>
                          <td class="text-center">{{$Vproducts->Title}}</td>
                          <td class="text-center">{{$Vproducts->Model}}</td>
                          <td class="text-center">{{$Vproducts->Price}}</td>
                          <td class="text-center">
                            <textarea name="disc" id="disc" cols="20" rows="5" style="border:5px double   #ff420f;">{{$Vproducts->Description}}</textarea>
                          </td>
                         <td>
                            <a href="{{route('VendorMoney',[$Vproducts->Vendor_id,$Vproducts->id])}}" class="btn bg-info text-white p-2 text-dark" style="border-radius:3px;">Add Money</a>
                         </td>
                         <td class="text-center">
                            <a href="{{route('vendorMOneyDetails',[$Vproducts->Vendor_id,$Vproducts->id])}}">
                            <i class="fa-solid fa-hand-holding-dollar" style="font-size:35px; color:#78c484;"></i>
                            </a>
                         </td>
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