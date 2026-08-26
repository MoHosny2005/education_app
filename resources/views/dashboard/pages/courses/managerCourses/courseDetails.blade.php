@extends('dashboard.layout.main')
@section('body')

<style>
:root{
  --primary:#4B49E3;
  --primary-dark:#3730C4;
  --primary-50:#EEEDFD;

  --lav-bg:#F3E8FF; --lav-ic:#8E5FF5;
  --mint-bg:#DDF4E7; --mint-ic:#1BA345;
  --sky-bg:#DCE6FB;  --sky-ic:#3E6FF0;
  --peach-bg:#FBEADB;--peach-ic:#E8934A;

  --page-bg:#F8F9FC;
  --card-bg:#FFFFFF;
  --border:#EEF1F7;
  --text:#1B2A4A;
  --muted:#8A94A6;
  --danger:#F0653E;
}



h1,h2,h3,h4,h5,.font-display{
  font-family:'Plus Jakarta Sans',sans-serif;
  color:var(--text);
}
.text-muted-c{color:var(--muted)!important;}
.small-label{
  font-size:12px; letter-spacing:.04em; font-weight:700; color:var(--muted); text-transform:uppercase;
}

/* ---------- Hero image ---------- */
.hero-wrap{
  border-radius:22px;
  overflow:hidden;
  position:relative;
  aspect-ratio:21/8;
  background:linear-gradient(135deg,#2A2A72,#4B49E3);
  box-shadow:0 24px 48px -24px rgba(27,42,74,.35);
}
.hero-wrap img{width:100%;height:100%;object-fit:cover;}
.hero-badge{
  position:absolute; top:20px; left:20px;
  background:rgba(255,255,255,.95); color:var(--primary);
  font-weight:700; font-size:12.5px; padding:.45rem .9rem; border-radius:30px;
}
@media (max-width:767px){ .hero-wrap{aspect-ratio:4/3;} }

/* ---------- Title ---------- */
.course-title{
  font-size:clamp(28px,4vw,42px);
  font-weight:800;
  line-height:1.25;
}

/* ---------- Info pills row ---------- */
.info-pill{
  display:flex; align-items:center; gap:.65rem;
  background:var(--card-bg); border:1px solid var(--border);
  border-radius:14px; padding:.8rem 1.1rem;
}
.info-pill .ic{
  width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;flex:0 0 auto;
}
.info-pill .lbl{font-size:11.5px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:.03em;}
.info-pill .val{font-size:14.5px;font-weight:700;color:var(--text);}

/* ---------- Prerequisite ---------- */
.prereq-card{
  display:flex; align-items:center; gap:1rem;
  background:var(--peach-bg);
  border:1px solid #F3DDC0;
  border-radius:16px; padding:1rem 1.25rem;
}
.prereq-ic{
  width:44px;height:44px;border-radius:12px;background:#fff;color:var(--peach-ic);
  display:flex;align-items:center;justify-content:center;font-size:19px;flex:0 0 auto;
}

/* ---------- Price card ---------- */
.price-card{
  background:var(--card-bg); border:1px solid var(--border); border-radius:18px; padding:1.5rem;
}
.price-now{font-size:36px;font-weight:800;font-family:'Plus Jakarta Sans',sans-serif;}
.price-old{font-size:17px;color:var(--muted);text-decoration:line-through;}
.discount-chip{
  background:#FDE9E5;color:var(--danger);font-weight:700;font-size:13px;padding:.3rem .7rem;border-radius:8px;
}
.btn-primary-custom{
  background:var(--primary); border:none; color:#fff; font-weight:700;
  border-radius:12px; padding:.9rem 1.5rem;
  transition:background .15s ease, transform .15s ease;
}
.btn-primary-custom:hover{background:var(--primary-dark); color:#fff; transform:translateY(-1px);}

/* ---------- Section card ---------- */
.section-card{
  background:var(--card-bg); border:1px solid var(--border); border-radius:18px; padding:1.75rem;
}
.section-title{
  font-weight:800; font-size:19px; margin-bottom:1rem;
  display:flex; align-items:center; gap:.6rem;
}
.section-title .dot{
  width:8px;height:8px;border-radius:50%;background:var(--primary);
}

/* ---------- Short description highlight ---------- */
.short-desc{
  font-size:17px; line-height:1.8; color:var(--text);
  border-left:3px solid var(--primary);
  padding-left:1.1rem;
}
</style>

<div class="container-xxl " style="max-width:960px;">

  <!-- ===================== 1. HERO IMAGE (wide) ===================== -->
  <div class="hero-wrap mb-4">
    <img src="{{asset('storage/images/courses/' . $course->image)}}" alt="course cover">

  </div>

  <!-- ===================== 2. TITLE (large) ===================== -->
  <h1 class="course-title mb-4 d-flex align-items-center gap-2">
    {{ $course['title'] }}
<span class="status-btn
    {{ $course->status == 'Pending' ? 'active-btn' :
       ($course->status == 'Rejected' ? 'close-btn' :
       ($course->status == 'Approved' ? 'success-btn' :
       ($course->status == 'Suspended' ? 'info-btn' : ''))) }}">
    {{ $course->status }}
</span>
  </h1>


  <!-- ===================== 3. INFO PILLS: instructor + course name ===================== -->
  <div class="row g-3 mb-4">
    <div class="col-sm-6">
      <div class="info-pill">
        <img src="{{ asset('storage/images/teachers/' . $course->teacher->img) }}" style="width:38px;height:38px;border-radius:10px;object-fit:cover;" alt="instructor">
        <div>
          <div class="lbl">Teacher</div>
          <div class="val">{{ $course->teacher->name }}</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="info-pill">
        <span class="ic" style="background:var(--sky-bg);color:var(--sky-ic);"><i class="bi bi-mortarboard-fill"></i></span>
        <div>
          <div class="lbl">Subject</div>
          <div class="val">{{ $course->subject->name }}</div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===================== 4. PREREQUISITE (single course) ===================== -->
  <div class="prereq-card mb-4">
    <span class="prereq-ic"><i class="bi bi-signpost-split-fill"></i></span>
    <div>
      <div class="lbl" style="color:#8A6A3E;">Prerequisite course</div>
      <div class="val" style="font-size:15.5px;">
     {{ $course->requirment?->name ?? 'None' }}
      </div>
    </div>
    {{-- <a href="#" class="btn btn-sm ms-auto" style="background:#fff;border-radius:10px;font-weight:700;font-size:13px;padding:.5rem 1rem;">
      View course <i class="bi bi-arrow-left ms-1"></i>
    </a> --}}
  </div>

  <!-- ===================== 5. PRICE & DISCOUNT ===================== -->
  <div class="price-card mb-4">
    <div class="d-flex flex-wrap align-items-center gap-4">
      <div>
        <div class="d-flex align-items-end gap-2 mb-1">
          <span class="price-now">{{ $final_price }}$</span>
          <span class="price-old">{{ $course->price }}$</span>
        </div>
        <span class="discount-chip"><i class="bi bi-lightning-charge-fill me-1"></i>{{ (int) $course->discount}}% off </span>
      </div>

    </div>
  </div>

  <!-- ===================== 6. SHORT DESCRIPTION ===================== -->
  <p class="short-desc mb-4">
    {{$course->short_description}}
  </p>

  <!-- ===================== 7. FULL DESCRIPTION ===================== -->
  <div class="section-card">
    <div class="section-title"><span class="dot"></span> Course Description</div>
    <p class="text-muted-c mb-0" style="font-size:14.5px;line-height:2;">
     {{$course->description}}
    </p>
  </div>

  <div class="buttons d-flex gap-1 py-4">
  @unless($course->status === 'Pending')
    <a href="" class="btn btn-outline-active"> Pending </a>
@endunless

@unless($course->status === 'Approved')
    <a href="" class="btn btn-outline-success"> Approve </a>
@endunless

@unless($course->status === 'Rejected')
    <a href="" class="btn btn-outline-danger"> Reject </a>
@endunless

@unless($course->status === 'Suspended')
       <a href="" class="btn btn-outline-primary"> Suspend </a>
@endunless
  </div>

</div>

@endsection
