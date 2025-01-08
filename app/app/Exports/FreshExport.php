<?php

namespace App\Exports;

use App\Models\KiuscJobApplicant;
use App\Models\Degree;
use App\Models\ScholarshipQualification;
use App\Models\CurrentSemester;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class FreshExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $asd = KiuscJobApplicant::where('fresh_renewal','Fresh')->get();
        $sn = 1;
        foreach($asd as $as){
            $degree=ScholarshipQualification::where('applicant_id',$as->id)->get();
            $degree=ScholarshipQualification::where('applicant_id',$as->id)->where('degree_id',$degree->max('degree_id'))->first();
            $acad=CurrentSemester::where('applicant_id',$as->id)->first();

            if($degree == null){
                $degree= new Degree;
            }

            $data[]=array(
                "SNo."=> $sn,
                "Name"=> $as->name,
                "Father Name"=> $as->fname,
                "CNIC"=> $as->cnic,
                "Village"=> $as->village,
                "Address"=> $as->postal_address,
                "Univrsity Name"=> $acad->collegeuni ?? "",
                "Decipline"=> $acad->degree ?? "",
                "Year"=>  $acad->currents ?? "",
                "Cell No"=> $as->cell_no,
                "Father Gurdian Income "=> $as->monthincome,
                "Email"=> $as->user->email,
                "Need Reason"=> $as->fass,
                "Total"=> $degree->total_marks,
                "Obt"=> $degree->obt_marks,
                "Total gpa"=> $degree->total_gpa,
                "obt_gpa"=> $degree->obt_gpa,
                "%age=> "=> $degree->percentage,
                "bank "=>$as->bank_branch,
                "account title"=>$as->ac_title,
                "account no"=>$as->ac_no,
                "Status"=>$as->fresh_renewal

            );
            $sn=$sn+1;

        }

        // return $data;
        return collect($data);


    }
    public function headings(): array
    {
        return
            ["SNo.","Name","Father Name","CNIC","Village","Address","Univrsity Name","Decipline","Year","Cell No","Father Gurdian Income ","Email","Need Reason","Total","Obt","Total gpa","obt_gpa","%age","Bank","Account title","Account No","Status"];

    }
}
