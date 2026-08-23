@extends('dashboard.layout.main');
@section('body')

<div class="row">
            <div class="">
              <div class="card-style mb-30">
                <h6 class="mb-25">Update Manager Information</h6>
                <form action="{{route('manager.update' , $manager->id)}} " method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('put')
                  <div class="row">
                    <div class="col-12">
                        {{-- name --}}
                      <div class="input-style-1">
                        <label> Name</label>
                        <input type="text" placeholder="Name" name="name" value="{{$manager->name}}" />
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    {{-- email --}}
                    <!-- end col -->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="email" placeholder="Email" name="email" value="{{$manager->email}}" />
                         @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->

                    {{-- age --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Age</label>
                        <input type="number" placeholder="Age" name="age" value="{{$manager->age}}" />
                         @error('age')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-6">
                      <div class="select-style-1">
                        <label>Gender</label>
                        <div class="select-position">
                          <select class="light-bg" name="gender">
                            <option value="male" @selected($manager->gender=='male') >male</option>
                            <option value="female" @selected($manager->gender == 'female' ) >female</option>

                          </select>
                           @error('gender')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                      </div>
                    </div>
                    {{-- end col --}}
                    {{-- city --}}
                   <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>City</label>
                        <input type="text" placeholder="City" name="city" value="{{$manager->city}}" />
                         @error('city')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->
                    {{-- image --}}
                        <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Image</label>
                        <input type="file" placeholder="Add Your Image" name="img" />
                         @error('img')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    {{-- end col --}}

                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn btn-hover m-2">
                          Update Manager
                        </button>
                        <a  href="{{route('manager.index')}}" class="main-btn danger-btn-outline m-2">
                            Cancel
                        </a>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>
              </div>
              <!-- end card -->

          </div>
 </div>



@endsection
