<?php

namespace App\Http\Controllers;

use App\Models\DataMesin;
use App\Models\Workshop;
use App\Models\KlasMesin;
use App\Models\DataKategori;
use App\Models\KategoriMesin;
use App\Models\NoRegistrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\Klasifikasi;
use App\Models\Kategori;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class HistoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:history')->only('index');
        $this->middleware('permission:history-get-data')->only('getDtRowData');
    }
    public function index()
    {
        return view('mesin.history');
    }

    public function getDtRowData(Request $request){
            $data_mesin = History::with('data_mesin', 'user')
            ->orderBy('created_at', 'desc')
            ->get();
            return Datatables::of($data_mesin)
                ->editColumn('id', '{{$id}}')
                ->editColumn('created_at', '{{ Carbon\Carbon::parse($created_at)->diffForHumans() }}')
                ->editColumn('updated_at', '{{ Carbon\Carbon::parse($updated_at)->diffForHumans() }}')
                ->setRowId('id')
                ->make(true);
        }
}
