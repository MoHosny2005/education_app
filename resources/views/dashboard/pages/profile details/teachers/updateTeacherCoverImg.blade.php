@extends('dashboard.layout.main')

@section('body')

<div class="card-style mb-30">

    <form action="{{route('updatingTeacherCoverImg' , Auth::guard('teach')->user()->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="d-flex flex-column align-items-center py-4">

            <div class="position-relative d-inline-block">


                @if(Auth::guard('teach')->user()->cover_img)
                <img
                    id="teacherPreview"
                    src="{{ asset('storage/images/teachers/' . Auth::guard('teach')->user()->cover_img) }}"
                    class="rounded-4xl border border-4 border-white shadow"
                    width="800"
                    height="200"
                    style="object-fit: cover;">
                @else
                 <img
                    id="teacherPreview"
                    src="{{asset('dashboard')}}/images/profile/profile-cover.jpg"
                    class=" rounded-4xl  border border-4 border-white shadow"
                    width="800"
                    height="200"
                    style="object-fit: cover;">
                @endif

                <input
                    type="file"
                    name="cover_img"
                    id="teacherImage"
                    class="d-none"
                    accept="image/*">

                <label
                    for="teacherImage"
                    class="btn btn-primary rounded-circle shadow position-absolute bottom-0 end-0 d-flex align-items-center justify-content-center"
                    style="width:45px;height:45px;cursor:pointer;">
                    <i class="lni lni-camera text-white"></i>
                </label>

            </div>

        </div>

        <div class="button-group d-flex justify-content-center mb-3">
            <button type="submit" class="main-btn primary-btn btn-hover me-2">
                Update Photo
            </button>

            <a href="{{ route('teacherProfile.index') }}"
               class="main-btn danger-btn-outline btn-hover">
                Cancel
            </a>
        </div>

    </form>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("teacherImage");
    const preview = document.getElementById("teacherPreview");

    input.addEventListener("change", function () {

        if (this.files && this.files[0]) {

            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(this.files[0]);
        }

    });

});
</script>

@endsection
