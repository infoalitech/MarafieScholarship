<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Scholarship;
use Illuminate\Support\Str; // Import Str class


class ExportController extends Controller
{
    public function all(Request $request, $id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $fileName = Str::slug($scholarship->post) . '_all.xlsx';
        return Excel::download(new GeneralExport($id), $fileName);
    }

    public function pending(Request $request, $id)
    {
        $query = 'applied';
        $scholarship = Scholarship::findOrFail($id);
        $fileName = Str::slug($scholarship->post) . '_pending.xlsx';
        return Excel::download(new GeneralExport($id, $query), $fileName);
    }

    public function accepted(Request $request, $id)
    {
        $query = 'Accept';
        $scholarship = Scholarship::findOrFail($id);
        $fileName = Str::slug($scholarship->post) . '_accepted.xlsx';
        return Excel::download(new GeneralExport($id, $query), $fileName);
    }

    public function rejected(Request $request, $id)
    {
        $query = 'Reject';
        $scholarship = Scholarship::findOrFail($id);
        $fileName = Str::slug($scholarship->post) . '_rejected.xlsx';
        return Excel::download(new GeneralExport($id, $query), $fileName);
    }

    public function review(Request $request, $id)
    {
        $query = 'Review';
        $scholarship = Scholarship::findOrFail($id);
        $fileName = Str::slug($scholarship->post) . '_review.xlsx';
        return Excel::download(new GeneralExport($id, $query), $fileName);
    }
}
