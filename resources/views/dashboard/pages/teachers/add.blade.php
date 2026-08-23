@extends('dashboard.layout.main')
@section('body')



  <div class="card-style mb-30 ">

                <h6 class="mb-25">Add New Teacher</h6>
                <form action="{{route('teacher.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                  <div class="row  ">
                    {{-- name --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label> Name</label>
                        <input type="text"  name="name" placeholder="Name" value="{{old('name')}}" />
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    {{-- email --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}" />
                         @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- password --}}
                      <div class="col-12">
                      <div class="input-style-1">
                        <label>Password</label>
                        <input type="text" name="password" placeholder="Password" value="{{old('password')}}" />
                         @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- phone --}}
                     <div class="col-12">
                      <div class="input-style-1">
                        <label>Phone Number</label>
                        <input type="text" name="phone" placeholder="Phone Number" value="{{old('phone')}}" />
                         @error('phone')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- age --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Age</label>
                        <input type="number" name="age" placeholder="Age" value="{{old('age')}}" />
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
                            <option value="male" @selected(old('gender')=='male') >male</option>
                            <option value="female" @selected(old('gender') == 'female' ) >female</option>

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
                        <input type="text" name="city" placeholder="city" value="{{old('city')}}" />
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

                            <option value="{{$subject->id}}" @selected(old('subject_id') == $subject->id ) >{{$subject->name}}</option>
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
                        <input type="text" name="bio" placeholder="Bio" value="{{old('bio')}}" />
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
                          Add Teacher
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

