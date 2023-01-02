@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        
                <div class="mdc-card p-0">
        
                  <h6 class="card-title card-padding pb-0">Repair Details</h6>
                   <!-- <div class="mx-3 "><input type="search" placeholder="email and name"  name="search"  style=" border: 1px groove  orange;">
               
                   <button class="btn btn-primary" >Search</button> 
                  </div> -->
             
                  <h6 class="text-right mr-2"><a href="{{route('buy_repair',[$customer->id])}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">BUY Product</a></h6>
        
                  <div class="table-responsive">
                    <div class="mx-4">
                      
                        <ul style="list-style:none; line-height:25px;">
                            <li>Name :   {{$customer->Name}}</li>
                            <li>Email :   {{$customer->Email}}</li>
                            <li>Phone :   {{$customer->Phone}}</li>
                            <li>Address :   {{$customer->Address}}</li>
                        </ul>
                    </div>
                
                  </div>
                </div>
                
              </div>
              <style>
                body {
  background-color: #bcd9f5;
}
/* nav */
.card {
  max-width: 25rem;
  padding: 0;
  border: none;
  border-radius: 0.5rem;
}

a.active {
  border-bottom: 2px solid #55c57a;
}

.nav-link {
  color: rgb(110, 110, 110);
  font-weight: 500;
}
.nav-link:hover {
  color: #55c57a;
}

.nav-pills .nav-link.active {
  color: black;
  background-color: white;
  border-radius: 0.5rem 0.5rem 0 0;
  font-weight: 600;
}

.tab-content {
  padding-bottom: 1.3rem;
}

.form-control {
  background-color: rgb(241, 243, 247);
  border: none;
}

/* 3nd card */
span {
  margin-left: 0.5rem;
  padding: 1px 10px;
  color: white;
  background-color: rgb(143, 143, 143);
  border-radius: 4px;
  font-weight: 600;
}

.third {
  padding: 0 1.5rem 0 1.5rem;
}

label {
  font-weight: 500;
  color: rgb(104, 104, 104);
}

.btn-success {
  float: right;
}

.form-control:focus {
  box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 7px rgba(0, 0, 0, 0.2);
}

select {
  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: "";
}

/* 1st card */

ul {
  list-style: none;
  margin-top: 1rem;
  padding-inline-start: 0;
}

.search {
  padding: 0 1rem 0 1rem;
}

.ccontent li .wrapp {
  padding: 0.3rem 1rem 0.001rem 1rem;
}

.ccontent li .wrapp div {
  font-weight: 600;
}

.ccontent li .wrapp p {
  font-weight: 360;
} 

.ccontent li:hover {
  background-color: rgb(117, 93, 255);
  color: white;
}

/* 2nd card */

.addinfo {
  padding: 0 1rem;
}

              </style>
              <div class="container card shadow d-flex justify-content-center mt-5" style="max-width:none; border-radius:none; margin-top:0px auto; border-radius:none;">
      <!-- nav options -->
      <ul class="nav nav-pills mb-3 shadow-sm" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Buy Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Transition</a>
        </li>
       
      </ul>

      <!-- content -->
      <div class="tab-content" id="pills-tabContent p-3">
        <!-- 1st card -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
       
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <!-- <h6 class="card-title card-padding pb-0">Striped Table</h6> -->
                  <div class="table-responsive">
                    <table class="table table-striped ">
                      <thead>
               
                        <tr>
                          <th>#</th>
                          <th>Product Photo</th>
                          <th>Title</th>
                          <th>Date</th>
                          <th>Porduct Price</th>
                          <!-- <th >Customer view</th> -->
                          <th>Add Payment</th>
                        </tr>
                      </thead>
                      <tbody>
             
                 @foreach($productbuy as $buy)
                      
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>
                            <img src="{{url('rapair',$buy->Repair_photo)}}" alt="product" width="50" />
                          </td>
                          <td>{{$buy->Repair_title}}</td>
                          <td>{{$buy->Date}}</td>
                          <td>{{$buy->Price}}</td>
                          <!-- <td >
                          <a href="">
                          <i class="fa-solid fa-eye"></i>
                          </a>
                         </td> -->
                          <td>
                            <a href="{{route('Addmoney',[$buy->id,$customer->id])}}" class="btn bg-success text-white">Add Money</a>
                          </td>
                        </tr>
           @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>

        <!-- 2nd card -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="form-group addinfo">
            <style>
              .space{
                margin-left:50px;
              }
            </style>
          <ul class="d-flex" >
            <li class="space">Receive Money : {{$receiveMoney[0]->Receive}}</li>
            <li  class="space">Total Money : {{$pendingAmount[0]->Pending}} </li>
            
            
            <li class="space">Pending Money : {{$pendingAmount[0]->Pending - $receiveMoney[0]->Receive}}   </li>
          </ul>
       
            <table class="table table-striped ">
                      <thead>
                 
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                         
                          <th>Receive_Money</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($transiton as $details)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$details->Date}}</td>
                       
                          <td>{{$details->Total_Money}}</td>
                        </tr>
                  @endforeach
                      </tbody>
                    </table>
          </div>
        </div>
        <!-- 3nd card -->
      
      </div>
    </div>
    </div>
    
  </div>
  
@endsection