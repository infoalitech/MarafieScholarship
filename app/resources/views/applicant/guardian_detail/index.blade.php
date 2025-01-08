@extends('bootlayout.app')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Guardian Detail') }}
            </h2>
            @if(Auth::user()->applicant)            
                <a href="{{ route('guardian_detail.create')}}" class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" >Edit</a>
            @endif
        </div>
    </div>
  </section><!-- End Hero -->

    <div class="py-12">
        <div class="container p-3">
            <div class="container">   
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                @if(Auth::user()->applicant)            
                    <div class="table-responsive">
                        <table style="border-collapse: inherit;border: 1px solid; border-spacing: 1px; width:100%" id="tbl_exp">
                            <tbody>
                                <tr>
                                    <td> Father/Guardian Name * </td>
                                    <td> <input type="text" name="gname" value="{{ $scholarshipExperience->gname}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> CNIC </td>
                                    <td> <input type="text" name="gcnic" value="{{ $scholarshipExperience->gcnic}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Is Father Alive?*</td>
                                    <td><input name="galive" type="radio" @if( $scholarshipExperience->galive == "Yes" ) checked @endif value="Yes" > Yes &nbsp; &nbsp; &nbsp;
                                        <input name="galive" type="radio" @if( $scholarshipExperience->galive == "No" ) checked @endif value="No"> No &nbsp; &nbsp; &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td> Occupation </td>
                                    <td> <input type="text" name="gpassion" value="{{ $scholarshipExperience->gpassion}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Professional Status </td>
                                    <td> <input type="text" name="gstatus" value="{{ $scholarshipExperience->gstatus}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Employer/Company </td>
                                    <td> <input type="text" name="gcompany" value="{{ $scholarshipExperience->gcompany}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Designation </td>
                                    <td> <input type="text" name="gdesic" value="{{ $scholarshipExperience->gdesic}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Cell No </td>
                                    <td> <input type="text" name="gcell" value="{{ $scholarshipExperience->gcell}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Phone No </td>
                                    <td> <input type="text" name="gphone" value="{{ $scholarshipExperience->gphone}}" style="width:500px"> </td>
                                </tr>
                                <tr>
                                    <td> Monthly Income </td>
                                    <td> <input type="text" name="gincome" value="{{ $scholarshipExperience->gincome}}" style="width:500px"> </td>
                                </tr>
                                
                                <tr>
                                    <th> Income Certificate : </th>
                                    <td>
                                        <img src="{{ asset($scholarshipExperience->income_certificate) }}"  width="200px" id="img">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Is Mother alive? *</td>
                                    <td><input name="mother_alive" type="radio" @if( $scholarshipExperience->mother_alive == "Yes")  checked=""  @endif value="Yes"> Yes &nbsp; &nbsp; &nbsp;
                                        <input name="mother_alive" type="radio" @if( $scholarshipExperience->mother_alive == "No")  checked=""  @endif value="No"> No &nbsp; &nbsp; &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>Is Mother Working? *</td>
                                    <td>
                                        <input name="mother_working" type="radio" @if( $scholarshipExperience->mother_working == "Yes")  checked=""  @endif  value="Yes"> Yes &nbsp; &nbsp; &nbsp;
                                        <input name="mother_working" type="radio" @if( $scholarshipExperience->mother_working == "No")  checked=""  @endif  value="No"> No &nbsp; &nbsp; &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <h3>Please Add Your Profile Detail First</h3>
                @endif 
            </div>
        </div>
    </div>
    </div>
    <script>
        $("input").attr('readonly', 'true');
        $("input").attr('readonly', 'true');
        $("input").prop("disabled", true);
        $("input[text]").css("border-size", "0px !important");
    </script>
    <style>
        input{
            border: 0px;
        }
        td{
            border: 1px solid black;
            margin: 0px;
        }

    </style>


@endsection