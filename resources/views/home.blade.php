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
</div>
@endsection
@section('scripts')
@parent

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
{!! $chart1->renderJs() !!}
{!! $chart2->renderJs() !!}

@endsection