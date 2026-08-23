@extends("dashboard.layout.main")

@section('body')

<div>
    @if(session('Success'))
    <p class="alert alert-primary">{{session('Success')}}</p>
    @endif
</div>

              <div class="card-style mb-30">
                <h6 class="mb-15">Add New Year</h6>
                <p class="text-sm mb-25">
                Add New Level to Your Education App
                </p>
                <form action="{{route('year.store')}}" method="post" >
                    @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Year Name</label>
                        <input type="text" name="year_name" placeholder="Year Name" value="{{old('year_name')}}" />
                        {{-- display errors --}}
                        @error('year_name')
                          <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->




                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn btn-hover w-100 text-center">
                          Add Year
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>
              </div>
              <!-- end card -->
            </div>
            {{-- end add year form --}}


            {{-- start view years table --}}
              <div class="mx-4">
              <div class="card-style mb-30">
                <h6 class="mb-10">Years Table</h6>
                <p class="text-sm mb-20">
                 View Current Years In Education App
                </p>
                <div class="table-wrapper table-responsive">
                  <table class="table striped-table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>
                          <h6>Year Name</h6>
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

                     @foreach ( $years as $key=>$value )

                     <tr>
                       <td>
                         <h6 class="text-sm">{{++$key}}</h6>
                       </td>
                       <td>
                         <p>{{$value['year_name']}}</p>
                       </td>
                       <td>
                         <a href="{{route('year.edit' , $value['id'] )}}" class="btn btn-primary ">Update</a>
                       </td>
                       <td>
                          {{-- <form action="{{route('year.destroy' , $value['id'] )}}" method="post" >
                            @csrf
                            @method('delete')
                            <button class="btn btn-secondary">Delete</button>
                          </form> --}}
                          @include('dashboard.pages.years.deleteModal' , ['value'=>$value ])
                       </td>
                     </tr>
                     @endforeach

                      <!-- end table row -->
                    </tbody>
                  </table>
                  <!-- end table -->
                </div>
              </div>
              <!-- end card -->
            </div>


@endsection
