@extends('bootlayout.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Current Academic Detail') }}
            </h2>
        </div>
    </div>
</section><!-- End Hero -->

<div class="py-12">
    <div class="container p-3">
        <div class="container">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                    <form action="{{ route('current.store')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="applicant_id" value="{{$currentSemester->id ?? ""}}">
                            
                            
                                <div class="row">
<div class="form-group col-md-6">
    <label>Field Of Study:</label>
    <select class="form-control" name="field_of_study" id="field_of_study">
        <option selected disabled>Field Of Study</option>
        @foreach($StudyFields as $key => $StudyField)
            <option 
                value="{{ $StudyField->id }}">
                {{ $StudyField->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-6">
    <label>Degree Title/Program:</label>
    <select class="form-control" name="degree_deg" id="degree_deg">
        <option selected disabled>Degree</option>
        @foreach($degreePrograms as $key => $degreeProgram)
            <option 
                data-studyField="{{ $degreeProgram->study_field_id }}"
                value="{{ $degreeProgram->id }}">
                {{ $degreeProgram->name }}
            </option>
        @endforeach
    </select>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var fieldOfStudySelect = document.getElementById('field_of_study');
        var degreeSelect = document.getElementById('degree_deg');
        
        // Initially hide all degree options
        filterDegreeOptions();

        // Listen to change event on Field of Study dropdown
        fieldOfStudySelect.addEventListener('change', function() {
            filterDegreeOptions();
        });

        function filterDegreeOptions() {
            var selectedFieldOfStudy = fieldOfStudySelect.value;
            var degreeOptions = degreeSelect.querySelectorAll('option');

            // Show/Hide degree options based on selected Field of Study
            degreeOptions.forEach(function(option) {
                if(option.dataset.studyfield == selectedFieldOfStudy || option.disabled) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });
        }
    });
</script>

                                    <div class="form-group col-md-6">
                                        <label> Name of College/University * : </label>
                                        <input type="text" required="" name="collegeuni" value="{{$currentSemester->collegeuni}}" class="form-control" required=""> 
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label> Current Semester *: </label>
                                            <select name="currents" value="" class="form-control" required="">
                                                <option @if($currentSemester->degree == "1st") selected="" @endif value="1st">1st</option>
                                                <option @if($currentSemester->degree == "2nd") selected="" @endif value="2nd">2nd</option>
                                                <option @if($currentSemester->degree == "3rd") selected="" @endif value="3rd">3rd</option>
                                                <option @if($currentSemester->degree == "4th") selected="" @endif value="4th">4th</option>
                                                <option @if($currentSemester->degree == "5th") selected="" @endif value="5th">5th</option>
                                                <option @if($currentSemester->degree == "6th") selected="" @endif value="6th">6th</option>
                                                <option @if($currentSemester->degree == "7th") selected="" @endif value="7th">7th</option>
                                                <option @if($currentSemester->degree == "8th") selected="" @endif value="8th">8th</option>
                                                <option @if($currentSemester->degree == "9th") selected="" @endif value="9th">9th</option>
                                                <option @if($currentSemester->degree == "10th") selected="" @endif value="10th">10th</option>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Please select fresh or renewal</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fresh_renewal" id="fresh" value="Fresh" @if(Auth::user()->applicant->fresh_renewal == "Fresh" ) checked @endif>
                                            <label class="form-check-label" for="fresh">
                                                Fresh
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fresh_renewal" id="renewal" value="Renewal" @if(Auth::user()->applicant->fresh_renewal == "Renewal" ) checked @endif>
                                            <label class="form-check-label" for="renewal">
                                                Renewal
                                            </label>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group col-md-6 py-2 col-md-6">
                                        <label > Last Fee : </label>
                                        <input class="form-control" type="file" name="last_fee" onchange="readURL(this)">
                                    </div>
                                    <div class="form-group col-md-6 py-2 col-md-6">
                                        <label > Bonafide : </label>
                                        <input class="form-control" type="file" name="bonafide" onchange="readURL(this)">
                                    </div>
                                </div>
                            <div class="form-group text-right p-2">
                                <input type="submit" name="text"  class="btn btn-primary" >
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection