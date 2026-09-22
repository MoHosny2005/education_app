@extends('dashboard.layout.main')
@section('body')


<style>
    :root {
        --edu-primary:      #3D3AA8;
        --edu-accent-blue:  #2F5FE3;
        --edu-sidebar-bg:   #EDE6D6;
        --edu-delete-gray:  #9098A3;
        --edu-text-dark:    #1F2333;
        --edu-text-muted:   #6B7280;
        --edu-card-bg:      #FFFFFF;
        --edu-border:       #E5E1D8;
        --edu-changed-bg:   #EEF1FF;
        --edu-changed-brd:  #3D3AA8;
    }

    .cur-wrapper {
        font-family: 'Poppins', 'Segoe UI', Tahoma, sans-serif;
        color: var(--edu-text-dark);
    }

    .cur-header h1 {
        font-size: 1.7rem;
        font-weight: 700;
        color: var(--edu-text-dark);
        margin-bottom: 4px;
    }

    .cur-header p {
        color: var(--edu-text-muted);
        margin-bottom: 24px;
    }

    .cur-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        align-items: start;
    }

    @media (max-width: 768px) {
        .cur-grid { grid-template-columns: 1fr; }
    }

    .cur-card {
        background: var(--edu-card-bg);
        border: 1px solid var(--edu-border);
        border-radius: 14px;
        padding: 22px 24px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }

    .cur-card-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
        font-size: 1.05rem;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--edu-border);
    }

    .cur-badge {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 999px;
        text-transform: uppercase;
        letter-spacing: .03em;
    }

    .cur-badge-current { background: var(--edu-sidebar-bg); color: var(--edu-text-dark); }
    .cur-badge-requested { background: var(--edu-primary); color: #fff; }

    .cur-field { margin-bottom: 16px; }
    .cur-field:last-child { margin-bottom: 0; }

    .cur-field-label {
        display: block;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--edu-text-muted);
        text-transform: uppercase;
        letter-spacing: .04em;
        margin-bottom: 4px;
    }

    .cur-field-value {
        font-size: 0.95rem;
        line-height: 1.5;
        word-break: break-word;
    }

    .cur-field.is-changed {
        background: var(--edu-changed-bg);
        border-left: 3px solid var(--edu-changed-brd);
        border-radius: 6px;
        padding: 10px 12px;
        margin-left: -12px;
        margin-right: -12px;
    }

    .cur-field-img {
        width: 100%;
        max-width: 220px;
        border-radius: 10px;
        border: 1px solid var(--edu-border);
        display: block;
        margin-top: 4px;
    }

    .cur-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 28px;
    }

    .cur-btn {
        border: none;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.95rem;
        padding: 11px 26px;
        border-radius: 10px;
        transition: opacity .15s ease, transform .1s ease;
    }

    .cur-btn:active { transform: scale(0.97); }

    .cur-btn-approve {
        background: var(--edu-accent-blue);
        color: #fff;
    }
    .cur-btn-approve:hover { opacity: 0.9; }

    .cur-btn-reject {
        background: var(--edu-delete-gray);
        color: #fff;
    }
    .cur-btn-reject:hover { opacity: 0.9; }

    .cur-legend {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.8rem;
        color: var(--edu-text-muted);
        margin-bottom: 20px;
    }
    .cur-legend-dot {
        width: 10px; height: 10px; border-radius: 3px;
        background: var(--edu-changed-bg);
        border-left: 3px solid var(--edu-changed-brd);
    }
</style>

<div class="cur-wrapper">

    <div class="cur-header">
        <h1>Course Update Review By <span>{{ $updated_course->course->teacher->name }}</span> At <span>{{ $updated_course->created_at }}</span> </h1>
        <p>Compare the current course with the teacher's requested changes before approving.</p>
    </div>

    <div class="cur-legend">
        <span class="cur-legend-dot"></span>
        Highlighted fields were changed by the teacher
    </div>

    <div class="cur-grid">

        <div class="cur-card">
            <div class="cur-card-title">
                <span class="cur-badge cur-badge-current">Current</span>
                Original Course
            </div>

            <div class="cur-field {{ $isTitleChanged ? 'is-changed' : '' }}">
                <span class="cur-field-label">Course Title</span>
                <div class="cur-field-value">{{ $updated_course->course->title }}</div>
            </div>

            <div class="cur-field {{ $isDescriptionChanged ? 'is-changed' : '' }}">
                <span class="cur-field-label">Description</span>
                <div class="cur-field-value">{{ $updated_course->course->description}}</div>
            </div>

             <div class="cur-field {{ $isShortDescriptionChanged ? 'is-changed' : '' }}">
                <span class="cur-field-label"> Short Description</span>
                <div class="cur-field-value">{{ $updated_course->course->short_description}}</div>
            </div>

            <div class="cur-field {{ $isRequirmentChanged ? 'is-changed' : '' }}">
                <span class="cur-field-label"> Requirement Subject</span>
                <div class="cur-field-value">
                    @if($updated_course->course->requirment )
                    {{ $updated_course->course->requirment->name}}
                    @else
                    {{"None"}}
                    @endif
                </div>
            </div>

            <div class="cur-field {{ $isPriceChanged ? 'is-changed' : '' }} ">
                <span class="cur-field-label">Price</span>
                <div class="cur-field-value">{{ $updated_course->course->price }} $</div>
            </div>

            <div class="cur-field {{ $isDiscountChanged? 'is-changed' : '' }} ">
                <span class="cur-field-label">Discount</span>
                <div class="cur-field-value">{{ $updated_course->course->discount }} %</div>
            </div>

            <div class="cur-field {{ $isImageChanged ? 'is-changed' : '' }}">
                <span class="cur-field-label">Image</span>
                <img src="{{asset('storage/images/courses/' . $updated_course->course->image)}}" class="cur-field-img" alt="Current course image">
            </div>
        </div>

        <div class="cur-card">
            <div class="cur-card-title">
                <span class="cur-badge cur-badge-requested">Requested</span>
                Teacher's Update
            </div>

            <div class="cur-field {{ $isTitleChanged ? 'is-changed' : '' }}">
                <span class="cur-field-label  ">Course Title</span>
                <div class="cur-field-value">{{$updated_course->title}}</div>
            </div>

            <div class="cur-field {{ $isDescriptionChanged ? 'is-changed' : '' }} ">
                <span class="cur-field-label">Description</span>
                <div class="cur-field-value">{{ $updated_course->description }}</div>
            </div>

             <div class="cur-field {{ $isShortDescriptionChanged ? 'is-changed' : '' }} ">
                <span class="cur-field-label"> Short Description</span>
                <div class="cur-field-value">{{ $updated_course->short_description}}</div>
            </div>

              <div class="cur-field {{ $isRequirmentChanged ? 'is-changed' : '' }}">
                <span class="cur-field-label"> Requirement Subject</span>
                <div class="cur-field-value">
                    @if($updated_course->requirment  )
                    {{ $updated_course->requirment->name}}
                    @else
                    {{"None"}}
                    @endif
                </div>
            </div>

             <div class="cur-field {{ $isPriceChanged ? 'is-changed' : '' }} ">
                <span class="cur-field-label">Price</span>
                <div class="cur-field-value">{{ $updated_course->price }} $</div>
            </div>

            <div class="cur-field {{ $isDiscountChanged? 'is-changed' : '' }}">
                <span class="cur-field-label">Discount</span>
                <div class="cur-field-value">{{ $updated_course->discount }} %</div>
            </div>

            <div class="cur-field {{ $isImageChanged ? 'is-changed' : '' }} ">
                <span class="cur-field-label">Image</span>
                <img
                src="{{asset('storage/images/updated_courses/' . $updated_course->image)}}"
                onerror="this.onerror=null ; this.src='{{asset('storage/images/courses/' . $updated_course->course->image)}}';"
                class="cur-field-img" alt="Requested course image">
            </div>
        </div>

    </div>


    <div class="p-4 d-flex gap-3">
        <a href="{{route('updateOriginalCourse' , [$updated_course->id , 'reject'])}}" class="btn btn-outline-danger">Reject</a>
        <a href="{{route('updateOriginalCourse' , [$updated_course->id , 'accept'])}}" class="btn btn-primary">Accept</a>
    </div>
</div>


@endsection
