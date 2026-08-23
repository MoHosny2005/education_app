@extends('dashboard.layout.main')

@section('body')

<div class="card-style mb-30">
                <h6 class="mb-15">Edit Year</h6>
                <p class="text-sm mb-25">
                Update Year Name In Education App
                </p>
                <form action="{{route('year.update' , $year['id'])}}" method="post" >
                    @csrf
                    @method('put')
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label> New Year Name</label>
                        <input type="text" name="year_name" placeholder="New Year Name" value="{{$year['year_name']}}" />
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
                          Update Year
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>
              </div>
              <!-- end card -->
            </div>
            {{-- end edit year form --}}


@endsection
