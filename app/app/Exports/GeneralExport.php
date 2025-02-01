<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Scholarship;
use App\Models\ScholarshipQualification;
use App\Models\CurrentSemester;

class GeneralExport implements FromCollection, WithHeadings
{
    protected $id;
    protected $query;

    public function __construct($id, $query = null)
    {
        $this->id = $id;
        $this->query = $query;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $scholarship = Scholarship::find($this->id);
        $applicants = $scholarship->applicants($this->query)->get(); // Removed 'fresh_renewal' condition

        // dd($this->query);
        $data = [];
        $sn = 1;

        foreach ($applicants as $applicant) {
            $degree = ScholarshipQualification::where('applicant_id', $applicant->id)
                                              ->orderBy('degree_id', 'desc')
                                              ->first();

            $acad = CurrentSemester::where('applicant_id', $applicant->id)->first();

            $data[] = [
                "SNo." => $sn,
                "Name" => $applicant->name,
                "Father Name" => $applicant->fname,
                "CNIC" => $applicant->cnic,
                "Village" => $applicant->village,
                "Address" => $applicant->postal_address,
                "University Name" => $acad->collegeuni ?? "",
                "Discipline" => $acad->degree ?? "",
                "Year" => $acad->currents ?? "",
                "Cell No" => $applicant->cell_no,
                "Father Guardian Income" => $applicant->monthincome,
                "Email" => $applicant->user->email,
                "Need Reason" => $applicant->fass,
                "Total Marks" => $degree->total_marks ?? "",
                "Obtained Marks" => $degree->obt_marks ?? "",
                "Total GPA" => $degree->total_gpa ?? "",
                "Obtained GPA" => $degree->obt_gpa ?? "",
                "%age" => $degree->percentage ?? "",
                "Bank" => $applicant->bank_branch,
                "Account Title" => $applicant->ac_title,
                "Account No" => $applicant->ac_no,
                "Scholarship Status" => $applicant->pivot->status ?? "",
                "Remarks" => $applicant->pivot->remarks ?? "",
                "Status" => $applicant->fresh_renewal
            ];

            $sn++;
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            "SNo.",
            "Name",
            "Father Name",
            "CNIC",
            "Village",
            "Address",
            "University Name",
            "Discipline",
            "Year",
            "Cell No",
            "Father Guardian Income",
            "Email",
            "Need Reason",
            "Total Marks",
            "Obtained Marks",
            "Total GPA",
            "Obtained GPA",
            "%age",
            "Bank",
            "Account Title",
            "Account No",
            "Scholarship Status",
            "Remarks",
            "Status"
        ];
    }
}
