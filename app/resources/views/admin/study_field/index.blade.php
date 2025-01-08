@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="">
                {{ __('Study Fields') }}
            </h2>
            <a class="btn btn-success px-5" href="{{ url('study_field/create') }}">Add New</a>
        </div>
    </div>
  </section><!-- End Hero -->
  <main id="main">
    <div class="wrapper">
    <div class="container">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <td>S.No</td>
                    <td>Name</td>
                </tr>
            </thead>
            <tbody>
                @foreach($StudyFields as $key => $StudyField)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$StudyField->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
  </main><!-- End #main -->

@endsection