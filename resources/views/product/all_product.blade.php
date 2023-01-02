@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">All Customers</h6>
                  <h6 class="text-right mr-2"><a href="{{url('/product')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Product</a></h6>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th class="text-left">#</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Model</th>
                          <th>Serial_No.</th>
                          <th>Description</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                     @foreach($product as $key=> $value)
                        <tr>
                          <td class="text-left">{{ ($product->currentpage()-1) * $product->perpage() + $key + 1 }}</td>
                          <td>
                            <img src="{{url('product_image',$value->Photo)}}" alt="shop" width="80">
                          </td>
                          <td>{{$value->Title}}</td>
                          <td>{{$value->Model}}</td>
                          <td>{{$value->Serial_NO}}</td>
                          <td>
                           
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required> {{$value->Description}}</textarea>
                        </td>
                          <td>
                      
                        <a href="{{route('all_product.edit',[$value->id])}}"><i class="fa-regular fa-pen-to-square" style="color:#7a00ff;"></i></i></a>
                          </td>
                          <td>
                          <a onclick="return confirm('Are you sure delete one product?')" href="{{route('del_product',[$value->id])}}"><i class="fa-solid fa-trash" style="color:red;"></i></a>
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
                  @if ($product->hasPages())
                      <div class="pagination-wrapper">
                          {{ $product->links()  }}
                      </div>
                  @endif
                  </div>
                </div>
              </div>
    </div>
  </div>
@endsection