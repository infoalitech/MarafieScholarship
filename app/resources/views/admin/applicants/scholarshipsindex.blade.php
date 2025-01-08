@extends('bootlayout.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="">
                {{ __('Scholarhip Applicants') }} {{ $scholarship->post}}
            </h2>
<a class="btn btn-success px-5" href="{{ route('admin.scholarships.index',$scholarship->id) }}" >Pending</a>
<a class="btn btn-success px-5" href="{{ route('admin.scholarships.accepted',$scholarship->id) }}" >Accepted</a>
<a class="btn btn-success px-5" href="{{ route('admin.scholarships.rejected',$scholarship->id) }}" >Rejected</a>
<a class="btn btn-success px-5" href="{{ route('admin.scholarships.review',$scholarship->id) }}" >Review</a>
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
                    <td>Name</td>
                        <td>Gender</td>
                    <td>Date of Birth</td>
                    <td>CNIC</td>
                    <td>Cell No</td>
                    <td>Domicile</td>
                    <td>Applied</td>
                    <td>Action</td>

                </tr>
            </thead>
            <tbody>
                @foreach($scholarshipApplicants as $key => $scholarshipApplicant)
                <tr>
                    <td>{{ ($scholarshipApplicants->currentPage() - 1) * $scholarshipApplicants->perPage() + $key + 1 }}</td>
                    <td>{{ $scholarshipApplicant->name }}</td>
                    <td>{{ $scholarshipApplicant->gender }}</td>
                    <td>{{ $scholarshipApplicant->dob }}</td>
                    <td>{{ $scholarshipApplicant->cnic }}</td>
                    <td>{{ $scholarshipApplicant->cell_no }}</td>
                    <td>{{ $scholarshipApplicant->domicile }}</td>
                    <td>
                        
                        {{ $scholarshipApplicant->appliedScholarships->pluck('post')  }}
                        
                    </td>
                    <td>
                        <!-- Button to view applicants -->
                        <a href="{{ route('admin.scholarship.applicant.show', ['id' => $scholarshipApplicant->id]) }}" class="btn btn-primary">
                            View Applicant
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $scholarshipApplicants->links() }}
            {{-- {{ $scholarshipApplicants }} --}}
        </div>
        
        <style>
svg.w-5.h-5 {
    width: 10px;
}
            </style>
    </div>
  </div>
  </main><!-- End #main -->

@endsection