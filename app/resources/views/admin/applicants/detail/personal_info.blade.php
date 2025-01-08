<div class="table-responsive">
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>Image :</th>
          <th>Domicile :</th>
          <th>CNIC/B-Form :</th>
        </tr>
        <tr>
          <th>
              <a href="{{ asset($scholarshipApplicant->picture) }}" 
                target="_blank"
              >
                    View
              </a>
          </th>
          <td>
            <a href="{{ asset($scholarshipApplicant->domicile) }}" 
                target="_blank"
                
              >
                View
            </a>
          </td>
          <td>

            <a href="{{ asset($scholarshipApplicant->cnic_pic) }}" 
                target="_blank"
                
              >
               View
            </a>
          </td>
        </tr>
  
        <tr>
          <td>scholarshipApplicant's Name :</td>
          <td colspan="2">{{ $scholarshipApplicant->name}}</td>
        </tr>
  
        <tr>
          <td>Father's Name :</td>
          <td colspan="2">{{ $scholarshipApplicant->fname }}</td>
        </tr>
  
        <tr>
          <td>Gender *</td>
          <td colspan="2">{{ $scholarshipApplicant->gender }}</td>
        </tr>
  
        <tr>
          <td>DOB :</td>
          <td colspan="2">{{ $scholarshipApplicant->dob }}</td>
        </tr>
  
        <tr>
          <td>CNIC :</td>
          <td colspan="2">{{ $scholarshipApplicant->cnic }}</td>
        </tr>
  
        <tr>
          <td>Postal Address :</td>
          <td colspan="2">{{ $scholarshipApplicant->postal_address }}</td>
        </tr>
  
        <tr>
          <td>District:</td>
          <td colspan="2">{{ $scholarshipApplicant->district->name ?? "" }}</td>
        </tr>
  
        <tr>
          <td>Tehsil :</td>
          <td colspan="2">{{ $scholarshipApplicant->tehsil->name ?? "" }}</td>
        </tr>
  
        <tr>
          <td>Village:</td>
          <td colspan="2">{{ $scholarshipApplicant->village }}</td>
        </tr>
  
        <tr>
          <td>Cell #:</td>
          <td colspan="2">{{ $scholarshipApplicant->cell_no }}</td>
        </tr>
  
        {{--
        <tr>
          <td>Are your currently working *</td>
          <td>{{$scholarshipApplicant->working}}</td>
        </tr>
        <tr>
          <td>Designation</td>
          <td>
            <input
              type="desig"
              name="desig"
              value="{{ $scholarshipApplicant->desig }}"
            />
          </td>
        </tr>
        <tr>
          <td>Employer:</td>
          <td>{{ $scholarshipApplicant->employer }}</td>
        </tr>
  
        <tr>
          <td>Monthly Income</td>
          <td>{{ $scholarshipApplicant->monthincome }}</td>
        </tr>
  
        --}}
        <tr>
          <th colspan="3">Account Details</th>
        </tr>
        <tr>
          <td>Account Title</td>
          <td colspan="2">{{ $scholarshipApplicant->ac_title }}</td>
        </tr>
  
        <tr>
          <td>Bank Branch</td>
          <td colspan="2">{{ $scholarshipApplicant->bank_branch }}</td>
        </tr>
  
        <tr>
          <td>Account No</td>
          <td colspan="2">{{ $scholarshipApplicant->ac_no }}</td>
        </tr>
  
        <tr>
          <td>Justification for seeking financial assistance</td>
          <td colspan="2">{{$scholarshipApplicant->fass}}</td>
        </tr>
      </tbody>
    </table>
  </div>
  