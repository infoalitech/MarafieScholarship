<style>
@page {
   size: 8.27in 11.69in;
   margin: 0.29in 0.3in 0in 0.7in;
}

table{
    page-break-inside: avoid !important;
    margin: 4px 0 4px 0;
	border-collapse: collapse;
}

th, td{
	border:1px solid;
}

</style>

<title> MFP </title>
<?php

$conn=mysqli_connect('localhost','marafiepak_scholarship_laravel','marafiepak_scholarship_laravel','marafiepak_scholarship_laravel');

if(!$_POST)
{
	echo "<script>
// 		window.close();
	</script>";

}
$app_id = $ScholarshipAppMap->applicant_id;
$job_id = $ScholarshipAppMap->job_id;

$app = mysqli_query($conn, "SELECT a.*,d.name as dis_name, am.apply_date as apply_date, t.name as teh_name FROM `kiusc_job_applicants` a 
							join kiusc_districts d on a.district_id = d.id 
							join kiusc_job_app_map am on a.id = am.applicant_id 
							join kiusc_tehsils t on a.tehsil_id = t.id WHERE a.id = '$app_id'");
							
$app = mysqli_fetch_assoc($app);

$job = mysqli_query($conn, "SELECT * FROM `kiusc_jobs` WHERE id = '$job_id'");
$job = mysqli_fetch_assoc($job);

$user=Auth::user();

?>

<img src="{{asset('Logo/logo.png')}}"  height="120px"  style="float:left;">
<img src="{{asset($app['picture'])}}" height="150px"  style="float:right; margin-right:0%; max-width: 20%">
<div align="center" style="width:70%; margin-left:8%; font-size:20px">
<b>
MARAFIE PAKISTAN <br><br>
SCHOLARSHIP FORM
</b>
</div>

<table width="100%">
<tr>
	<td style="font-size:18px; border:0px solid">
		<b> Note: </b> Please forward the printed form along with all your verified academic transcripts and degrees to the Marafie Reional Office Skardu Baltistan.
	</td>
</tr>
</table>

<table width="100%" border="1px">
<tr>
	<td style="width:35%"><b> Scholarship Applied for </b> </td>
	<td colspan=3><?php echo $job['post'] ?></td>
	<td><b><?php echo $app['fresh_renewal'] ?></b></td>
</tr>
</table>
<?php
$currente = mysqli_query($conn, "SELECT * FROM `current_semesters` WHERE `applicant_id` = '$app_id'");
$curr = mysqli_fetch_assoc($currente); 

?>
<table width="100%">
<tr>
	<td colspan=6 style="border:0px solid;font-size:20px;font-weight:200">  Current Semester</td>
	
</tr>
<tr>
	<td colspan=3> <b> Name of College/University </b> </td>
	<td colspan=3><?php echo $curr['collegeuni'] ?></td>
	</tr>
	
</tr>
<tr>
    <td> <b> Degree Title/Program </b></td>
	<td><?php echo $curr['degree'] ?></td>
	<td> <b> Current Session </b> </td>
	<td><?php echo $curr['currents'] ?></td>
    <td> <b> Applied Date </b> </td>
	<td><?php echo $app['apply_date'] ?></td>
</tr>

</table>
<table width="100%">
<tr>
	<td colspan=4 style="border:0px solid;font-size:20px;font-weight:200"> Personal Records</td>
	
</tr>
<tr>
	<td> <b> Name </b> </td>
	<td><?php echo $app['name'] ?></td>
	
	<td> <b> Father Name </b></td>
	<td><?php echo $app['fname'] ?></td>
</tr>
<tr>
	<td> <b> DOB </b></td>
	<td><?php echo $app['dob'] ?></td>
	
	<td> <b> CNIC </b> </td>
	<td><?php echo $app['cnic'] ?></td>
</tr>
<tr>
	<td> <b> Cell No </b> </td>
	<td><?php echo $app['cell_no'] ?></td>
	
	<td> <b>Email </b></td>
	<td><?php echo $user['email'] ?></td>
</tr>

<tr>
	<td> <b>District </b></td>
	<td><?php echo $app['dis_name'] ?></td>
	
	<td> <b>Tehsil</b> </td>
	<td><?php echo $app['teh_name'] ?></td>
</tr>

<tr>
	<td> <b>Village </b></td>
	<td><?php echo $app['village'] ?></td>
	<td> <b>Postal Address</b> </td>
	<td><?php echo $app['postal_address'] ?></td>
</tr>
<tr>
 	<td> <b>working</b></td>
	<td><?php echo $app['working'] ?></td>
	<td> <b>Designation</b> </td>
	<td><?php echo $app['desig'] ?></td>
</tr>
<tr>
	<td> <b>Employer</b></td>
	<td><?php echo $app['employer'] ?></td>
	<td> <b>Monthly Income</b> </td>
	<td><?php echo $app['monthincome'] ?></td>
</tr>
<tr>
	<td> <b>Account Title</b></td>
	<td><?php echo $app['ac_title'] ?></td>
	<td> <b>Bank Branch</b> </td>
	<td><?php echo $app['bank_branch'] ?></td>
</tr>
<tr> 
	<td> <b>Account No</b></td>
	<td><?php echo $app['ac_no'] ?></td>
	<td> <b>Justification</b> </td>
	<td><?php echo $app['fass'] ?></td>
</tr>

</table>


<h3> Guardian Information </h3>
<table width="100%">
<?php
$experience = mysqli_query($conn, "SELECT * FROM `kiusc_job_experiences` WHERE `applicant_id` = '$app_id'");
$exp = mysqli_fetch_assoc($experience); 

?>
<tr>
	<td> <b> Father/Guardian Name </b> </td>
	<td><?php echo $exp['gname'] ?></td>
	
	<td> <b> CNIC </b></td>
	<td><?php echo $exp['gcnic'] ?></td>
</tr>

<tr>
	<td> <b> Is Father Alive </b> </td>
	<td><?php echo $exp['galive'] ?></td>
	
	<td> <b> Occupation </b></td>
	<td><?php echo $exp['gpassion'] ?></td>
</tr>
<tr>
	<td> <b> Professional Status </b> </td>
	<td><?php echo $exp['gstatus'] ?></td>
	
	<td> <b> Employer/Company </b></td>
	<td><?php echo $exp['gcompany'] ?></td>
</tr>
<tr>
	<td> <b> Designation </b> </td>
	<td><?php echo $exp['gdesic'] ?></td>
	
	<td> <b> Cell No </b></td>
	<td><?php echo $exp['gcell'] ?></td>
</tr>
<tr>
	<td> <b> Phone No </b> </td>
	<td><?php echo $exp['gphone'] ?></td>
	
	<td> <b> Monthly Income </b></td>
	<td><?php echo $exp['gincome'] ?></td>
</tr>
<tr>
	<td> <b> Is Mother alive? </b> </td>
	<td><?php echo $exp['mother_alive'] ?></td>
	
	<td> <b> Is Mother Working? </b></td>
	<td><?php echo $exp['mother_working'] ?></td>
</tr>


</table>

<table width="100%">
<tr>
	<td colspan=7 style="border:0px solid;font-size:20px;font-weight:600"> Academic Records </td>
</tr>
<tr>
	<th> Degree </th>
	<th> Institute </th>
	<th> Year </th>
	<th> Obt Marks </th>
	<th> Total Marks </th>
	<th> Percentage </th>
	<th> Division </th>
</tr>
<?php
$qualification = mysqli_query($conn, "SELECT q.*, d.degree_title FROM `kiusc_job_qualifications` q join kiusc_degrees d on q.degree_id = d.id WHERE `applicant_id` = '$app_id'");
while($qual = mysqli_fetch_assoc($qualification))
{
?>
<tr>
	<td><?php echo $qual['degree_title'] ?></td>
	<td><?php echo $qual['institute'] ?></td>
	<td><?php echo $qual['year'] ?></td>
	<td><?php echo ($qual['obt_marks'] != 0) ? $qual['obt_marks'] : $qual['obt_gpa'];  ?></td>
	<td><?php echo ($qual['obt_marks'] != 0) ? $qual['total_marks'] : $qual['total_gpa']; ?></td>
	<td><?php echo $qual['percentage'] ?></td>
	<td><?php echo $qual['division'] ?></td>
</tr>
<?php } ?>



<tr>
	<td colspan=3 style="border:0px solid;font-size:20px;font-weight:600"> Declaration </td>
</tr>
</table>
<fieldset><legend><b><u><i> Under Taking</b></u></i> </legend>
<p> I confirm that information provided in this booklet is true in my knowledge and any false information
provided can result in cancellation of my scholarship and I would be legally responsible to refund all
payment received and or penalty equivalent to total scholarship amount.</br>
I________________________________________________S/O_________________________________________________
R/O__________________________________ Village _________________________District______________________
Student of __________________________year in ______________solemnly affirm and state that the
amount I will receive as scholarship form Marafie Foundation Pakistan I will be bound to refund the
same amount to Marafie Foundation Pakistan in easy installments in five years after completion of my
studies. </br></br>

 <u> <b> <right> Applicants Signature</b><right></u>
 ______________________________________________________________________________________________________
</fieldset>
<fieldset> <legend> For Office Use Only </legend>

<b><u><i>Comment from Regional Office:</b></u></i></br></br>
______________________________________________________________________________________________________</br></br>
______________________________________________________________________________________________________</br></br>
______________________________________________________________________________________________________</br></br>

</fieldset>

<fieldset> <legend>  </legend>

<b><u><i>Recommendation from Selection Committee:</b></u></i></br></br>
______________________________________________________________________________________________________</br></br>
______________________________________________________________________________________________________</br></br>
______________________________________________________________________________________________________</br></br>

</fieldset>
</br>
<b><u><i>Signature of Compitent Authority____________________________</b></u></i></br></br></br></br></br></br>

<fieldset> <legend><i><b>Points to Ponder</b></i>  </legend>
<table width="80%">
<fieldset> <legend><i><b>Application form check list</b></i>  </legend>
  <table width="100%" border="1">
  <tr>
    <td><b>S.No</b></td>
    <td align="center"><b>Descrioption</b></td>
    <td colspan="2"><b>Tick <i class="fa fa-square-o" aria-hidden="true"></i> </b></td>
  </tr>
  <tr>
    <td>1</td>
    <td>System genrated application form </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Copies of Academic Documents(Marks sheet etc.)</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>3</td>
    <td>Copies of computrized NIC of Applicant /Father /Guardian</td>    
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>4</td>
    <td>Copy of Domicile Certificate</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>5</td>
    <td>Bonafied Certificate from the Institution (Original)</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>6</td>
    <td>Income Certificate /Salary Certificate of Guardian /Pay Slip of Govt. Servants or Pifra's system genrated pay slip</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>7</td>
    <td>Copies of last & latest fee receipts</td>
    <td>&nbsp;</td>
  </tr>
</table>
</fieldset>
<fieldset><legend><b><i>DO's:</i></b></legend>
<p><ul>
<li>Read the application form carefully.</li>
<li>Send your application by post or submit by hand to the regional Office Skardu.</li>
<li>Do consult with parent(s)/guardain(s) for dinancial data accuracy & reliability</li>
<li>Furnish factual, comprehensive and authentic information in the form.</li>
<li>For family financial reporting parents/ guardian may be consulted for guidance</li>
</ul></p>
</fieldset>
<fieldset><legend><b><i>DO NOT:</i></b></legend>
<ul>
<li>Provide False/vague/incomplete information.</li>
<li>Overview/ scratch on the form.</li></ul>

</fieldset>
			
</table>
</fieldset>