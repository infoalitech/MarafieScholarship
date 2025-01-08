<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
    <div class="table-responsive">
        <table style="border-collapse: inherit;border: 1px solid; border-spacing: 1px; width:100%" id="tbl_exp">
            <tbody>
                <tr>
                    <td> Father/scholarshipApplicant->Guardian Name * </td>
                    <td> <input type="text" name="gname" value="{{ $scholarshipApplicant->guardian->gname}}" style="width:500px"> </td>
                </tr>
                <tr>
                    <td> CNIC </td>
                    <td> <input type="text" name="gcnic" value="{{ $scholarshipApplicant->guardian->gcnic}}" style="width:500px"> </td>
                </tr>
                <tr>
                    <td> Is Father Alive?*</td>
                    
                    <td>
                        {{$scholarshipApplicant->guardian->galive}}
                    </td>
                </tr>
                <tr>
                    <td> Occupation </td>
                    <td> <input type="text" name="gpassion" value="{{ $scholarshipApplicant->guardian->gpassion}}" style="width:500px"> </td>
                </tr>
                <tr>
                    <td> Professional Status </td>
                    <td> <input type="text" name="gstatus" value="{{ $scholarshipApplicant->guardian->gstatus}}" style="width:500px"> </td>
                </tr>
                <tr>
                    <td> Employer/Company </td>
                    <td> <input type="text" name="gcompany" value="{{ $scholarshipApplicant->guardian->gcompany}}" style="width:500px"> </td>
                </tr>
                <tr>
                    <td> Designation </td>
                    <td> <input type="text" name="gdesic" value="{{ $scholarshipApplicant->guardian->gdesic}}" style="width:500px"> </td>
                </tr>
                <tr>
                    <td> Cell No </td>
                    <td> <input type="text" name="gcell" value="{{ $scholarshipApplicant->guardian->gcell}}" style="width:500px"> </td>
                </tr>
                <tr>
                    <td> Phone No </td>
                    <td> <input type="text" name="gphone" value="{{ $scholarshipApplicant->guardian->gphone}}" style="width:500px"> </td>
                </tr>
                <tr>
                    <td> Monthly Income </td>
                    <td> <input type="text" name="gincome" value="{{ $scholarshipApplicant->guardian->gincome}}" style="width:500px"> </td>
                </tr>

                <tr>
                    <th> Income Certificate : </th>
                    <td>
                         <a href="{{ asset($scholarshipApplicant->guardian->income_certificate) }}" 
                            target="_blank"
                            
                          >
                            View
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Is Mother alive? *</td>
                    <td>
                        {{ $scholarshipApplicant->guardian->mother_alive }}
                    </td>
                </tr>
                <tr>
                    <td>Is Mother Working? *</td>
                    <td>
                        {{ $scholarshipApplicant->guardian->mother_working }}
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
</script> --}}
{{-- <style>
    input {
        border: 0px;
    }

    td {
        border: 1px solid black;
        margin: 0px;
    }
</style> --}}