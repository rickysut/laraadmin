<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Belanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        $ymax = DB::select(DB::raw("select max(tahun) as mxthn from belanjas"));
        $dtYear=$ymax[0]->mxthn;
        $stYear = "tahun=".$dtYear;
        $years = DB::select(DB::raw("select distinct(tahun) from belanjas"));
        $settings1 = [
            'chart_title'        => 'Pagu',
            'chart_type'         => 'bar',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\Belanja',
            'group_by_field'     => 'kewenangan',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'pagu',
            'field_distinct'     => 'tahun',
            'column_class'       => 'col-md-6',
            'entries_number'     => '15',
            'translation_key'    => 'belanja',
            'name'               => 'pagu',
            'where_raw'          => $stYear, 
            'sort_by'            => 'id',
            'chart_color'        => '255, 99, 132',
            
            
        ];
        $settings2 = [
            'chart_title'        => 'Realisasi',
            'chart_type'         => 'bar',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\Belanja',
            'group_by_field'     => 'kewenangan',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'realisasi',
            'field_distinct'     => 'tahun',
            'column_class'       => 'col-md-6',
            'entries_number'     => '15',
            'translation_key'    => 'belanja',
            'name'               => 'realisasi',
            'where_raw'          => $stYear, 
            'sort_by'            => 'id',
            'chart_color'        => '54, 162, 235',
        ];


        $banYear = "year=".$dtYear;
        $settings3 = [
            'chart_title'        => 'Komposisi belanja barang 526',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\BackdateBanpem',
            'group_by_field'     => 'jenis',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'nom_realisasi',
            //'field_distinct'     => 'year',
            'column_class'       => 'col-md-6',
            'entries_number'     => '15',
            'relationship_name'  => 'kd_akun',
            'translation_key'    => 'backdateBanpem',
            'where_raw'          => $banYear, 
            'sort_by'            => 'jenis',
        ];


        $chart1 = new LaravelChart($settings1,$settings2);
        $chart2 = new LaravelChart($settings3);

        return view('home', compact('chart1', 'chart2', 'years', 'dtYear'));
    }

    public function index2(Request $request)
    {
        $stYear = "tahun=".$request->dtyear;
        $dtYear = $request->dtyear;
        $years = DB::select(DB::raw("select distinct(tahun) from belanjas"));
        $settings1 = [
            'chart_title'        => 'Pagu',
            'chart_type'         => 'bar',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\Belanja',
            'group_by_field'     => 'kewenangan',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'pagu',
            'field_distinct'     => 'tahun',
            'column_class'       => 'col-md-6',
            'entries_number'     => '15',
            'translation_key'    => 'belanja',
            'name'               => 'pagu',
            'where_raw'          => $stYear, 
            'sort_by'            => 'id',
            'chart_color'        => '255, 99, 132',
            
            
        ];
        $settings2 = [
            'chart_title'        => 'Realisasi',
            'chart_type'         => 'bar',
            'report_type'        => 'group_by_string',
            'model'              => 'App\Models\Belanja',
            'group_by_field'     => 'kewenangan',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'realisasi',
            'field_distinct'     => 'tahun',
            'column_class'       => 'col-md-6',
            'entries_number'     => '15',
            'translation_key'    => 'belanja',
            'name'               => 'realisasi',
            'where_raw'          => $stYear, 
            'sort_by'            => 'id',
            'chart_color'        => '54, 162, 235',
        ];

        $banYear = "year=".$request->dtyear;
        $settings3 = [
            'chart_title'        => 'Komposisi belanja barang 526',
            'chart_type'         => 'pie',
            'report_type'        => 'group_by_relationship',
            'model'              => 'App\Models\BackdateBanpem',
            'group_by_field'     => 'jenis',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'nom_realisasi',
            //'field_distinct'     => 'year',
            'column_class'       => 'col-md-6',
            'entries_number'     => '15',
            'relationship_name'  => 'kd_akun',
            'translation_key'    => 'backdateBanpem',
            'where_raw'          => $banYear, 
            'sort_by'            => 'jenis',
        ];

        $chart1 = new LaravelChart($settings1,$settings2);
        $chart2 = new LaravelChart($settings3);

        return view('home', compact('chart1', 'chart2', 'years', 'dtYear'));
    }
}

