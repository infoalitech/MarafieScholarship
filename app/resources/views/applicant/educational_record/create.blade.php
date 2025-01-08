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
                <form action="{{ route('educational_record.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
					<div class="row">
						<div class="form-group col-md-6">
							<label>Degree</label>
							<select name="degree_id" class="form-control">
								<!--<option value=""> Select Degree </option>-->
								<option value="378" selected=""> SSC </option>
								<option value="379"> FA/FSc </option>
								<option value="380"> BA/BSc </option>
								<option value="381"> MA/MSc/BS </option>
								<option value="382"> MS/Mphil </option>
								<option value="383"> PhD </option>
								<option value="384"> Others </option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Institution</label>
							<input type="text" class="form-control" name="institute" pattern="^[a-zA-Z\s]+$" title="Institution name should only contain letters and spaces"  required=""> 
						</div>
						<div class="form-group col-md-6">
							<label>Year</label>
						    <input type="text" class="form-control" name="year" pattern="^\d{4}$" title="Please enter a valid four-digit year" required="">
						</div>
						<div class="form-group col-md-6">
							<label>Type</label>
							<div>
								Marks : <input type="radio" name="1" id="type_marks" onclick="clickedmarks()" checked="">
								GPA:<input type="radio" name="1" id="type_gpa" onclick="clickedgpa()">
							</div>
						</div>
<div class="form-group marks_div col-md-6">
    <label>Obtain Marks <small>(e.g., 85 or 85.75)</small></label>
    <input type="text" name="obtained_marks" class="form-control" id="obtained_marks" 
    onkeyup="perDivM(this)" 
    pattern="^\d+(\.\d{1,2})?$" 
    title="Please enter valid marks (e.g., 85 or 85.75)"  
    placeholder="e.g., 85 or 85.75" 
    required> 
</div>

<div class="form-group marks_div col-md-6">
    <label>Total Marks <small>(e.g., 100 or 100.00)</small></label>
    <input type="text" name="total_marks" class="form-control" id="total_marks" 
    onkeyup="perDivM(this)" 
    pattern="^\d+(\.\d{1,2})?$" 
    title="Please enter valid marks (e.g., 100 or 100.00)"  
    placeholder="e.g., 100 or 100.00" 
    required>
</div>

<div class="form-group gpa_div col-md-6">
    <label>Obtain CGPA <small>(e.g., 3.50)</small></label>
    <input type="text" name="gpa"  class="form-control" id="gpa" 
    onkeyup="perDivGPA(this)" 
    pattern="^[0-4]\.\d{1,2}$" 
    title="Please enter a valid CGPA between 0.00 and 4.00" 
    placeholder="e.g., 3.50" 
    readonly="">
</div>

<div class="form-group gpa_div col-md-6">
    <label>Total CGPA <small>(e.g., 4.00)</small></label>
    <input type="text" name="total_gpa" class="form-control" id="total_gpa" 
    onkeyup="perDivGPA(this)" 
    pattern="^[0-4]\.\d{1,2}$" 
    title="Please enter a valid CGPA between 0.00 and 4.00" 
    placeholder="e.g., 4.00" 
    readonly=""> 
</div>

<div class="form-group division col-md-6">
    <label>Division</label>
    <input type="text" name="division" id="division" class="form-control" readonly="">
</div>

<div class="form-group percenteage col-md-6">
    <label>Percentage <small>(e.g., 85.50)</small></label>
    <input type="text" required name="percentage" value=""   
    pattern="^\d{1,3}\.\d{1,2}$"   
    id="percentage" 
    class="form-control" 
    placeholder="e.g., 85.50" 
    readonly="">
</div>

						<div class="form-group py-2 col-md-6">
							<label > Marksheet : </label>
							<input class="form-control" type="file" name="marksheet" onchange="readURL(this)">
						</div>
					</div>

					<script>
						$(document).ready(function(){
							$(".gpa_div").hide();										
							$(".gpa_div").find('input').val("");
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
