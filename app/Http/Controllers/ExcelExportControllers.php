<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelExportControllers extends Controller
{
    public function CSVPersonas(){
        return Excel::download(new UserExport, 'users.xlsx');
    }
}
