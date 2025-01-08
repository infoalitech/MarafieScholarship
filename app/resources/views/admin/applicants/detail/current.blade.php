<div class="bg-white shadow-sm sm:rounded-lg p-4">
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
                <tr>

                    <td> Field Of Study: </td>
                    <td>
                        {{$scholarshipApplicant->currentSemester->FieldStudy->name ?? ""}}
                    </td>
                </tr>
                <tr>
                    <td> Degree Program: </td>
                    <td>
                        {{$scholarshipApplicant->currentSemester->FieldDegree->name ?? ""}}
                    </td>
                </tr>
                <tr>
                    <td> Name of College/University * : </td>
                    <td>
                        {{$scholarshipApplicant->currentSemester->collegeuni}}
                    </td>
                </tr>
                <tr>
                    <td> Current Semester *: </td>
                    <td>
                        {{$scholarshipApplicant->currentSemester->currents}}
                    </td>
                </tr>
                <tr>
                    <td> Please select fresh or renewal </td>
                    <td>

                        <input name="fresh_renewal" @if($scholarshipApplicant->fresh_renewal == "Fresh" ) checked="" @endif type="radio" value="Fresh" checked=""> Fresh &nbsp; &nbsp; &nbsp;
                        <input name="fresh_renewal" @if($scholarshipApplicant->fresh_renewal == "Renewal" ) checked="" @endif type="radio" value="Renewal"> Renewal &nbsp; &nbsp; &nbsp;

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
                        <a href="{{ asset($scholarshipApplicant->currentSemester->last_fee) }}" target="_blank">
                            View
                        </a>


                    </th>
                    <td>
                        <a href="{{ asset($scholarshipApplicant->currentSemester->bonafide) }}" target="_blank">
                            View
                        </a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- <script>
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
</style> --}}