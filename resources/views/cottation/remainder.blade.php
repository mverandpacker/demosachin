@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
  
      @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <h6 class="card-title card-padding pb-0">All Reminder</h6>
                  <!-- <h6 class="text-right mr-2"><a href="{{url('/Quotation')}}" class="bg-warning p-2 text-dark" style="border-radius:3px;">Add Quotation</a></h6> -->
                  <div class="table-responsive">
                    <table class="table table-hoverable">
                      <thead>
                    
                        <tr >
                          <th class="text-left">#</th>
                          <th class="text-center">Tittle</th>
                          <th class="text-center">DateTime</th>
                         
                            
                          <!-- <th class="text-center">Edit</th> -->
                          <!-- <th class="text-center">Add</th>
                          <th class="text-center"> view</th>
                          <th class="text-center">Delete</th> -->
                          
                        </tr>
                      </thead>
           
                      <tbody>
                   @foreach($result as $val)
                        <tr >
                          <td class="text-left">{{$loop->iteration}}</td>
                          <td class="text-center">{{$val->Tittle}}</td>
                          <td class="text-center">{{$val->created_at}}</td>

                         
                          
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