@extends('dashboard.layout.main')
@section('body')



{{-- sucessfull message --}}
<div>
     @if(session('success'))
<p class="alert alert-primary">

    {{session('success')}}

</p>
@endif
</div>


<div>
<a href="{{route('manager.create')}}" class="btn btn-primary" >Add New Manager</a>
</div>


 <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <h6 class="mb-10">Managers Table</h6>
                <p class="text-sm mb-20">
                 View All Managers In Education App
                </p>
                <div class="table-wrapper table-responsive">
                  <table class="table  ">
                    <thead>
                      <tr>
                         <th class="">
                          <h6>#</h6>
                        </th>
                        <th class="px-3">
                          <h6>Lead</h6>
                        </th>
                        <th class="">
                          <h6>Name</h6>
                        </th>
                        <th class="">
                          <h6>Email</h6>
                        </th>
                        <th class="">
                          <h6>Age</h6>
                        </th>
                        <th>
                          <h6>Gender</h6>
                        </th>
                         <th>
                          <h6>City</h6>
                        </th>
                        <th>
                          <h6>Update</h6>
                        </th>
                        <th>
                          <h6>Delete</h6>
                        </th>
                      </tr>
                      <!-- end table row-->
                    </thead>
                    <tbody>
                        @forelse ( $managers as $key => $value )
                      <tr>
                        <td class="min-width ">
                        <p class="mb-0">{{++$key}}</p>
                      </td>
                        <td class="min-width px-3 ">
                        <div class="lead">
                          <div class="lead-image ">
                            <img  src="{{asset('storage/images/managers/'.$value->img)}}" alt="" class="rounded" style="width:56px;height:56px;object-fit:cover;" />
                          </div>

                        </div>
                      </td>
                        <td class="min-width ">
                        <p class="mb-0">{{$value->name}}</p>
                      </td>
                        <td class="min-width ">
                        <p class="mb-0 ">{{$value->email}}</p>
                      </td>
                         <td class="min-width ">
                        <p class="mb-0">{{$value->age}}</p>
                      </td>
                       <td class="min-width ">
                        <p class="mb-0">{{$value->gender}}</p>
                      </td>
                       <td class="min-width ">
                        <p class="mb-0">{{$value->city}}</p>
                      </td>
                      <td class="min-width ">
                        <a href="{{route('manager.edit' , $value->id)}}" class="btn btn-primary">
                            Update
                        </a>
                      </td>
                      <td class="min-width ">
                         <p>@include('dashboard.pages.managers.deleteModal' , ['value'=>$value ])</p>
                      </td>

                      </tr>
                        @empty
                            <tr>
                              <td>  <p class="text-danger" > No Managers Added </p> </td>
                            </tr>
                        @endforelse


                    </tbody>
                  </table>
                  <!-- end table -->
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->
          </div>






@endsection
