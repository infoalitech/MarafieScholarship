@extends('bootlayout.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Current Academic Detail') }}
            </h2>
            @if(Auth::user()->applicant)            
                <a href="{{ route('current.create')}}" class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Edit</a>
            @endif
        </div>
    </div>
</section><!-- End Hero -->

<div class="py-12">
    <div class="container p-3">
        <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-4">
                    @if(Auth::user()->applicant)            
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        
                                        <td> Field Of Study: </td>
                                        <td> 
                                            {{$currentSemester->FieldStudy->name ?? ""}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Degree Program: </td>
                                        <td> 
                                            {{$currentSemester->FieldDegree->name ?? ""}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Name of College/University * : </td>
                                        <td>
                                            {{$currentSemester->collegeuni}}
                                        </td>
                                    </tr>
                                    <!--<tr>-->
                                    <!--    <td> Degree Title/Program *: </td>-->
                                    <!--    <td> -->
                                    <!--        {{$currentSemester->degree}}-->
                                    <!--    </td>-->
                                    <!--</tr>-->
                                    <tr>
                                        <td> Current Semester *: </td>
                                        <td>
                                            {{$currentSemester->currents}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Please select fresh or renewal </td>
                                        <td>

                                            <input name="fresh_renewal" @if(Auth::user()->applicant->fresh_renewal == "Fresh" ) checked="" @endif type="radio" value="Fresh" checked=""> Fresh &nbsp; &nbsp; &nbsp;
                                            <input name="fresh_renewal" @if(Auth::user()->applicant->fresh_renewal == "Renewal" ) checked="" @endif type="radio" value="Renewal"> Renewal &nbsp; &nbsp; &nbsp;

                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Last Fee :
                                            
                                           
                                        </th>
                                        <th>
                                            Bonafide : 
                                        </th>
                                    </tr>
                                    <tr>
                                        <th> 
                                            <img src="{{ $currentSemester->last_fee }}"  width="200px" id="img">


                                        </th>
                                        <td>
                                            <img src="{{ $currentSemester->bonafide }}"  width="200px" id="img">

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
</div>
    <script>
        $("input").attr('readonly', 'true');
        $("input").attr('readonly', 'true');
        $("input").prop("disabled", true);
        $("input[text]").css("border-size", "0px !important");

    </script>
    <style>
        input {
            border: 0px;
        }

        td {
            border: 1px solid black;
            margin: 0px;
        }

    </style>

@endsection
