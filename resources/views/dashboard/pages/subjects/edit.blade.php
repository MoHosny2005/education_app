@extends('dashboard.layout.main');

@section('body')

 <div class="card-style mb-30">
                <h6 class="mb-15">Update Subject</h6>
                <p class="text-sm mb-25">
                Edit Subject In Your Education App
                </p>
                <form action="{{route('subject.update' , $subject->id)}}" method="post" >
                    @csrf
                    @method('put')
                  <div class="row">

                    {{-- subject name --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Subject Name</label>
                        <input type="text" name="name" placeholder="Subject Name" value="{{$subject->name}}"  />
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
                         @foreach ($years as $y)
                          <option value="{{ $y->id }}"
                             {{ $subject->year_id == $y->id ? 'selected' : '' }}
                            >{{ $y->year_name }}</option>
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
                                        @foreach ($subjects as $s)
                            <option value="{{ $s->name }}"
                            {{ $subject->dependency == $s->name ? 'selected' : '' }}>
                            {{ $s->name }}
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
            {{-- end add year form --}}



@endsection
