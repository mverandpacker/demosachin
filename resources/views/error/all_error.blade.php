@extends('layout.main')
 @section('main-container')  
      <!-- partial -->

      @if(\Session::has('error'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('error') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">All Error</h6>
                  <h6 class="text-right mr-2"><a href="{{url('/error_page')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Error</a></h6>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                        <tr>
                          <th class="text-left">#</th>
                          <th>Error_Photo</th>
                          <th>Error_tittle</th>
                          <th>Error_discription</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                   
                      <tbody>
                  
                  @foreach($error as $key => $val)
                        <tr>
                          <td class="text-left">{{($error->currentpage()-1) *  $error->perpage() + 
                            $key + 1}}</td>
                          <td>
                            <img src="{{url('error/',$val->Err_photo)}}" alt="error" width="80"  />
                          </td>
                          <td> 
                            <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3">{{$val->Err_title}}</textarea>
                            </td>
                          <td>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$val->Err_discription}}</textarea>
                        </td>
                          <td>
                              <a href="{{route('edit_error',[$val->id])}}"><i class="fa-regular fa-pen-to-square" style="color:#7a00ff;"></i></i></a>
                          </td>
                          <td>
                            <a onclick="return confirm('Are you sure delete one vendor?')" href="{{route('del_error',[$val->id])}}"><i class="fa-solid fa-trash" style="color:red;"></i></a>
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
                  @if ($error->hasPages())
                      <div class="pagination-wrapper">
                          {{ $error->links()  }}
                      </div>
                  @endif
                  </div>
                </div>
              </div>
    </div>
  </div>

@endsection