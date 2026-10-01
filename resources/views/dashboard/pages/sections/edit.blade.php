@extends("dashboard.layout.main")

@section('body')



              <div class="card-style mb-30">
                <h6 class="mb-15">Edit Section</h6>
                <p class="text-sm mb-25">
                Edit Section In Your Course {{$section->course->title}}
                </p>
                <form action="{{route('section.update' , $section->id )}}" method="post" >
                    @csrf
                    @method('put')
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Section Title</label>
                        <input type="text" name="title" placeholder="Section Title" value="{{$section->title}}" />
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
                          Edit Section
                        </button>
                      </div>

                    </div>

                  </div>
                </div>
                  <!-- end row -->
@endsection
