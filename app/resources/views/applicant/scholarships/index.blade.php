@extends('bootlayout.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 {{ __('Scholarships') }}
            </h2>
        </div>
    </div>
</section><!-- End Hero -->

<div class="py-12">
    <div class="container p-3">
        <div class="container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="table-responsive p-4">
                    @if($errors)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        @if($applicant == null )
                            <h2 class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <a href="{{ route('educational_record.index')}}" class="text-center">
                                    Please Update Prodile
                                </a>
                            </h2>
                        @else
                                @if(count($applicant->qualifications) < 1 )
                                    <h2 class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <a href="{{ route('educational_record.index')}}" class="text-center">
                                            Please Update Your Qualifications
                                        </a>
                                    </h2>
                                @else
                                    @if($applicant->currentSemester == null )
                                        <h2 class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                            <a href="{{ route('educational_record.index')}}" class="text-center">
                                                Please Update Current Semester Details
                                            </a>
                                        </h2>
                                    @else
                                        <div class="accordion" id="accordionExample">
    
    
                                            @foreach($scholarships as $scholarship)
                                                <div class="p-4 m-4">
                                                    <div class="accordion-item bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                                                        <h1 onclick="$(this).parent().find('.accordion-collapse').toggle();" >
                                                            <strong>  {{$scholarship->post}} </strong>
                                                                <hr class="p-4">
    
                                                        </h1>
                                                        <div class="accordion-collapse " style="display:block">
                                                            <div class="accordion-body">
                                                                {!! $scholarship->conditions !!}
                                                                <div>
                                                                    @if(count(Auth::user()->applicant->applied_scholarships->where('job_id',$scholarship->id)) > 0)
                                                                        @php
                                                                            $appliedScholarship=Auth::user()->applicant->applied_scholarships->where('job_id',$scholarship->id)->first();
                                                                        @endphp
                                                                        <div class="py-2">
                                                                            <h3>Your application has been submitted successfully.</h3>
                                                                            <strong>
                                                                                Applied Date:  
                                                                                {{ $appliedScholarship->apply_date}}
                                                                            </strong>
                                                                                         <strong>
                                                                                Applied Date:  
                                                                                {{ $appliedScholarship->review}}
                                                                            </strong>
                                                                                         <strong>
                                                                                Applied Date:  
                                                                                {{ $appliedScholarship->status}}
                                                                            </strong>
                                                                        </div>
                                                                        <!--<div class="">-->
                                                                        <!--    <a target="_blank" href="{{ route('scholarship.show', $appliedScholarship->id) }}" class="btn btn-primary" >-->
                                                                        <!--        Print Form-->
                                                                        <!--    </a>-->
                                                                        <!--</div>-->
                                                                    @else
                                                                        <form action="{{ route('scholarship.store') }}" method="post" class="py-2">
                                                                            @csrf
                                                                            <input type="hidden" name="scholarship_id" value="{{$scholarship->id}}">
                                                                            <div>
                                                                                <input type="submit" name="submit" value="Apply Now For {{$scholarship->post}}" class=" btn btn-primary" >
                                                                            </div>
                                                                        </form>
                                                                    @endif
                                                                </div>
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection