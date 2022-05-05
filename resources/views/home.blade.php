@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    
                    <form id="yf" action="{{ route('admin.home2') }}" method="post">
                        {{ csrf_field() }}
                        Dashboard Tahun: 
                                <select id="comboYear" name="dtyear" onchange="yf.submit()">
                                    @foreach($years as $data)
                                        <option  value="{{ $data->tahun }}"
                                        @if ($dtYear == $data->tahun)
                                            selected   
                                        @endif    
                                            >{{ $data->tahun }}</option>
                                    @endforeach
                                </select>
                            </form>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="{{ $chart1->options['column_class'] }}">
                            
                                <h5>Realisasi Belanja 526 Per Kewenangan

                                    
                                   
                                </h5>
                        
                            {!! $chart1->renderHtml() !!}
                        </div>
                        <div class="{{ $chart2->options['column_class'] }}">
                            <h5>{!! $chart2->options['chart_title'] !!}</h5>
                            {!! $chart2->renderHtml() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- from banpem -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="fa fa-university"></i> Pemantauan Alokasi Anggaran
                </div>
                <div class="row card-body">
                    <!-- widget Gerdal OPT -->
    
    
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <span id="Widget1Title" class="font-weight-bolder">Total Anggaran</span>
                            </div>
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id=""
                                            src="<?php echo url('assets/images/icon/money-bag.png') ?>"
                                            style="width:48px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Anggaran Tahun 2022</h6>
                                        <h3 class="text-info font-bold">373.185.388.571</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">0%</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">100%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 100%; height: 10px;" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Total Anggaran Kegiatan Tahun ini</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget Gerdal OPT -->
    
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <span id="Widget1Title" class="font-weight-bolder">Total Bantuan Barang</span>
                            </div>
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id="" src="<?php echo url('assets/images/icon/boxes.png') ?>"
                                            style="width:48px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Realisasi Penyaluran</h6>
                                        <h3 class="text-success font-bold">298.548.310.857</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">Data: 31 Jan</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">80%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 80%; height: 10px;" aria-valuenow="80" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Dari total alokasi anggaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget Gerdal OPT -->
    
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <span id="Widget1Title" class="font-weight-bolder">Total Bantuan Uang</span>
                            </div>
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id="" src="<?php echo url('assets/images/icon/money.png') ?>"
                                            style="width:48px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Realisasi Penyaluran</h6>
                                        <h3 class="text-warning font-bold">149.274.155.428</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">Data: 30 Jun</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">50%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: 50%; height: 10px;" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Dari total alokasi anggaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h6 class="card-title m-b-0" style="text-align: right;"><small>Sumber: App. Pengendalian Anggaran
                            2022</small></h6>
                </div>
            </div>
        </div>
    </div>
    <!-- end from banpem -->
    <!-- jenis barang -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fa fa-archive"></i>
                    Bantuan Berdasarkan Jenis Barang
                </div>
                <div class="row card-body">

                    <div class="col-lg-3 col-md-6">
                        <div class="card card-default ">
                            <div class="card-header">
                                <span id="Widget1Title" class="font-weight-bolder">Alsintan</span>
                            </div>
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">


                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id=""
                                            src="<?php echo url('assets/images/icon/fertilizer.png') ?>"
                                            style="width:48px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Nominal</h6>
                                        <h6 class="text-info font-bold">373.185.388.571</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">0%</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">70%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 100%; height: 10px;" aria-valuenow="70" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Dari total alokasi anggaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget Gerdal OPT -->


                    <div class="col-lg-3 col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <span id="Widget1Title" class="font-weight-bolder">Benih</span>
                            </div>
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id=""
                                            src="<?php echo url('assets/images/icon/seeding.png') ?>"
                                            style="width:48px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Nominal</h6>
                                        <h6 class="text-success font-bold">298.548.310.857</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">0%</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">80%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 80%; height: 10px;" aria-valuenow="80" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Dari total alokasi anggaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <span id="Widget1Title" class="font-weight-bolder">Pupuk</span>
                            </div>
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id="" src="<?php echo url('assets/images/icon/seed.png') ?>"
                                            style="width:48px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Nominal</h6>
                                        <h6 class="text-warning font-bold">149.274.155.428</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">0%</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">50%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: 50%; height: 10px;" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Dari total alokasi anggaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <span id="Widget1Title" class="font-weight-bolder">Sarpras</span>
                            </div>
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id=""
                                            src="<?php echo url('assets/images/icon/sarpras.png') ?>"
                                            style="width:48px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Nominal</h6>
                                        <h6 class="text-danger font-bold">149.274.155.428</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">0%</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">90%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: 50%; height: 10px;" aria-valuenow="90" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Dari total alokasi anggaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h6 class="card-title m-b-0" style="text-align: right;"><small>Sumber: App. Pengendalian Anggaran
                            2022</small></h6>
                </div>
            </div>
        </div>
    </div>
    <!-- jenis barang -->

</div>
@endsection
@section('scripts')
@parent

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
{!! $chart1->renderJs() !!}
{!! $chart2->renderJs() !!}

@endsection