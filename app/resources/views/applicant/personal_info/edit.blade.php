@extends('bootlayout.app')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="inline-flex font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Personal Info') }}
            </h2>
            <a class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300:opacity-25 transition ease-in-out duration-150" href="{{ url('personal_info/') }}">Back</a>
        </div>
    </div>
  </section><!-- End Hero -->
    <section id="" class="d-flex align-items-center" >
    <div class="container">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                    <div >
                        <form action="{{ url('personal_info/$applicant->id')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                            <div class="form-group py-2 col-md-6">
                                <label > Image : </label>
                                <input class="form-control" type="file" name="picture" onchange="readURL(this)">
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label > Domicile : </label>
                                <input class="form-control" type="file" name="domicile" onchange="readURL(this)">
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label > CNIC Picture : </label>
                                <input class="form-control" type="file" name="cnic_pic" onchange="readURL(this)">
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label > Applicant's Name : </label>
                                <input class="form-control" type="text" required name="name" value="{{ $applicant->name}}" required="">
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <label > Father's Name : </label>
                                <input class="form-control" type="text" required name="fname" value="{{ $applicant->fname }}">
                            </div>

                            {{-- <div class="form-group py-2 col-md-6">
                                <label >Renewal/Fresh</label>
                                <input  name="fresh_renewal" type="radio" value="Fresh" @if($applicant->fresh_renewal == "Fresh") checked @endif checked="">Fresh  &nbsp; &nbsp; &nbsp;
                                <input  name="fresh_renewal" type="radio" value="Renewal" @if($applicant->fresh_renewal == "Renewal") checked @endif>Renewal  &nbsp; &nbsp; &nbsp;
                            </div> --}}



                            <div class="form-group py-2 col-md-6">
                                <label >Gender *</label>
                                <input name="gender" type="radio" value="male"  @if ($applicant->gender == "male") checked @endif checked="" >Male &nbsp; &nbsp; &nbsp;
                                <input name="gender" type="radio" value="female"  @if ($applicant->gender == "female") checked @endif >Female &nbsp; &nbsp; &nbsp;
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <label > DOB : </label>
                                <input class="form-control" type="date" name="dob" value="{{ $applicant->dob }}">
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <label > CNIC : </label>
                                <input class="form-control" type="text" required name="cnic" value="{{ $applicant->cnic }}" maxlength="15" style="width:500px;" placeholder="00000-0000000-0">
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <label > Postal Address : </label>
                                <input class="form-control" type="text" required name="postal_address" value="{{ $applicant->postal_address }}">
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <label > District: </label>
                                <select class="form-control" name="district_id" id="district_id">
                                    @foreach( $districts as $district)
                                        <option value="{{$district->id}}" @if($district->id == $applicant->district_id) selected="" @endif> {{$district->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <label > Tehsil:</label>
                                <select class="form-control" name="tehsil_id" id="tehsil_id">
                                    @foreach( $scholarshipTehsils as $scholarshipTehsil)
                                        <option value="{{$scholarshipTehsil->id}}" @if($scholarshipTehsil->id == $applicant->tehsil_id) selected="" @endif> {{$scholarshipTehsil->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <label >  Village: </label>
                               <input class="form-control" type="text" required name="village" value="{{ $applicant->village }}">
                            </div>

                            <div class="form-group py-2 col-md-6">
                                <label >  Cell #: </label>
                                <input class="form-control" type="text" required name="cell_no" value="{{ $applicant->cell_no }}"> 
                            </div>
                            {{-- <div class="form-group py-2 col-md-6">
                                <label >Are your currently working *</label>
                                <input  name="working" onclick="$('.design_values').attr('required','true')" type="radio" value="Yes" @if($applicant->working == "Yes") checked @endif checked="">Yes  &nbsp; &nbsp; &nbsp;
                                <input  name="working" onclick="$('.design_values').removeAttr('required')" type="radio" value="No" @if($applicant->working == "No") checked @endif>No  &nbsp; &nbsp; &nbsp;

                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label >Designation</label>
                                <input class="form-control" type="desig" class="design_values" required name="desig" value="{{ $applicant->desig ?? "" }}" style="width:500px; border: 1px solid black;;"> 
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label > Employer: </label>
                                <input class="form-control" type="text" class="design_values" required name="employer" value="{{ $applicant->employer ?? "" }}">
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label > Monthly Income  </label>
                                <input class="form-control" type="text" class="design_values" required name="monthincome" value="{{ $applicant->monthincome ?? "" }}">
                            </div> --}}
                            <div >
                                <strong>
                                    Payments will be made through bank only.
                                </strong>
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label > Account Title  </label>
                                <input class="form-control" type="text" required name="ac_title" value="{{ $applicant->ac_title }}">
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label > Bank Branch  </label>
                                <input class="form-control" type="text" required name="bank_branch" value="{{ $applicant->bank_branch }}">
                            </div>
                            <div class="form-group py-2 col-md-6">
                                <label > Account No  </label>
                                <input class="form-control" type="text" required name="ac_no" value="{{ $applicant->ac_no }}">
                            </div>
                            <div class="form-group py-2 col-md-12">
                                <label >Justification for seeking financial assistance </label>
                                <textarea class="form-control" rows="4"  type="text" name="fass" data-gramm="false" wt-ignore-input="true">&nbsp;{{ $applicant->fass }}</textarea>

                            </div>

                            <div class="form-group py-2 col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection