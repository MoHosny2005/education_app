@extends('dashboard.layout.main')
@section('body')


<div class="card-style mb-30 ">

                <h6 class="mb-25">Update Teacher Data</h6>
                <form action="{{route('teacher.update' , $teacher->id )}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('put')
                  <div class="row  ">
                    {{-- name --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label> Name</label>
                        <input type="text"  name="name" placeholder="Name" value="{{$teacher->name}}" />
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    {{-- email --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" value="{{$teacher->email}}" />
                         @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>



                    {{-- phone --}}
                     <div class="col-12">
                      <div class="input-style-1">
                        <label>Phone Number</label>
                        <input type="text" name="phone" placeholder="Phone Number" value="{{$teacher->phone}}" />
                         @error('phone')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- age --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Age</label>
                        <input type="number" name="age" placeholder="Age" value="{{$teacher->age}}" />
                         @error('age')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- gender --}}
                    <div class="col-sm-6">
                      <div class="select-style-1">
                        <label>Gender</label>
                        <div class="select-position">
                          <select class="light-bg" name="gender">
                            <option value="male" {{ $teacher->gender == 'male' ? 'selected' : '' }} >male</option>
                            <option value="female" {{ $teacher->gender == 'female' ? 'selected' : '' }} >female</option>

                          </select>
                           @error('gender')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>

                    {{-- city --}}
                     <div class="col-12">
                      <div class="input-style-1">
                        <label>City</label>
                        <input type="text" name="city" placeholder="city" value="{{$teacher->city}}" />
                         @error('city')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>


                    {{-- subject --}}
                    <div class="col-sm-6">
                      <div class="select-style-1">
                        <label>Subject</label>
                        <div class="select-position">
                          <select class="light-bg" name="subject_id">
                            <option value="">Select Subject</option>
                            @foreach ( $subjects as $subject )

                            <option value="{{$subject->id}}" {{ $teacher->subject_id == $subject->id ? 'selected' : '' }}  >{{$subject->name}}</option>
                            @endforeach

                          </select>
                           @error('subject_id')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>


                    {{-- bio --}}
                      <div class="col-12">
                      <div class="input-style-1">
                        <label>Bio</label>
                        <input type="text" name="bio" placeholder="Bio" value="{{$teacher->bio}}" />
                         @error('bio')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- image --}}
                     <div class="col-12">
                      <div class="input-style-1">
                        <label> Teacher Image</label>
                        <input type="file" name="img"  >
                         @error('img')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>


                    <!-- end col -->
                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn btn-hover m-2">
                          Update Teacher
                        </button>
                         <a href="{{route('teacher.index')}}" class="main-btn danger-btn-outline btn-hover m-2">
                          Cancel
                         </a>

                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>
              </div>





@endsection
