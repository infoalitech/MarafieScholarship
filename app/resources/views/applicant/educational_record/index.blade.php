@extends('bootlayout.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="max-height: 300px;">
    <div class="container">
        <div class="justify-content-center text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Educational Records') }}
            </h2>
            @if(Auth::user()->applicant)
            <a href="{{ route('educational_record.create') }}" class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Add New
            </a>
            @endif
        </div>
    </div>
</section><!-- End Hero -->

<div class="py-12">
    <div class="container p-3">
        <div class="container">
            <div class="overflowx-scroll">
                @if(Auth::user()->applicant)
                           <div class="table-responsive">
                        <table class="table" id="tbl_exp">
                            <thead>
                                <tr>
                                    <th> Degree </th>
                                    <th> Institution </th>
                                    <th> Year </th>
                                    <th> Type </th>
                                    <th> Obt Marks </th>
                                    <th> Total Marks </th>
                                    <th> GPA </th>
                                    <th> Total GPA </th>
                                    <th> Division </th>
                                    <th> Percentage </th>
                                    <th> Image </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($scholarshipQualifications as $scholarshipQualification)
                                    <tr>
                                        <td>{{$scholarshipQualification->degree->degree_title}}</td>
                                        <td>{{$scholarshipQualification->institute}}</td>
                                        <td>{{$scholarshipQualification->year}}</td>
                                        <td>
                                            @if($scholarshipQualification->total_marks == 0)
                                                GPA
                                            @else
                                                Marks
                                            @endif
                                        </td>
                                        <td>{{$scholarshipQualification->obt_marks}}</td>
                                        <td>{{$scholarshipQualification->total_marks}}</td>
                                        <td>{{$scholarshipQualification->obt_gpa}}</td>
                                        <td>{{$scholarshipQualification->total_gpa}}</td>
                                        <td>{{$scholarshipQualification->division}}</td>
                                        <td>{{$scholarshipQualification->percentage}}</td>
                                        <td>
                                            <img src="{{ $scholarshipQualification->marksheet }}"  width="100%" id="img">
                                        </td>
                                        <td>
                                            <form action="{{ route('educational_record.destroy',$scholarshipQualification->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a class="btn btn-primary btn-sm  m-1" href="{{ route('educational_record.edit',$scholarshipQualification->id) }}">Edit</a>
                                                <a class="btn btn-danger btn-sm  m-1"  onclick="$(this).parent().submit()"><i class="fa fa-trash">Delete</i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
        margin: .5em 0 .75em;
    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    table th,
    table td {
        padding: .625em;
        text-align: center;
    }

    table th {
        font-size: .85em;
        letter-spacing: .1em;
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

    @media screen and (max-width: 600px) {}

</style>

@endsection
