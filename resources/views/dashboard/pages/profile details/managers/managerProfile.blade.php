@extends('dashboard.layout.main')

@section('body')


             {{-- <div class="header-message-box ml-15 d-none d-md-flex">
                <button class="dropdown-toggle" type="button" id="message" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M7.74866 5.97421C7.91444 5.96367 8.08162 5.95833 8.25005 5.95833C12.5532 5.95833 16.0417 9.4468 16.0417 13.75C16.0417 13.9184 16.0364 14.0856 16.0259 14.2514C16.3246 14.138 16.6127 14.003 16.8883 13.8482L19.2306 14.629C19.7858 14.8141 20.3141 14.2858 20.129 13.7306L19.3482 11.3882C19.8694 10.4604 20.1667 9.38996 20.1667 8.25C20.1667 4.70617 17.2939 1.83333 13.75 1.83333C11.0077 1.83333 8.66702 3.55376 7.74866 5.97421Z"
                      fill="" />
                    <path
                      d="M14.6667 13.75C14.6667 17.2938 11.7939 20.1667 8.25004 20.1667C7.11011 20.1667 6.03962 19.8694 5.11182 19.3482L2.76946 20.129C2.21421 20.3141 1.68597 19.7858 1.87105 19.2306L2.65184 16.8882C2.13062 15.9604 1.83338 14.89 1.83338 13.75C1.83338 10.2062 4.70622 7.33333 8.25004 7.33333C11.7939 7.33333 14.6667 10.2062 14.6667 13.75ZM5.95838 13.75C5.95838 13.2437 5.54797 12.8333 5.04171 12.8333C4.53545 12.8333 4.12504 13.2437 4.12504 13.75C4.12504 14.2563 4.53545 14.6667 5.04171 14.6667C5.54797 14.6667 5.95838 14.2563 5.95838 13.75ZM9.16671 13.75C9.16671 13.2437 8.7563 12.8333 8.25004 12.8333C7.74379 12.8333 7.33338 13.2437 7.33338 13.75C7.33338 14.2563 7.74379 14.6667 8.25004 14.6667C8.7563 14.6667 9.16671 14.2563 9.16671 13.75ZM11.4584 14.6667C11.9647 14.6667 12.375 14.2563 12.375 13.75C12.375 13.2437 11.9647 12.8333 11.4584 12.8333C10.9521 12.8333 10.5417 13.2437 10.5417 13.75C10.5417 14.2563 10.9521 14.6667 11.4584 14.6667Z"
                      fill="" />
                  </svg>
                  <span></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="message">
                  <li>
                    <a href="#0">
                      <div class="image">
                        <img src="{{asset('dashboard')}}/images/lead/lead-5.png" alt="" />
                      </div>
                      <div class="content">
                        <h6>Jacob Jones</h6>
                        <p>Hey!I can across your profile and ...</p>
                        <span>10 mins ago</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#0">
                      <div class="image">
                        <img src="{{asset('dashboard')}}/images/lead/lead-3.png" alt="" />
                      </div>
                      <div class="content">
                        <h6>John Doe</h6>
                        <p>Would you mind please checking out</p>
                        <span>12 mins ago</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#0">
                      <div class="image">
                        <img src="{{asset('dashboard')}}/images/lead/lead-2.png" alt="" />
                      </div>
                      <div class="content">
                        <h6>Anee Lee</h6>
                        <p>Hey! are you available for freelance?</p>
                        <span>1h ago</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </div> --}}
              <!-- message end -->
              <!-- profile start -->
              <div class="profile-box ml-15">
                {{-- <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="profile-info">
                    <div class="info">
                      <div class="image">
                        <img src="{{asset('dashboard')}}/images/profile/profile-image.png" alt="" />
                      </div>
                      <div>
                        <h6 class="fw-500">Adam Joe</h6>
                        <p>Admin</p>
                      </div>
                    </div>
                  </div>
                </button> --}}
                {{-- <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                  <li>
                    <div class="author-info flex items-center !p-1">
                      <div class="image">
                        <img src="{{asset('dashboard')}}/images/profile/profile-image.png" alt="image">
                      </div>
                      <div class="content">
                        <h4 class="text-sm">Adam Joe</h4>
                        <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs"
                          href="#">Email@gmail.com</a>
                      </div>
                    </div>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="#0">
                      <i class="lni lni-user"></i> View Profile
                    </a>
                  </li>
                  <li>
                    <a href="#0">
                      <i class="lni lni-alarm"></i> Notifications
                    </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-inbox"></i> Messages </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-cog"></i> Settings </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="#0"> <i class="lni lni-exit"></i> Sign Out </a>
                  </li>
                </ul>
              </div>
              <!-- profile end -->
            </div>
          </div>
        </div>
      </div>
    </header> --}}
    <!-- ========== header end ========== -->

    <!-- ========== section start ========== -->
    <section class="section">
      <div class="">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
          {{-- <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title">
                <h2>Profile</h2>
              </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
              <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#0">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Page
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <!-- end col -->
          </div> --}}
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="row">
          <div class="col-xxl-9 col-lg-8">
            <div class="profile-wrapper mb-30">
              <div class="profile-cover">
                <img src="{{asset('dashboard')}}/images/profile/profile-cover.jpg" alt="cover-image" />
                <div class="update-image">
                  <input type="file" />
                  <label for=""><i class="lni lni-camera"></i> Edit Cover Photo
                  </label>
                </div>
              </div>
              <div class="d-md-flex">
                <div class="profile-photo">
                  <div class="image">
                    <img src="{{asset('storage/images/managers/' . Auth::guard('manage')->user()->img )}}" alt="profile" />
                    <div class="update-image">
                      <input type="file" />
                      <label for=""><i class="lni lni-camera"></i></label>
                    </div>
                  </div>
                  <div class="profile-meta pt-25">
                    <h5 class="text-bold mb-10">{{Auth::guard('manage')->user()->name}}</h5>
                    <p class="text-sm">Manager</p>
                  </div>
                </div>
                <div class="profiles-activities w-100 pt-30">
                  <ul class="d-flex align-items-center">
                    <li class="mr-30">
                      <p><strong>234</strong> Posts</p>
                    </li>
                    <li class="mr-30">
                      <p><strong>34K</strong> Followers</p>
                    </li>
                    <li class="mr-30">
                      <p><strong>4K</strong> Following</p>
                    </li>
                    <li class="ms-auto">
                      <div class="more-btn-wrapper">
                        <button class="more-btn dropdown-toggle" id="moreAction" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="lni lni-more-alt"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction">
                          <li class="dropdown-item">
                            <a href="#0" class="text-gray">Add All</a>
                          </li>
                          <li class="dropdown-item">
                            <a href="#0" class="text-gray">Remove All</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="profile-info">
                <h5 class="text-bold mb-15">About Me</h5>
                <p class="text-sm mb-30">
                  Hello there, I am an expert Web & UI/UX Designer. I am a
                  full-time Freelancer and my passion is to satisfy my buyers
                  by giving 100% best quality work. I will Design Landing
                  page, UI/UX Design, web template design E-mail template
                  design Flyer Design, All Print Media Design, etc..
                  <a href="#0" class="text-medium text-dark">[Read More]</a>
                </p>

                <ul class="socials">
                  <li>
                    <a href="#0"><i class="lni lni-facebook-fill"></i></a>
                  </li>
                  <li>
                    <a href="#0"><i class="lni lni-twitter-fill"></i></a>
                  </li>
                  <li>
                    <a href="#0"><i class="lni lni-instagram-fill"></i></a>
                  </li>
                  <li>
                    <a href="#0"><i class="lni lni-behance-original"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- end card -->
            <div class="card-style mb-30">
              <div class="title d-flex align-items-center justify-content-between flex-wrap">
                <h6 class="mb-20">Featured</h6>
                <a href="#0" class="main-btn btn-sm primary-btn btn-hover mb-20">
                  <i class="lni lni-plus mr-10"></i>
                  Add new feature
                </a>
              </div>
              <div class="row">
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="card-style-6 mb-30">
                    <div class="card-meta mb-25">
                      <div class="d-flex align-items-center flex-wrap mb-10">
                        <h5 class="text-bold mr-20">
                          <a href="#0" class="title">Lindy Uikit</a>
                        </h5>
                        <span>11 Jun, 2022</span>
                      </div>
                      <p>I will Design Landing page, UI/UX ...</p>
                    </div>
                    <div class="card-image">
                      <a href="#0">
                        <img src="{{asset('dashboard')}}/images/cards/card-style-6/card-1.jpg" alt="" />
                      </a>
                    </div>
                    <div class="card-action">
                      <div class="action mr-20">
                        <button><i class="lni lni-thumbs-up"></i></button>
                        <a href="#0">434 Like</a>
                      </div>
                      <div class="action">
                        <button><i class="lni lni-comments"></i></button>
                        <a href="#0">43 Comments</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="card-style-6 mb-30">
                    <div class="card-meta mb-25">
                      <div class="d-flex align-items-center flex-wrap mb-10">
                        <h5 class="text-bold mr-20">
                          <a href="#0" class="title">EcommaerceHTML</a>
                        </h5>
                        <span>11 Jun, 2022</span>
                      </div>
                      <p>I will Design Landing page, UI/UX ...</p>
                    </div>
                    <div class="card-image">
                      <a href="#0">
                        <img src="{{asset('dashboard')}}/images/cards/card-style-6/card-2.jpg" alt="" />
                      </a>
                    </div>
                    <div class="card-action">
                      <div class="action mr-20">
                        <button><i class="lni lni-thumbs-up"></i></button>
                        <a href="#0">434 Like</a>
                      </div>
                      <div class="action">
                        <button><i class="lni lni-comments"></i></button>
                        <a href="#0">43 Comments</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="card-style-6 mb-30">
                    <div class="card-meta mb-25">
                      <div class="d-flex align-items-center flex-wrap mb-10">
                        <h5 class="text-bold mr-20">
                          <a href="#0" class="title">Cripto Template</a>
                        </h5>
                        <span>11 Jun, 2022</span>
                      </div>
                      <p>I will Design Landing page, UI/UX ...</p>
                    </div>
                    <div class="card-image">
                      <a href="#0">
                        <img src="{{asset('dashboard')}}/images/cards/card-style-6/card-3.jpg" alt="" />
                      </a>
                    </div>
                    <div class="card-action">
                      <div class="action mr-20">
                        <button><i class="lni lni-thumbs-up"></i></button>
                        <a href="#0">434 Like</a>
                      </div>
                      <div class="action">
                        <button><i class="lni lni-comments"></i></button>
                        <a href="#0">43 Comments</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-12 col-xl-6">
                  <div class="card-style-6 mb-30">
                    <div class="card-meta mb-25">
                      <div class="d-flex align-items-center flex-wrap mb-10">
                        <h5 class="text-bold mr-20">
                          <a href="#0" class="title">Plain Bootstrap Template</a>
                        </h5>
                        <span>11 Jun, 2022</span>
                      </div>
                      <p>I will Design Landing page, UI/UX ...</p>
                    </div>
                    <div class="card-image">
                      <a href="#0">
                        <img src="{{asset('dashboard')}}/images/cards/card-style-6/card-4.jpg" alt="" />
                      </a>
                    </div>
                    <div class="card-action">
                      <div class="action mr-20">
                        <button><i class="lni lni-thumbs-up"></i></button>
                        <a href="#0">434 Like</a>
                      </div>
                      <div class="action">
                        <button><i class="lni lni-comments"></i></button>
                        <a href="#0">43 Comments</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="text-center mb-10">
                    <a href="#0" class="main-btn primary-btn btn-hover">See All</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- end card -->
          </div>
          <!-- end col -->
          <div class="col-xxl-3 col-lg-4">
            <div class="card-style chat-list-card">
              <div class="title mb-20 d-flex justify-content-between align-items-center">
                <h6>Messages</h6>
                <div class="more-btn-wrapper">
                  <button class="more-btn dropdown-toggle" id="moreAction" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="lni lni-more-alt"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction">
                    <li class="dropdown-item">
                      <a href="#0" class="text-gray">Mark as Read</a>
                    </li>
                    <li class="dropdown-item">
                      <a href="#0" class="text-gray">Reply</a>
                    </li>
                  </ul>
                </div>
              </div>
              <form action="#">
                <div class="input-style-3">
                  <input type="text" placeholder="Search...." />
                  <span class="icon">
                    <i class="lni lni-search-alt"></i>
                  </span>
                </div>
              </form>
              <!-- end search form -->
              <div class="chat-list-wrapper">
                <a href="#0" class="chat-list d-block">
                  <div class="chat-list-item">
                    <div class="image">
                      <img src="{{asset('dashboard')}}/images/lead/lead-6.png" alt="" />
                      <span class="status"></span>
                    </div>
                    <div class="content">
                      <div class="title">
                        <h6 class="text-sm text-medium">Jacob Jones</h6>
                        <div class="d-flex align-items-center">
                          <span>20m</span>
                          <button><i class="lni lni-star-half"></i></button>
                        </div>
                      </div>
                      <p class="text-sm">I cam across your profile and...</p>
                    </div>
                  </div>
                </a>
                <!-- end chat-list -->
                <a href="#0" class="chat-list d-block">
                  <div class="chat-list-item">
                    <div class="image">
                      <img src="{{asset('dashboard')}}/images/lead/lead-4.png" alt="" />
                      <span class="status"></span>
                    </div>
                    <div class="content">
                      <div class="title">
                        <h6 class="text-sm text-medium">Ronald Richards</h6>
                        <div class="d-flex align-items-center">
                          <span>25m</span>
                          <button><i class="lni lni-star-half"></i></button>
                        </div>
                      </div>
                      <p class="text-sm">I like your confidence 💪</p>
                    </div>
                  </div>
                </a>
                <!-- end chat-list -->
                <a href="#0" class="chat-list d-block">
                  <div class="chat-list-item">
                    <div class="image">
                      <img src="{{asset('dashboard')}}/images/lead/lead-1.png" alt="" />
                      <span class="status"></span>
                    </div>
                    <div class="content">
                      <div class="title">
                        <h6 class="text-sm text-medium">Esther Howard</h6>
                        <div class="d-flex align-items-center">
                          <span>30m</span>
                          <button><i class="lni lni-star-half"></i></button>
                        </div>
                      </div>
                      <p class="text-sm">Can you share your offer?</p>
                    </div>
                  </div>
                </a>
                <!-- end chat-list -->
                <a href="#0" class="chat-list d-block">
                  <div class="chat-list-item">
                    <div class="image">
                      <img src="{{asset('dashboard')}}/images/lead/lead-2.png" alt="" />
                      <span class="status"></span>
                    </div>
                    <div class="content">
                      <div class="title">
                        <h6 class="text-sm text-medium">Cody Fisher</h6>
                        <div class="d-flex align-items-center">
                          <span>32m</span>
                          <button><i class="lni lni-star-half"></i></button>
                        </div>
                      </div>
                      <p class="text-sm">When you available for talk?</p>
                    </div>
                  </div>
                </a>
                <!-- end chat-list -->
                <a href="#0" class="chat-list d-block">
                  <div class="chat-list-item">
                    <div class="image">
                      <img src="{{asset('dashboard')}}/images/lead/lead-3.png" alt="" />
                      <span class="status"></span>
                    </div>
                    <div class="content">
                      <div class="title">
                        <h6 class="text-sm text-medium">Devon Lane</h6>
                        <div class="d-flex align-items-center">
                          <span>40m</span>
                          <button><i class="lni lni-star-half"></i></button>
                        </div>
                      </div>
                      <p class="text-sm">I’m waiting for you response?</p>
                    </div>
                  </div>
                </a>
                <!-- end chat-list -->
                <a href="#0" class="chat-list d-block">
                  <div class="chat-list-item">
                    <div class="image">
                      <img src="{{asset('dashboard')}}/images/lead/lead-4.png" alt="" />
                      <span class="status"></span>
                    </div>
                    <div class="content">
                      <div class="title">
                        <h6 class="text-sm text-medium">Robert Fox</h6>
                        <div class="d-flex align-items-center">
                          <span>1h</span>
                          <button><i class="lni lni-star-half"></i></button>
                        </div>
                      </div>
                      <p class="text-sm">Can you share your brief and...</p>
                    </div>
                  </div>
                </a>
                <!-- end chat-list -->
                <a href="#0" class="chat-list d-block">
                  <div class="chat-list-item">
                    <div class="image">
                      <img src="{{asset('dashboard')}}/images/lead/lead-5.png" alt="" />
                      <span class="status"></span>
                    </div>
                    <div class="content">
                      <div class="title">
                        <h6 class="text-sm text-medium">Jenny Wilson</h6>
                        <div class="d-flex align-items-center">
                          <span>2h</span>
                          <button><i class="lni lni-star-half"></i></button>
                        </div>
                      </div>
                      <p class="text-sm">💪💪💪💪</p>
                    </div>
                  </div>
                </a>
                <!-- end chat-list -->
                <a href="#0" class="chat-list d-block">
                  <div class="chat-list-item">
                    <div class="image">
                      <img src="{{asset('dashboard')}}/images/lead/lead-6.png" alt="" />
                      <span class="status"></span>
                    </div>
                    <div class="content">
                      <div class="title">
                        <h6 class="text-sm text-medium">Kathryn Murphy</h6>
                        <div class="d-flex align-items-center">
                          <span>2d</span>
                          <button><i class="lni lni-star-half"></i></button>
                        </div>
                      </div>
                      <p class="text-sm">I cam across your profile and...</p>
                    </div>
                  </div>
                </a>
                <!-- end chat-list -->
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
      </div>
      <!-- end container -->
    </section>

@endsection
