@extends('dashboard.layout.main');

@section('body')

 <div class="card-style mb-30">
                <h6 class="mb-15">Add New Subject</h6>
                <p class="text-sm mb-25">
                Add New Subject to Your Education App
                </p>
                <form action="{{route('subject.store')}}" method="post" >
                    @csrf
                  <div class="row">

                    {{-- subject name --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Subject Name</label>
                        <input type="text" name="name" placeholder="Subject Name" value="{{old('name')}}"  />
                        {{-- display errors --}}
                         @error('name')
                          <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>

                      {{-- choose Year name--}}
                       <div class="input-style-1 mt-3">
                        <label for="year">Year</label>

                        <select id="year" name="year_id" class="form-control" aria-label="Select year">
                          <option value="">-- Select Year --</option>
                         @foreach ($years as $year)
                          <option value="{{ $year->id }}"
                             {{ old('year_id') == $year->id ? 'selected' : '' }}
                            >{{ $year->year_name }}</option>
                          @endforeach
                        </select>
                        {{-- display errors --}}
                         @error('year_id')
                          <p class="text-danger">{{$message}}</p>
                        @enderror

                      </div>



                      {{-- dependency --}}
                       <div class="input-style-1 mt-3">
                        <label for="dependency">Dependency</label>

                        <select id="dependency" name="dependency" class="form-control" aria-label="Select Dependency ">
                          <option value="">-- Select Subject --</option>
                                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->name }}"
                            {{ old('dependency') == $subject->name ? 'selected' : '' }}>
                            {{ $subject->name }}
                            </option>
                        @endforeach
                      </select>
                         {{-- display errors --}}
                         @error('dependency')
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



@endsection
