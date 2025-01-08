  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">'=
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ route('welcome')}}">
      <img src="{{ asset('Logo/logo.png') }}" width="">
      </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          @if (Route::has('login'))
            @auth
              @if(Auth::user()->type =="applicant")
                <li><a class="nav-link scrollto active" href="{{ route('dashboard')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ route('personal_info.index')}}">{{ __('Personal Detail') }}</a></li>
                <li><a class="nav-link scrollto" href="{{ route('guardian_detail.index')}}">{{ __('Guardian Details') }}</a></li>
                <li><a class="nav-link   scrollto" href="{{ route('educational_record.index')}}"> {{ __('Eucational Record') }}</a></li>
                <li><a class="nav-link scrollto" href="{{ route('current.index')}}">{{ __('Current Academic') }}</a></li>
                <li><a class="nav-link scrollto" href="{{ route('scholarship.index')}}">{{ __('Scholarships') }}</a></li>
              @else

              
              <!--<li><a class="nav-link scrollto" href="{{ route('admin.applicants')}}">{{ __('Applicants') }}</a></li>-->
              <li><a class="nav-link scrollto" href="{{ route('admin.scholarships')}}">{{ __('Scholarships') }}</a></li>
              
                            <li><a class="nav-link scrollto" href="{{ route('admin.user.index') }}">{{ __('User') }}</a></li>



              <li class="dropdown"><a href="#">Setting</i></a>
                <ul>
                    <li><a href="{{ route('study_field.index') }}""> {{ __('Study Fields')}}</a><li>
                    <li><a  href="{{ route('degree_field.index') }}""> {{ __('Degrees')}}</a><li>
                </ul>
              </li>
                {{-- <li class="dropdown"><a href="#">General</i></a>
                  <ul>
                      <li><a href="{{ route('freshGeneral') }}""> {{ __('Fresh General')}}</a><li>
                      <li><a  href="{{ route('renewalGeneral') }}""> {{ __('Renewal General')}}</a><li>
                  </ul>
                </li>
                <li class="dropdown"><a href="#">Saddat</i></a>
                  <ul>
                      <li><a href="{{ route('freshSadaat') }}""> {{ __('Fresh Sadaat')}}</a><li>
                      <li><a  href="{{ route('renewalSadaat') }}""> {{ __('Renewal Sadaat')}}</a><li>
                  </ul>
                </li>
                <li class="dropdown"><a href="#">Abshaar</i></a>
                  <ul>
                      <li><a href="{{ route('freshAbshaar') }}""> {{ __('Fresh Abshaar')}}</a><li>
                      <li><a  href="{{ route('renewalAbshaar') }}""> {{ __('Renewal Abshaar')}}</a><li>
                  </ul>
                </li> --}}
              @endif
                
                <li class="dropdown"><a href="#"><i class="fa fa-chevron">{{Auth::user()->name}}</i></a>
                  <ul>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <li><a onclick="event.preventDefault();
                                            this.closest('form').submit();">{{ __('Log Out') }}</a></li>
                    </form>

                  </ul>
                </li>
              </ul>
            @else
                <li><a class="nav-link scrollto active" href="{{ route('login')}}">Login</a></li>
                @if (Route::has('register'))
                  <li><a class="nav-link scrollto active" href="{{ route('register')}}">Register</a></li>
                @endif

            @endauth
          @endif





        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
