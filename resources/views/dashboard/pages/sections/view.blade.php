@extends("dashboard.layout.main")

@section('body')

<div>
    @if(session('Success'))
    <p class="alert alert-primary">{{session('Success')}}</p>
    @endif
</div>

              <div class="card-style mb-30">
                <h6 class="mb-15">Add New Section</h6>
                <p class="text-sm mb-25">
                Add New Section to Your Course: {{$course->title}}
                </p>
                <form action="{{route('section.store' , $course->id)}}" method="post" >
                    @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Section Title</label>
                        <input type="text" name="title" placeholder="Section Title" value="{{old('title')}}" />
                        {{-- display errors --}}
                         @error('title')
                          <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->




                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn btn-hover w-100 text-center">
                          Add Section
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>
              </div>
              <!-- end card -->
            </div>
            {{-- end add sections form --}}


            {{-- start view sections table --}}
              <div class="mx-4">
              <div class="card-style mb-30">
                <h6 class="mb-10">Sections Table</h6>
                <p class="text-sm mb-20">
                 View Current Section In Your Course: {{$course->title}}
                </p>
                <div class="table-wrapper table-responsive">
                  <table class="table striped-table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>
                          <h6>Section Title</h6>
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

                     @forelse ( $sections as $key=>$value )

                     <tr>
                       <td>
                         <h6 class="text-sm">{{++$key}}</h6>
                       </td>
                       <td>
                         <p>{{$value['title']}}</p>
                       </td>
                       <td>
                         <a href="{{route('section.edit' , $value['id']  )}}" class="btn btn-primary ">Update</a>
                       </td>
                       <td>

                          @include('dashboard.pages.sections.deleteModal' , ['value'=>$value ])
                       </td>
                     </tr>
                     @empty
                     <p class="text-gray text-xs">You DO Not Add Any Sections Yet</p>
                     @endforelse

                      <!-- end table row -->
                    </tbody>
                  </table>
                  <!-- end table -->
                </div>
              </div>
              <!-- end card -->
            </div>


@endsection
