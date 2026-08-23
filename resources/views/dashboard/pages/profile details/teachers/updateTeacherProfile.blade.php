@extends('dashboard.layout.main')
@section('body')

<div class="card-style mb-30 ">

                <h6 class="mb-25">Update My Profile</h6>
                <form action="{{route('teacherProfile.update' , $teacher_data->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('put')
                  <div class="row  ">
                    {{-- name --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label> Name</label>
                        <input type="text"  name="name" placeholder="Name" value="{{$teacher_data->name}}" />
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    {{-- email --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" value="{{$teacher_data->email}}" />
                         @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>



                    {{-- phone --}}
                     <div class="col-12">
                      <div class="input-style-1">
                        <label>Phone Number</label>
                        <input type="text" name="phone" placeholder="Phone Number" value="{{$teacher_data->phone}}" />
                         @error('phone')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- age --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Age</label>
                        <input type="number" name="age" placeholder="Age" value="{{$teacher_data->age}}" />
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
                            <option value="male" @selected($teacher_data->gender=='male') >male</option>
                            <option value="female" @selected($teacher_data->gender == 'female' ) >female</option>

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
                        <input type="text" name="city" placeholder="city" value="{{$teacher_data->city}}" />
                         @error('city')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>





                    {{-- bio --}}
                      <div class="col-12">
                      <div class="input-style-1">
                        <label>Bio</label>
                        <input type="text" name="bio" placeholder="Bio" value="{{$teacher_data->bio}}" />
                         @error('bio')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>




                    <!-- end col -->
                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn btn-hover m-2">
                          Update Profile
                        </button>
                         <a href="{{route('teacherProfile.index')}}" class="main-btn danger-btn-outline btn-hover m-2">
                          Cancel
                         </a>

                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>
              </div>




@endsection
