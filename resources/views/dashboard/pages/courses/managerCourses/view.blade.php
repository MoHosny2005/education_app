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

<div class="tables-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <h6 class="mb-10"> Courses</h6>
                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                  <div class="left">
                    <p>Show <span>10</span> entries</p>
                  </div>
                  <div class="right">
                    <div class="table-search d-flex">
                      <form action="#">
                        <input type="text" placeholder="Search..." />
                        <button><i class="lni lni-search-alt"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="table-wrapper table-responsive">
                  <table class="table w-100">
                    <thead>
                      <tr>
                        <th class="p-3">
                          <h6>Image</h6>
                        </th>
                        <th class="p-3">
                          <h6>Title</h6>
                        </th>
                        <th class="p-3">
                          <h6>Price</h6>
                        </th>
                        <th class="p-3">
                          <h6>Discount</h6>
                        </th>
                        <th class="p-3">
                          <h6>Status</h6>
                        </th>
                      </tr>
                      <!-- end table row-->
                    </thead>
                    <tbody>
                    @foreach ( $courses as $course )


                    <tr>
                      <td class="p-3">
                        <div class="lead">
                         <a href="{{route('manager_courses.show' , $course->id )}}">
                          <div class="lead-image">
                            <img src="{{asset('storage/images/courses/' . $course->image)}}" alt="" />
                          </div>
                          </a>


                        </div>
                      </td>

                      <td class="p-3">
                        <a href=" {{route('manager_courses.show' , $course->id )}} " class="text-gray" > {{ $course->title }} </a>
                      </td>

                       <td class="p-3">
                        <p> {{$course->price}} </p>
                      </td>

                      <td class="p-3">
                        <p> {{$course->discount}} </p>
                      </td>

                     <td class="p-3">
                        @if($course->status == 'Pending')
                          <span class="status-btn active-btn">{{$course->status}}</span>
                        @elseif($course->status == 'Rejected')
                          <span class="status-btn close-btn">{{$course->status}}</span>
                        @elseif($course->status == 'Approved')
                          <span class="status-btn success-btn">{{$course->status}}</span>
                        @elseif($course->status == 'Suspended')
                         <span class="status-btn info-btn">{{$course->status}}</span>
                          @endif
                        </td>


                    </tr>
                    @endforeach

                    </tbody>
                  </table>
                  <!-- end table -->
                </div>

              </div>
              <!-- end card -->
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>

@endsection
