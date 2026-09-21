@extends('dashboard.layout.main')
@section('body')

<div class="">
              <div class="card-style mb-30">
                <h6 class="mb-10">Update Course</h6>
                <p class=" mb-10 capitalize text-gray ">Warning: if you complete the updating process your course will be enter at the pending status waiting for approved bu admin</p>
                <form action="{{route('teacher_courses.update' , $course->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                  <div class="row">
                    {{-- title --}}
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Course Title</label>
                        <input type="text" name="title" placeholder="Course Title" class="bg-transparent" value="{{$course->title}}" />
                        @error('title')
                          <p class=" text-danger ">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    <!-- requirment_id -->

                    <div class="col-12">
                      <div class="select-style-1">
                        <label>Required Courses</label>
                        <div class="select-position">
                          <select name="requirment_id">
                              <option value="">None</option>
                            @foreach ( $subjects as $subject )
                            <option value="{{$subject->id}}"  @selected($course->requirment_id == $subject->id ? 'selected' : '') >{{$subject->name}}</option>
                            @endforeach

                          </select>
                          @error('requirment_id')
                             <p class=" text-danger ">{{$message}}</p>
                          @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>
                    <!-- description-->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="Description" class="bg-transparent" value="{{$course->description}}" />
                         @error('description')
                          <p class=" text-danger ">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    <!-- short description-->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Short Description</label>
                        <input type="text" name="short_description" placeholder="Short Description" class="bg-transparent" value="{{$course->short_description}}" />
                         @error('short_description')
                          <p class=" text-danger ">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                     <!-- price-->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Course Price</label>
                        <input type="number" min="20" max="9999" name="price" placeholder="Course Price $" class="bg-transparent" value="{{$course->price}}" />
                          @error('price')
                          <p class=" text-danger ">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                      <!-- discount-->
                     <div class="col-12">
                      <div class="select-style-1">
                        <label>Discount</label>
                        <div class="select-position">
                          <select name="discount">
                              <option value="">None</option>
                            @for ($i=10 ; $i<=100 ; $i+=5)

                            <option value="{{$i}}"  @selected( $course->discount == $i ? 'selected' : '') >{{$i . "%"}}</option>
                            @endfor


                          </select>
                            @error('discount')
                          <p class=" text-danger ">{{$message}}</p>
                        @enderror
                        </div>
                      </div>
                      <!-- end select -->
                    </div>

                    {{-- image --}}
                        <div class="col-sm-6">
                      <div class="input-style-1">
                        <label>Course Image</label>
                        <input type="file" placeholder="Add Course Image" name="image" />
                         @error('image')
                          <p class=" text-danger ">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    <!-- end col -->
                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn btn-hover m-2">
                          Update Course
                        </button>
                        <a  href="{{route('teacher_courses.index')}}" class="main-btn danger-btn-outline m-2">
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

@endsection

