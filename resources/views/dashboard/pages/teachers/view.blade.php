@extends('dashboard.layout.main')
@section('body')

{{-- <style>
  /* page-scoped tweaks to improve table spacing and avatar sizing */
  .table.table-spacing th,
  .table.table-spacing td {
    padding: 14px 18px;
    vertical-align: middle;
  }

  .table.table-spacing .lead-image img {
    width: 56px;
    height: 56px;
    object-fit: cover;
    border-radius: 6px;
  }

  .table.table-spacing .min-width p {
    margin: 0;
  }
</style> --}}

{{-- successful message --}}
<div>
    @if(session('success'))
    <p class="alert alert-primary">{{session('success')}}</p>
    @endif
</div>


{{-- head to add page (form) to add new teacher --}}

<div class="d-flex items-center justify-content-between ">

<div>
<a href="{{route('teacher.create')}}" class="btn btn-primary  " >Add New Teacher</a>
</div>

<div class="d-flex items-center justify-content-center gap-1 " >
   <a href=" {{route('sort.teacher' , 'name' )}} " class="btn btn-primary" >Sort By Name</a>
   <a href=" {{route('sort.teacher' , 'subject' )}} " class="btn btn-primary" >Sort By Subject</a>
   <a href=" {{route('sort.teacher' , 'recent' )}} " class="btn btn-primary" >Return To Recent</a>

</div>

</div>


{{-- table to view teacher data --}}
 <div class="row">
  <div class="col-lg-12">
              <div class="card-style mb-30">
                <h6 class="mb-10">Teachers Table</h6>
                <p class="text-sm mb-20">
                 View All Teachers In Education App
                </p>
                <div class="table-wrapper table-responsive">
                  <table class="table table-striped table-hover align-middle">
                    <thead>
                      <tr>
                        <th class="py-2 px-3">
                          <h6 class="mb-0">#</h6>
                        </th>
                         <th class="lead-image py-2 px-3">
                          <h6 class="mb-0">Image</h6>
                        </th>
                        <th class="lead-email py-2 px-3">
                          <h6 class="mb-0">Name</h6>
                        </th>
                        <th class="lead-email py-2 px-3">
                          <h6 class="mb-0">Email</h6>
                        </th>


                         <th class="lead-gender py-2 px-3">
                          <h6 class="mb-0">Gender</h6>
                        </th>
                         <th class="lead-city py-2 px-3">
                          <h6 class="mb-0">City</h6>
                        </th>
                         <th class="lead-email py-2 px-3">
                          <h6 class="mb-0">Subject</h6>
                        </th>
                        <th class="py-2 px-3">
                            <h6 class="mb-0">Update</h6>
                        </th>
                         <th class="py-2 px-3">
                            <h6 class="mb-0">Delete</h6>
                        </th>

                      </tr>
                      <!-- end table row-->
                    </thead>
                    <tbody>




                    @forelse( $teachers as $key=>$value )

                    <tr>
                       <td class="py-2 px-3">
                        <p class="mb-0">{{++$key}}</p>
                        </td>
                      <td class="min-width py-2 px-3">
                        <div class="lead">
                          <div class="lead-image">
                            <img src="{{asset('storage/images/teachers/'.$value->img)}}" alt="" class="rounded" style="width:56px;height:56px;object-fit:cover;" />
                          </div>

                        </div>
                      </td>
                      <td class="min-width py-2 px-3">
                        <p class="mb-0">{{$value->name}}</p>
                      </td>
                      <td class="min-width py-2 px-3">
                        <p class="mb-0">{{$value->email}}</p>
                      </td>


                      <td class="min-width py-2 px-3">
                        <p class="mb-0">{{$value->gender}}</p>
                      </td>
                      <td class="min-width py-2 px-3">
                        <p class="mb-0">{{$value->city}}</p>
                      </td>
                      <td class="min-width py-2 px-3">
                        <p class="mb-0">{{$value->subject->name}}</p>
                      </td>
                       <td class="min-width py-2 px-3">
                        <a href="{{route('teacher.edit' , $value->id)}}" class="btn btn-primary" >Update</a>
                      </td>
                      <td class="min-width py-2 px-3">
                          <p>@include('dashboard.pages.teachers.deleteModal' , ['value'=>$value ])</p>
                      </td>

                    </tr>
                      @empty
                      <tr class=" bg-transparent " >
                          <td>  <p class="text-danger bg-transparent" > No Teacheres Added </p> </td>
                        </tr>
                    @endforelse


                    </tbody>
                  </table>

                  <div class="mt-5" >
                     <p class="btn btn-primary">{{$count . " Teachers " }}</p>
                  </div>
                  <!-- end table -->
                </div>
              </div>
              <!-- end card -->
            </div>
 </div>



@endsection
