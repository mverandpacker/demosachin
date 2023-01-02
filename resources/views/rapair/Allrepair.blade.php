@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        
                <div class="mdc-card p-0">
        
                  <h6 class="card-title card-padding pb-0">All Repairs</h6>
                   <!-- <div class="mx-3 "><input type="search" placeholder="email and name"  name="search"  style=" border: 1px groove  orange;">
               
                   <button class="btn btn-primary" >Search</button> 
                  </div> -->
                  <!-- <form action="{{route('search')}}" class="mx-2 mt-2" method="GET">
                    <input type="text" name="search" style=" border: 1px groove  orange;" required/>
                    <button type="submit" style="border:none; padding:5px; " >Search</button>
                </form> -->
                  <h6 class="text-right mr-2"><a href="{{url('/repair')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Repair</a></h6>
               
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                    
                      <thead>
                        <tr>
                          <th class="text-left">#</th>
                          <th>Photo</th>
                        <th>Name</th>
                        <th>Mobile</th>
                          <th>Title</th>
                          <!-- <th>Price</th> -->
                          
                          
                          <th>View</th>
                        
                          
                        </tr>
                      </thead>
                      <tbody>
                    
                       @foreach($customerid as $key => $repairs)
                        <tr>
                          <td class="text-left">{{($customerid->currentpage()-1) *  $customerid->perpage() + $key + 1}}</td>
                          <td>
                            <img src="{{url('rapair',$repairs->Repair_photo)}}" width="50" alt="rapairimg">
                          </td>
                        <td>{{$repairs->Name}}</td>
                        <td>{{$repairs->Phone}}</td>
                          <td>{{$repairs->Repair_title}}</td>
                         
                          
                  
                          <td>
                            <a href="{{route('View_repair',[$repairs->id])}}"><i class="fa-solid fa-eye" style="color:#7a00ff;"></i></a>
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
                  @if ($customerid->hasPages())
                      <div class="pagination-wrapper">
                          {{ $customerid->links()  }}
                      </div>
                  @endif
                  </div>
                </div>
              </div>
    </div>
  </div>
@endsection