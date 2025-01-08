@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="">
                {{ __('Create Study Fields') }}
            </h2>
        </div>
    </div>
  </section><!-- End Hero -->
  <main id="main">
    <div class="wrapper ">
    <div class="container">
  
      <form action="{{ route('study_field.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group">
                <label>Field Of Study : </label>
                <input type="text" name="name"  class="form-control" >
            </div>
        </div>
        <div class="form-group text-right p-2">
            <input type="submit" name="text"  class="btn btn-primary" >
        </div>
    </form>
    </div>
  </main><!-- End #main -->

@endsection