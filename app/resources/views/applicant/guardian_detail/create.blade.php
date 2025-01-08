@extends('bootlayout.app')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Guardian Detail') }}
            </h2>
        </div>
    </div>
  </section><!-- End Hero -->

    <div class="py-12">
        <div class="container p-3">
            <div class="container"> 
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <form action="{{ route('guardian_detail.store')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="applicant_id" value="{{$scholarshipExperience->id ?? ""}}">
                        <table style="border-collapse: inherit;border: 1px solid; border-spacing: 1px; width:100%" id="tbl_exp">
                            <tbody>
                                <tr>
                                    <td> Father/Guardian Name * </td>
                                    <td> <input type="text" required="" name="gname" value="{{ $scholarshipExperience->gname}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> CNIC </td>
                                    <td> <input type="text" required="" name="gcnic" value="{{ $scholarshipExperience->gcnic}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Is Father Alive?*</td>
                                    <td><input name="galive" type="radio" @if( $scholarshipExperience->galive == "Yes" ) checked @endif value="Yes" checked="" > Yes &nbsp; &nbsp; &nbsp;
                                        <input name="galive" type="radio" @if( $scholarshipExperience->galive == "No" ) checked @endif value="No"> No &nbsp; &nbsp; &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td> Occupation </td>
                                    <td> <input type="text" required="" name="gpassion" value="{{ $scholarshipExperience->gpassion}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Professional Status </td>
                                    <td> <input type="text" required="" name="gstatus" value="{{ $scholarshipExperience->gstatus}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Employer/Company </td>
                                    <td> <input type="text" required="" name="gcompany" value="{{ $scholarshipExperience->gcompany}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Designation </td>
                                    <td> <input type="text" required="" name="gdesic" value="{{ $scholarshipExperience->gdesic}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Cell No </td>
                                    <td> <input type="text" required="" name="gcell" value="{{ $scholarshipExperience->gcell}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Phone No </td>
                                    <td> <input type="text" required="" name="gphone" value="{{ $scholarshipExperience->gphone}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Monthly Income </td>
                                    <td> 
                                        <input type="text" required="" name="gincome" value="{{ $scholarshipExperience->gincome}}" style="width:500px">
                                        <p>Only for Government Employees</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Income Certificate </td>
                                    <td> <input type="file" name="income_certificate" onchange="readURL(this)"> </td>
                                </tr>
                                <tr>
                                    <td>Is Mother alive? *</td>
                                    <td><input name="mother_alive" type="radio" @if( $scholarshipExperience->mother_alive == "Yes")  checked=""  @endif value="Yes" checked=""> Yes &nbsp; &nbsp; &nbsp;
                                        <input name="mother_alive" type="radio" @if( $scholarshipExperience->mother_alive == "No")  checked=""  @endif value="No"> No &nbsp; &nbsp; &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>Is Mother Working? *</td>
                                    <td>
                                        <input name="mother_working" type="radio" @if( $scholarshipExperience->mother_working == "Yes")  checked=""  @endif  value="Yes"  checked=""> Yes &nbsp; &nbsp; &nbsp;
                                        <input name="mother_working" type="radio" @if( $scholarshipExperience->mother_working == "No")  checked=""  @endif  value="No"> No &nbsp; &nbsp; &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group text-right p-2">
                            <input type="submit" name="text"  class="btn btn-primary" >
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection
