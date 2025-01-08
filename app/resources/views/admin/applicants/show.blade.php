@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="">
                {{ __('Scholarhip Applicants') }} {{ $scholarshipApplicant->name}}
            </h2>
            {{-- <a class="btn btn-success px-5" href="{{ url('degree_field/create') }}">Add New</a> --}}
        </div>
    </div>
  </section><!-- End Hero -->
  <main id="main">
    <div class="wrapper">
        <div class="container">
            <div class="tabs-wrapper">
                <input type="radio" name="tab" id="tab1" class="tab-head" checked="checked" />
                <label for="tab1">Personal Information</label>
                <input type="radio" name="tab" id="tab2" class="tab-head" />
                <label for="tab2">Guardian Details</label>
                <input type="radio" name="tab" id="tab3" class="tab-head" />
                <label for="tab3">Educational Record</label>
                <input type="radio" name="tab" id="tab4" class="tab-head" />
                <label for="tab4">Current Semester</label>
                <input type="radio" name="tab" id="tab5" class="tab-head" />
                <label for="tab5">Scholarship</label>
                <div class="tab-body-wrapper">
                    <div id="tab-body-1" class="tab-body">
                        <h1>Personal Information</h1>
                        @include('admin.applicants.detail.personal_info')
                    </div>
                    <div id="tab-body-2" class="tab-body">
                        <h1>Guardian Details</h1>
                        @include('admin.applicants.detail.guardian')
                    </div>
                    <div id="tab-body-3" class="tab-body">
                        <h1>Educational Record</h1>
                        @include('admin.applicants.detail.educational_record')
                    </div>
                    <div id="tab-body-4" class="tab-body">
                        <h1>Current Semester</h1>
                        @include('admin.applicants.detail.current')
                    </div>
                    <div id="tab-body-5" class="tab-body">
                        <h1>Scholarships</h1>
              @include('admin.applicants.detail.scholarship')
                        
                    </div>
                </div>
            </div>
          </div>

        </div>
    </div>
  </main><!-- End #main -->

  <style>
@import url(https://fonts.googleapis.com/css?family=Raleway:100,200,300);
@keyframes content-opacity {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@keyframes content-rotate-y {
  from {
    -moz-transform: rotateY(90deg);
    -ms-transform: rotateY(90deg);
    -webkit-transform: rotateY(90deg);
    transform: rotateY(90deg);
  }
  to {
    opacity: 1;
    -moz-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    -webkit-transform: rotateY(0deg);
    transform: rotateY(0deg);
  }
}
@keyframes content-rotate-x {
  from {
    -moz-transform: rotateX(90deg);
    -ms-transform: rotateX(90deg);
    -webkit-transform: rotateX(90deg);
    transform: rotateX(90deg);
  }
  to {
    opacity: 1;
    -moz-transform: rotateX(0deg);
    -ms-transform: rotateX(0deg);
    -webkit-transform: rotateX(0deg);
    transform: rotateX(0deg);
  }
}
@keyframes content-rotate-both {
  from {
    -moz-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
    -moz-transform-origin: 0% 50% 50%;
    -ms-transform-origin: 0% 50% 50%;
    -webkit-transform-origin: 0% 50% 50%;
    transform-origin: 0% 50% 50%;
  }
  to {
    opacity: 1;
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    -moz-transform-origin: 0% 50% 50%;
    -ms-transform-origin: 0% 50% 50%;
    -webkit-transform-origin: 0% 50% 50%;
    transform-origin: 0% 50% 50%;
  }
}
@keyframes content-pop-out {
  0% {
    opacity: 1;
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  50% {
    opacity: 1;
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
  100% {
    opacity: 1;
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes content-pop-in {
  from {
    opacity: 1;
    -moz-transform: scale(1.1);
    -ms-transform: scale(1.1);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
  to {
    opacity: 1;
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes content-slide-bot {
  from {
    top: 20px;
    opacity: 0;
  }
  to {
    top: 0px;
    opacity: 1;
  }
}
@keyframes content-slide-top {
  from {
    top: -20px;
    opacity: 0;
  }
  to {
    top: 0px;
    opacity: 1;
  }
}
@keyframes show {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
html {
  background: url(http://distinctionjewelry.com/info/wp-content/uploads/2013/01/blurred-background-10-2000x1250.jpg);
  webkit-font-smoothing: antialiased;
  font: 1em/1.5em "Raleway";
  font-weight: normal;
}

.tabs-wrapper {
  margin: 5% 10% 0 10%;
}
.tabs-wrapper input[type="radio"] {
  display: none;
}
.tabs-wrapper label {
  transition: background 0.4s ease-in-out, height 0.2s linear;
  display: inline-block;
  cursor: pointer;
  color: #dbdbd3;
  width: 20%;
  height: 3em;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  background: #525252;
  text-align: center;
  line-height: 3em;
}
.tabs-wrapper label:last-of-type {
  border-bottom: none;
}
.tabs-wrapper label:hover {
  background: #667876;
}
@media screen and (max-width: 1600px) {
  .tabs-wrapper label {
    width: 15%;
  }
}
@media screen and (max-width: 900px) {
  .tabs-wrapper label {
    width: 20%;
  }
}
@media screen and (max-width: 600px) {
  .tabs-wrapper label {
    width: 100%;
    display: block;
    border-bottom: 2px solid #4d4c47;
    border-radius: 0;
  }
}
@media screen and (max-width: 600px) {
  .tabs-wrapper {
    margin: 0;
  }
}

#tab1:checked + label,
#tab2:checked + label,
#tab3:checked + label,
#tab4:checked + label,
#tab5:checked + label {
  background: #b8b63e;
  color: #f2f2f2;
}

.tab-body {
  position: absolute;
  top: -9999px;
  opacity: 0;
  padding: 10px;
}

.tab-body-wrapper {
  background: #f7eec6;
  border-top: #b8b63e 5px solid;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
  border-top-right-radius: 3px;
  animation-delay: 0.2s;
  animation-duration: 1.5s;
  animation-name: show;
  animation-fill-mode: forwards;
}
@media screen and (max-width: 600px) {
  .tab-body-wrapper {
    border: none;
    border-radius: 0;
  }
}

#tab1:checked ~ .tab-body-wrapper #tab-body-1,
#tab2:checked ~ .tab-body-wrapper #tab-body-2,
#tab3:checked ~ .tab-body-wrapper #tab-body-3,
#tab4:checked ~ .tab-body-wrapper #tab-body-4,
#tab5:checked ~ .tab-body-wrapper #tab-body-5 {
  position: relative;
  top: 0px;
  animation-delay: 0.1s;
  animation-duration: 0.4s;
  animation-name: content-pop-out;
  animation-fill-mode: forwards;
}
    </style>

<script>


    </script>
@endsection
