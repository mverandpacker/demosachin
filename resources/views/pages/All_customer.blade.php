@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        
                <div class="mdc-card p-0">
        
                  <h6 class="card-title card-padding pb-0">All Customers</h6>
                   <!-- <div class="mx-3 "><input type="search" placeholder="email and name"  name="search"  style=" border: 1px groove  orange;">
               
                   <button class="btn btn-primary" >Search</button> 
                  </div> -->
                  <form action="{{route('search')}}" class="mx-2 mt-2" method="GET">
                    <input type="text" name="search" style=" border: 1px groove  orange;" required/>
                    <button type="submit" style="border:none; padding:5px; " >Search</button>
                </form>
                  <h6 class="text-right mr-2"><a href="{{url('/add_customer')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Customers</a></h6>
               
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th class="text-left">#</th>
                          <th >Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Edit</th>
                          <th>View</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($customer as $key=> $value)
                        <tr>
                          <td class="text-left">{{($customer->currentpage()-1) * $customer->perpage() + $key +1}}</td>
                          <td>{{$value->Name}}</td>
                          <td>{{$value->Email}}</td>
                          <td>{{$value->Phone}}</td>
                          <td>{{$value->Address}}</td>
                          <td>
                      
                        <a href="{{route('all_customer.edit',[$value->id])}}"><i class="fa-solid fa-user-pen" style="color:#7a00ff;"></i></a>
                          </td>
                          <td>
                            <a href="{{route('customer_details',[$value->id])}}"><i class="fa-solid fa-eye" style="color:#7a00ff;"></i></a>
                          </td>
                          <td>
                          <a onclick="return confirm('Are you sure Delete one Customer?')" href="{{route('del',[$value->id])}}"><i class="fa-solid fa-trash" style="color:#7a00ff;"></i></a>
                          </td>
                        
                        </tr>
                      
                        @endforeach
                      </tbody>
                    </table>
                    {{ $customer->links() }}
                
                  </div>
                </div>
              </div>
    </div>
  </div>
 @endsection