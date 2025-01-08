@extends('bootlayout.app')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="">
                {{ __('Personal Info') }}
            </h2>
            <a class="btn btn-success px-5" href="{{ url('personal_info/1/edit') }}">Edit</a>
        </div>
    </div>
  </section><!-- End Hero -->
    <div class="py-12">
        <div class="container p-3">
            <div class="container">            
               <div class="table-responsive">
                    {{-- {{ dd($applicant); }} --}}
                    <table class="table table-striped">

                        <tbody>
                        <tr>
                            <th> Image : </th>
                            <th>
                                Domicile : 
                            </th>
                            <th>
                                CNIC/B-Form :  
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <img src="{{ $applicant->picture }}"  width="200px" id="img">
                                </th>
                            <td>
                            <img src="{{ $applicant->domicile }}"  width="200px" id="img">
                            </td>
                            <td>
                                <img src="{{ $applicant->cnic_pic }}"  width="200px" id="img">
                            </td>
                        </tr>

                        <tr>
                            <td> Applicant's Name : </td>
                            <td colspan="2">{{ $applicant->name}}
                        </tr>

                        <tr>
                            <td> Father's Name : </td>
                            <td colspan="2">{{ $applicant->fname }}
                        </tr>

                        <tr>
                        <td>Gender *</td>
                            <td colspan="2">
                            {{ $applicant->gender }}
                        </td></tr>

                        <tr>
                            <td> DOB : </td>
                            <td colspan="2">
                                {{ $applicant->dob }}
                            </td>
                        </tr>

                        <tr>
                            <td> CNIC : </td>
                            <td colspan="2">{{ $applicant->cnic }}
                        </tr>

                        <tr>
                            <td> Postal Address : </td>
                            <td colspan="2">{{ $applicant->postal_address }}
                        </tr>

                        <tr>
                            <td> District: </td>
                            <td colspan="2">  {{ $applicant->district->name ?? "" }}</td>
                        </tr>

                        <tr>
                            <td> Tehsil : </td>
                            <td colspan="2">  {{ $applicant->tehsil->name ?? "" }}</td>
                        </tr>

                        <tr>
                            <td>  Village: </td>
                            <td colspan="2">{{ $applicant->village }}
                        </tr>

                        <tr>
                            <td>  Cell #: </td>
                            <td colspan="2">{{ $applicant->cell_no }}
                        </tr>
                        {{-- <tr>
                        <td>Are your currently working *</td>
                        <td>
                            {{$applicant->working}}
                        </td></tr>
                        <tr>
                        <td>Designation</td>
                        <td> <input  type="desig" name="desig" value="{{ $applicant->desig }}" > </td></tr>
                        <tr>
                            <td> Employer: </td>
                            <td>{{ $applicant->employer }}
                        </tr>
                        <tr>
                            <td> Monthly Income  </td>
                            <td>{{ $applicant->monthincome }}
                        </tr> --}}
                        <tr>
                            <th colspan="3"> Account Details  </th>
                        </tr>
                        <tr>
                            <td> Account Title  </td>
                            <td colspan="2">{{ $applicant->ac_title }}
                        </tr>
                        <tr>
                            <td> Bank Branch  </td>
                            <td colspan="2">{{ $applicant->bank_branch }}
                        </tr>
                        <tr>
                            <td> Account No  </td>
                            <td colspan="2">{{ $applicant->ac_no }}
                        </tr>
                            <tr>
                                <td>Justification for seeking financial assistance</td>
                                <td colspan="2"> {{$applicant->fass}}
                                </td>
                            </tr>

                        </tbody>
                    </table>
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
        input, select{
            border: 0px;
            background: transparent;
        }
        td{
            margin: 0px;
        }

    </style>


@endsection
