@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Marafie Foundation Pakistan </h1>
          <h2>Scholarship For 2023-2024. The last date for the submission of the application is 31th August 2024.</h2>
          <!--<h2>Scholarship For 2023-2024.</h2>-->
          <div class="d-flex justify-content-center justify-content-lg-start">
              @Auth
                <a href="{{ route('personal_info.index')}}" class="btn-get-started scrollto">Get Started</a>
              @else
              
                <a href="{{ route('login')}}" class=" mx-2 btn-get-started scrollto">Login</a>
                <a href="{{ route('register')}}" class=" mx-2 btn-get-started scrollto">Register</a>
              @endauth
            
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <main id="main">
    <div class="wrapper">
    <div class="container py-3">

      <blockquote>

    <h1>MARAFIE Scholarship Scheme 2023-2024</h1>
    <hr>
    <p><strong>Note:</strong> The last date for the submission of the application is extended till 31st August 2024.</p>
    <p>MFP is pleased to announce its 2023-24 scholarship awards for the following categories:</p>
    <ul>
        <li>Ph.D (Science - five special scholarships known as ABSHAR)</li>
        <li>Ph.D/M.Phil/MS (IT, Natural Science, Tourism and Hospitality Management, Energy)</li>
        <li>BS (IT, Natural Science, Tourism and Hospitality Management, Energy)</li>
        <li>Inter to Ph.D (for SADDATs)</li>
    </ul>

    <h2>Basic Criteria</h2>
    <ol>
        <li>Applicant must be a regular student of a public university.</li>
        <li>Self-finance or private university students are not eligible.</li>
        <li>Five Ph.D special scholarships are reserved for science scholars only.</li>
        <li>Preference will be given to the most deserving and talented students from Baltistan and Haramosh.</li>
        <li>Students at the Master's level who genuinely deserve and have excellent academic records (at least 75% marks for Arts and 70% for Science) will be considered.</li>
        <li>Syed students from Inter to Master's level having at least 70% marks in Arts subjects and 65% in Science subjects will be considered.</li>
        <li>Each scholarship will be for one year and may be extended further based on academic performance. Those seeking renewal must submit a renewal application form.</li>
        <li>Monthly family income must be less than Rs. 55,000/-. (Not applicable for Ph.D students)</li>
        <li>These scholarships are awarded on a need-cum-merit basis.</li>
        <li>Applicants are required to fill out the information through the online application process. Requests for amendments will be entertained after submission of the online application; the candidate can amend their forms any time till the last date of submission.</li>
        <li>Applications will be processed based on the online data/information provided by the applicants.</li>
        <li>If any information is found to be untrue/misrepresented at any stage, the application will be rejected.</li>
        <li>The award of the scholarship will only be confirmed after the scrutiny process by the Scholarship Management Committee.</li>
    </ol>

    <h2>Other Requirements</h2>
    <p>Submit your application online.</p>
    <p>Fill in the required data and select the relevant category, e.g., General Scholarship, Saddat Scholarship, and Abshar Scholarship, and also fill in all required fields.</p>

    <p><strong>Note:</strong><br>
    Submission of a scholarship application does not guarantee the award of the scholarship.
    </p>


      </blockquote>

    </div>
    </div>
  </main><!-- End #main -->

@endsection

