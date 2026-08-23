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

{{-- link => go to add.blade.php page
to add new subject
--}}
<div class=" d-flex items-center justify-content-between  ">



<div>
<a href="{{route('subject.create')}}" class="btn btn-primary" >Add New Subject</a>
</div>



<div class=" d-flex items-center justify-content-center gap-1 ">
    <a href="{{route('sort.subject' , 'year')}}" class="btn btn-primary">Sort By Year</a>
    <a href="{{route('sort.subject' , 'name')}}" class="btn btn-primary">Sort By Name</a>
    <a href="{{route('sort.subject' , 'recent')}}" class="btn btn-primary">Sort By Recent</a>

</div>


</div>



{{-- table to view the current subjects --}}
  <div class="">
              <div class="card-style mb-30">
                <h6 class="mb-10">Subjects Table</h6>
                <p class="text-sm mb-20">
                  View The Current Subjects in Education App
                </p>
                <div class="table-wrapper table-responsive">
                  <table class="table striped-table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>
                          <h6>Subject Name</h6>
                        </th>
                        <th>
                          <h6>Year</h6>
                        </th>
                        <th>
                          <h6>Dependency</h6>
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
                     @foreach ( $subjects as $key => $value )

                     <tr>
                       <td>
                         <h6 class="text-sm">{{++$key}}</h6>
                       </td>
                       <td>
                         <p>{{$value->name}}</p>
                       </td>
                       <td>
                         <p>{{$value->year->year_name}}</p>
                       </td>
                       <td>
                         <p>
                            @if ($value->dependency == null)
                             {{"None"}}
                            @else
                           {{ $value->dependency }}
                            @endif
                            </p>
                       </td>
                        <td>
                         <a href="{{route('subject.edit' , $value->id)}}" class="btn btn-primary">Update</a>
                       </td>
                        <td>
                         <p>@include('dashboard.pages.subjects.deleteModal' , ['value'=>$value ])</p>
                       </td>
                     </tr>
                     @endforeach

                    </tbody>

                  </table>

                  {{--  display number of rows --}}
                  <div class="mt-5">

                      <p class="btn btn-primary ">

                       {{$count . " Subjects"}}

                      </p>

                    </div>
                  <!-- end table -->
                </div>
              </div>
              <!-- end card -->
            </div>

@endsection
