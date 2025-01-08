@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="">
                {{ __('Applicants') }}
            </h2>
            {{-- <a class="btn btn-success px-5" href="{{ url('degree_field/create') }}">Add New</a> --}}
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
                    <td>Post</td>
                    <td>Date of Advertisement</td>
                    <td>Last Date</td>
                    <td>Total Applicants</td>
                    <td>Approved</td>
                    <td>Rejected</td>
                    <td>Details Resubmission</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($scholarships as $key => $scholarship)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $scholarship->post }}</td>
                    <td>{{ $scholarship->date_of_advertisement }}</td>
                    <td>{{ $scholarship->last_date }}</td>
        
                    <!-- Count total applicants -->
                    <td>{{ $scholarship->applicants->count() }}</td>
        
                    <!-- Count approved applicants -->
                    <td>{{ $scholarship->applicants->where('pivot.status', 'Accept')->count() }}</td>
        
                    <!-- Count rejected applicants -->
                    <td>{{ $scholarship->applicants->where('pivot.status', 'Reject')->count() }}</td>
        
                    <!-- Count resubmission applicants -->
                    <td>{{ $scholarship->applicants->where('pivot.status', 'Review')->count() }}</td>
        
                    <td>
                        <!-- Button to view applicants -->
                        <a href="{{ route('admin.scholarships.index', ['id' => $scholarship->id]) }}" class="btn btn-primary">
                            View Applicants
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        

        

        
        
        

        
        <style>
svg.w-5.h-5 {
    width: 10px;
}
            </style>
    </div>
  </div>
  </main><!-- End #main -->

@endsection