@extends('bootlayout.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Educational Record') }}
        </h2>
        </div>
    </div>
</section><!-- End Hero -->

<div class="py-12">
    <div class="container p-3">
        <div class="container">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <form action="{{ route('educational_record.update',$scholarshipQualification->id) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('put')
					<div class="row">
						<div class="form-group col-md-6">
							<label>Degree</label>
							<select name="degree_id" class="form-control">
								<option @if( $scholarshipQualification->degree_id == 378 ) selected="" @endif value="378"> SSC </option>
								<option @if( $scholarshipQualification->degree_id == 379 ) selected="" @endif value="379"> FA/FSc </option>
								<option @if( $scholarshipQualification->degree_id == 380 ) selected="" @endif value="380"> BA/BSc </option>
								<option @if( $scholarshipQualification->degree_id == 381 ) selected="" @endif value="381"> MA/MSc/BS </option>
								<option @if( $scholarshipQualification->degree_id == 382 ) selected="" @endif value="382"> MS/Mphil </option>
								<option @if( $scholarshipQualification->degree_id == 383 ) selected="" @endif value="383"> PhD </option>
								<option @if( $scholarshipQualification->degree_id == 384 ) selected="" @endif value="384"> Others </option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Institution</label>
							<input type="text"  value="{{ $scholarshipQualification->institute }}"  class="form-control" name="institute"> 
						</div>
						<div class="form-group col-md-6">
							<label>Year</label>
							<input type="text"  value="{{ $scholarshipQualification->year }}"  class="form-control"  name="year"> 
						</div>
						<div class="form-group col-md-6">
							<label>Type</label>
							<div>
								Marks : 
								<input type="radio" name="1"  value="marks" class="typecheckbox"  id="type_marks" onclick="clickedmarks()" @if($scholarshipQualification->total_marks > 0) checked="" @endif checked="">
								GPA:
								<input type="radio" name="1"  value="gps" class="typecheckbox"  id="type_gpa" onclick="clickedgpa()" @if($scholarshipQualification->total_gpa >  0) checked="" @endif>
							</div>
						</div>
						<div class="form-group marks_div col-md-6">
							<label> Obt Marks </label>
							<input type="text" name="obtained_marks"  value="{{ $scholarshipQualification->obt_marks }}"  class="form-control" id="obtained_marks" onkeyup="perDivM(this)"> 
						</div>
						<div class="form-group marks_div col-md-6">
							<label>  Total Marks </label>
							<input type="text" name="total_marks"  value="{{ $scholarshipQualification->total_marks }}" class="form-control" id="total_marks" onkeyup="perDivM(this)">
						</div>
						<div class="form-group gpa_div col-md-6">
							<label> CGPA</label>
							<input type="text" name="gpa"  value="{{ $scholarshipQualification->obt_gpa }}"   class="form-control" id="gpa" onkeyup="perDivGPA(this)" readonly="">
						</div>
						<div class="form-group gpa_div col-md-6">
							<label> Total CGPA</label>
							<input type="text" name="total_gpa" value="{{ $scholarshipQualification->total_gpa }}"  class="form-control" id="total_gpa" onkeyup="perDivGPA(this)" readonly=""> 
						</div>
						<div class="form-group division col-md-6">
							<label> Division</label>
							<input type="text" name="division"  value="{{ $scholarshipQualification->division }}"  id="division" class="form-control" readonly="">
						</div>
						<div class="form-group percenteage col-md-6">
							<label> Percentage</label>
							<input type="text" required name="percentage"  value="{{ $scholarshipQualification->percentage }}"  id="percentage" class="form-control" readonly="">
						</div>
						<div class="form-group py-2 col-md-6">
							<label > Marksheet : </label>
							<input class="form-control" type="file" name="marksheet" onchange="readURL(this)">
						</div>


					</div>

					<script>
						$(document).ready(function(){
							var selected=$(".typecheckbox:checked").val();
							console.log(selected);
							if(selected == 'gps'){
								$(".marks_div").hide();		
								$(".marks_div").find('input').val("");
								$(".percenteage").find('input').removeAttr("readonly");
								$(".gpa_div").find('input').removeAttr("readonly");
							}else{
								$(".gpa_div").hide();										
								$(".gpa_div").find('input').val("");
								$(".marks_div").find('input').removeAttr("readonly");
								$(".gpa_div").find('input').attr("readonly",'true');
							}

						});
						function clickedmarks(){
							$(".marks_div").show();										
							$(".marks_div").find('input').val("");						
							$(".marks_div").find('input').removeAttr("readonly");
							$(".gpa_div").hide();										
							$(".gpa_div").find('input').val("");
							$(".gpa_div").find('input').attr("readonly",'true');
							$(".percenteage").find('input').attr("readonly",'true');
							$(".percenteage").find('input').attr("placeholder","");
							
							$(".division").find('input').val("");
							$(".percenteage").find('input').val("");
						}
						function clickedgpa(){
							$(".marks_div").hide();										
							$(".marks_div").find('input').val("");
							$(".marks_div").find('input').attr("readonly",'true');
							$(".gpa_div").show();										
							$(".gpa_div").find('input').removeAttr("readonly");
							$(".gpa_div").find('input').val("");
							$(".division").find('input').val("");
							$(".percenteage").find('input').val("");
							$(".percenteage").find('input').attr("placeholder","Please enter it Manually");
							$(".percenteage").find('input').removeAttr("readonly");
						}
					</script>
                    <div class="p-2">
                        <input type="submit" name="text" class=" btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script>


    function deleteRow(o, tbl)
{
	var i = o.closest('tr').rowIndex;
	//alert(o.rowIndex);
	document.getElementById(tbl).deleteRow(i);
}

function calYears(o)
{
	//alert('sdfasdfs');
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	
	//alert(from);
	var from2 = new Date(from);
	 var to2 = new Date(to);

	var m =  Math.abs(from2-to2)
	m = m/(1000 * 60 * 60 * 24 * 30);
	
	document.getElementById("months").value = m.toFixed(0);
}

function perDivM(o)
{
	////  Percentage ///////
	var obt = document.getElementById("obtained_marks").value;
	var total = document.getElementById("total_marks").value;
	
	if(isNaN(obt))
	{
		document.getElementById("obtained_marks").value = 0;
		obt = 0;
	}
	if(isNaN(total))
	{
		document.getElementById("total_marks").value = 0;
		total = 0;
	}
	
	var per = obt/total * 100;
	if(per == 'Infinity' || isNaN(per) || per > 100)
		per = 0;
	document.getElementById("percentage").value = per.toFixed(2);
	
	
	//////// Division ///////
	
	var div = "3rd"
	if(per >= 60)
		div = "1st";
	else if (per >= 45)
		div = "2nd";
	
	document.getElementById("division").value = div;
}

function perDivGPA(o)
{
	var gpa = document.getElementById("gpa").value;
	var t_gpa = document.getElementById("total_gpa").value;
	
	if(isNaN(gpa))
	{
		document.getElementById("gpa").value = 0;
		gpa = 0;
	}
	if(isNaN(t_gpa))
	{
		document.getElementById("total_gpa").value = 0;
		t_gpa = 0;
	}
	
	
	var per = gpa/t_gpa * 100;
	if(per == 'Infinity' || isNaN(per) || per > 100)
		per = 0;
	// 	document.getElementById("percentage").value = per.toFixed(2);
	
	
	//////// Division ///////
	
	var div = "3rd"
	if(per >= 60)
		div = "1st";
	else if (per >= 45)
		div = "2nd";
	
	document.getElementById("division").value = div;
}
    </script>


@endsection
