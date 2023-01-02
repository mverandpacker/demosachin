@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">All Payment</h6>
                  <!-- <h6 class="text-right mr-2"><a href="{{url('/product')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Product</a></h6> -->
                  <p class="text-right mx-4 "><span><input type="button" id="btnExport" class="bg-info p-2 mr-3" style="border:none; border-radius:5px;" value="Pdf" onclick="Export()" /></span><button type="button" id="export_button" onclick="exportTableToExcel('employee_data', 'members-data')" class="btn bg-success btn-sm p-2 " style="border:none; border-radius:5px;">Export</button></p>
                  <div class="table-responsive">
                    <table class="table table-hoverable" id="employee_data">
                    <caption style="caption-side: top;" class="mx-3 font-weight-bolder">All Payment</caption>
                      <thead>
                        <tr>
                           
                          <th class="text-left font-weight-bolder">Serial No.</th>
                          <th class="font-weight-bolder">Customer Name</th>
                          <th class="font-weight-bolder">Email</th>
                          <th class="font-weight-bolder">Phone</th>
                          <th class="font-weight-bolder">productbuy</th>
                          <th class="font-weight-bolder">Receive</th>
                          <th class="font-weight-bolder">Pending</th>
                          <!-- <th>Delete</th> -->
                          
                        </tr>
                      </thead>
                      <tbody>
                    @foreach($AllReceive as $key => $val)
                        <tr>
                          <td class="text-left font-weight-bold">{{($AllReceive->currentpage()-1) *  $AllReceive->perpage() + $key + 1}}</td>
                         
                          <td class="font-weight-bold">{{$val->Name}}</td>
                          <td class="font-weight-bold">{{$val->Email}}</td>
                          <td class="font-weight-bold">{{$val->Phone}}</td>
                          <td class="font-weight-bold">{{$val->productbuy}}</td>
                          <td class="font-weight-bold">{{$val->Receive}}</td>
                          <td class="font-weight-bold">{{$val->Pending}}</td>
                        
<!--                       
                          <td>
                          <a onclick="return confirm('Are you sure delete one product?')" href=""><i class="fa-solid fa-trash" style="color:red;"></i></a>
                          </td> -->
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
                  @if ($AllReceive->hasPages())
                      <div class="pagination-wrapper">
                          {{ $AllReceive->links()  }}
                      </div>
                  @endif
                  </div>
                </div>
              </div>
    </div>
  </div>
@endsection