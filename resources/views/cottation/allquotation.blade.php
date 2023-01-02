@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
  
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">All Quotation</h6>
                  <h6 class="text-right mr-2"><a href="{{url('/Quotation')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Quotation</a></h6>
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                    
                        <tr >
                          <th class="text-left">#</th>
                          <th class="text-center">Tittle</th>
                         
                            
                          <!-- <th class="text-center">Edit</th> -->
                          <th class="text-center">Add</th>
                          <th class="text-center"> view</th>
                          <th class="text-center">Delete</th>
                          
                        </tr>
                      </thead>
                   
                      <tbody>
                   @foreach($Quotation as $key => $val)
                        <tr >
                          <td class="text-left">{{($Quotation->currentpage()-1) *  $Quotation->perpage() + 
                            $key + 1}}</td>
                          <td class="text-center">{{$val->Tittle}}</td>
                       
                         
                          <!-- <td class="text-center">
                              <a href=""><i class="fa-regular fa-pen-to-square" style="color:#7a00ff;"></i></i></a>
                          </td> -->
                          <td class="text-center">
                            <a href="{{route('signleq',[$val->id])}}"  >
                            <i class="fa-sharp fa-solid fa-cart-plus "></i>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="{{route('viewquotationn',[$val->id])}}">
                            <i class="fa-solid fa-eye"></i>
                            </a>
                          </td>
                          <td class="text-center">
                            <a onclick="return confirm('Are you sure delete one vendor?')" href="{{route('Deletequotationn',[$val->id])}}"><i class="fa-solid fa-trash" style="color:red;"></i></a>
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
                  @if ($Quotation->hasPages())
                      <div class="pagination-wrapper">
                          {{ $Quotation->links()  }}
                      </div>
                  @endif
                  </div>
                </div>
              </div>
    </div>
  </div>

@endsection