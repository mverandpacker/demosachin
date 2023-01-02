@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
  
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">All Quotation</h6>
                  <!-- <h6 class="text-right mr-2"><a href="{{url('/Quotation')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Quotation</a></h6> -->
                  <div class="table-responsive">
                
                  <p class="text-right mx-4 "><span><input type="button" id="btnExport" class="bg-info p-2 mr-3" style="border:none; border-radius:5px;" value="Pdf" onclick="Export()" /></span><button type="button" id="export_button" onclick="exportTableToExcel('employee_data', 'members-data')" class="btn bg-success btn-sm p-2 " style="border:none; border-radius:5px;">Export</button></p>
                    <table class="table table-hoverable caption-top" id="employee_data">
                    <caption style="caption-side: top;" class="mx-3">{{$alldetails[0]->tbheading}}</caption>
                      <thead>
                      <tr >
                          <th class="text-left">Serial No</th>
                          <th class="text-center">Tittle</th>
                          <th class="text-center">Model</th>
                          <th class="text-center">Serial</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">DateTime</th>

                            
                          <!-- <th class="text-center">Edit</th>
                          <th class="text-center">Add</th>
                          <th class="text-center"> view</th>
                          <th class="text-center">Delete</th> -->
                          
                        </tr>
                      </thead>
               
                      <tbody>
                  @foreach($alldetails as $value)
               
                        <tr >
                          <td class="text-left">{{$loop->iteration}}</td>
                          <td class="text-center">{{$value->Title}}</td>
                          <td class="text-center">{{$value->Model}}</td>
                          <td class="text-center">{{$value->Serial}}</td>
                          <td class="text-center">{{$value->price}}</td>
                          <td class="text-center">{{$value->created_at}}</td>
                       
                         
                          <!-- <td class="text-center">
                              <a href=""><i class="fa-regular fa-pen-to-square" style="color:#7a00ff;"></i></i></a>
                          </td> -->
                          <!-- <td class="text-center">
                            <a href=""  >
                            <i class="fa-sharp fa-solid fa-cart-plus "></i>
                            </a>
                          </td> -->
                          <!-- <td class="text-center">
                            <a href="">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                          </td> -->
                          <!-- <td class="text-center">
                            <a onclick="return confirm('Are you sure delete one vendor?')" href=""><i class="fa-solid fa-trash" style="color:red;"></i></a>
                          </td>-->
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
