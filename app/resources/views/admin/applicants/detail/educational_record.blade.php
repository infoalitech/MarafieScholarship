<div class="overflowx-scroll">
    <div class="table-responsive">
      <table class="table" id="tbl_exp">
        <thead>
          <tr>
            <th>Degree</th>
            <th>Institution</th>
            <th>Year</th>
            <th>Type</th>
            <th>Obt Marks</th>
            <th>Total Marks</th>
            <th>GPA</th>
            <th>Total GPA</th>
            <th>Division</th>
            <th>Percentage</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($scholarshipApplicant->qualifications as
          $scholarshipApplicant->scholarshipQualification)
          <tr>
            <td>
              {{$scholarshipApplicant->scholarshipQualification->degree->degree_title}}
            </td>
            <td>
              {{$scholarshipApplicant->scholarshipQualification->institute}}
            </td>
            <td>{{$scholarshipApplicant->scholarshipQualification->year}}</td>
            <td>
              @if($scholarshipApplicant->scholarshipQualification->total_marks ==
              0) GPA @else Marks @endif
            </td>
            <td>
              {{$scholarshipApplicant->scholarshipQualification->obt_marks}}
            </td>
            <td>
              {{$scholarshipApplicant->scholarshipQualification->total_marks}}
            </td>
            <td>{{$scholarshipApplicant->scholarshipQualification->obt_gpa}}</td>
            <td>
              {{$scholarshipApplicant->scholarshipQualification->total_gpa}}
            </td>
            <td>{{$scholarshipApplicant->scholarshipQualification->division}}</td>
            <td>
              {{$scholarshipApplicant->scholarshipQualification->percentage}}
            </td>
            <td>
              <a href="{{ asset($scholarshipApplicant->scholarshipQualification->marksheet) }}" target="_blank">
               View
              </a>
            </td>
            <td>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
  <style>
    table {
      border: 1px solid #ccc;
      border-collapse: collapse;
      margin: 0;
      padding: 0;
      width: 100%;
      table-layout: fixed;
    }
  
    table caption {
      font-size: 1.5em;
      margin: 0.5em 0 0.75em;
    }
  
    table tr {
      background-color: #f8f8f8;
      border: 1px solid #ddd;
      padding: 0.35em;
    }
  
    table th,
    table td {
      padding: 0.625em;
      text-align: center;
    }
  
    table th {
      font-size: 0.85em;
      letter-spacing: 0.1em;
      text-transform: uppercase;
    }
  
    .table-responsive {
      min-width: 992px;
    }
  
    .table-responsive {
      width: 100%;
      overflow-x: scroll;
    }
    .overflowx-scroll {
      width: 100%;
      overflow-x: scroll;
    }
  </style>
  