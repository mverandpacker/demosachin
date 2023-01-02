@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
  
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">All Vendor</h6>
                  <h6 class="text-right mr-2"><a href="{{url('/vendor')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Vendor</a></h6>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr >
                          <th class="text-left">#</th>
                          <th class="text-center">Shop Name</th>
                          <th class="text-center">Name</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Number.</th>
                          <th class="text-center">Address</th>
                          <th class="text-center">Edit</th>
                          <th class="text-center">Product</th>
                          <th class="text-center">Product view</th>
                          <th class="text-center">Delete</th>
                          
                        </tr>
                      </thead>
                   
                      <tbody>
                   @foreach($vendor as $key=> $val)
                        <tr >
                          <td class="text-left">{{($vendor->currentpage()-1) * $vendor->perpage() + $key + 1}}</td>
                          <td class="text-center">{{$val->Shop_name}}</td>
                          <td class="text-center">{{$val->Vendor_name}}</td>
                          <td class="text-center">{{$val->Vendor_email}}</td>
                          <td class="text-center">{{$val->Vendor_number}}</td>
                          <td class="text-center">{{$val->Vendor_address}}</td>
                          <td class="text-center">
                              <a href="{{route('edit_vend',[$val->id])}}"><i class="fa-regular fa-pen-to-square" style="color:#7a00ff;"></i></i></a>
                          </td>
                          <td class="text-center">
                            <a href="{{Route('vendorProduct',[$val->id])}}"  >
                            <i class="fa-sharp fa-solid fa-cart-plus "></i>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="{{route('vendorView',[$val->id])}}">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                          </td>
                          <td class="text-center">
                            <a onclick="return confirm('Are you sure delete one vendor?')" href="{{route('delete_vend',[$val->id])}}"><i class="fa-solid fa-trash" style="color:red;"></i></a>
                          </td>
                        </tr>
              @endforeach
                       
                      </tbody>
                    </table>
                    <style>
                    .pagination-wrapper nav ul{
                      display:flex;
                      list-style:none;
                      
                    }
                    .pagination-wrapper nav ul li{
                      margin-left:20px;
                    }
                  </style>
                  @if ($vendor->hasPages())
                      <div class="pagination-wrapper">
                          {{ $vendor->links()  }}
                      </div>
                  @endif
                  </div>
                </div>
              </div>
    </div>
  </div>
@endsection