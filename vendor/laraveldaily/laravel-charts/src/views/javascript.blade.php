<script>
    var ctx = document.getElementById("{{ $options['chart_name'] ?? 'myChart' }}");
    var {{ $options['chart_name'] ?? 'myChart' }} = new Chart(ctx, {
        type: '{{ $options['chart_type'] ?? 'line' }}',
        data: {
            
            labels: [
                @if (count($datasets) > 0)
                    @foreach ($datasets[0]['data'] as $group => $result)
                        "{{ $group }}",
                    @endforeach
                @endif
            ],
        datasets: [
            @foreach ($datasets as $dataset)
            {
                label: '{{ $dataset['name'] ?? $options['chart_title'] }}',
                data: [
                    @foreach ($dataset['data'] as $group => $result)
                        {!! $result !!},
                    @endforeach
                ],
                @if ($options['chart_type'] == 'line')
                    @if (isset($dataset['fill']) && $dataset['fill'] != '')
                        fill: '{{ $dataset['fill'] }}',
                    @else
                        fill: false,
                    @endif
                    @if (isset($dataset['color']) && $dataset['color'] != '')
                        borderColor: '{{ $dataset['color'] }}',
                    @elseif (isset($dataset['chart_color']) && $dataset['chart_color'] != '')
                        borderColor: 'rgba({{ $dataset['chart_color'] }})',
                    @else
                        borderColor: 'rgba({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }}, 0.6)',
                    @endif
                @elseif ($options['chart_type'] == 'pie')
                    
                    backgroundColor: [
                        @foreach ($dataset['data'] as $group => $result)
                            'rgba({{ rand(0,255) }}, {{ rand(0,255) }}, {{ rand(0,255) }}, 0.6)',
                        @endforeach
                    ],
                @elseif ($options['chart_type'] == 'bar' && isset($dataset['chart_color']) && $dataset['chart_color'] != '')
                    borderColor: 'rgba({{ $dataset['chart_color'] }})',
                    backgroundColor: 'rgba({{ $dataset['chart_color'] }}, .6)',
                @endif
                borderWidth: 2
            },
            @endforeach
        ]
    },
    options: {
        @if ($options['chart_type'] == 'pie')
        responsive: false,
        legend: {
                position: 'bottom',
            },
        @endif
        
        tooltips: {
            
            @if ($options['chart_type'] == 'bar')
            mode: 'point',
            callbacks: {
                label: function(t, d) {
                    var xLabel = d.datasets[t.datasetIndex].label;
                    var yLabel = t.yLabel >= 1000 ? t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : t.yLabel;
                    return xLabel + ': ' + yLabel;
                }
            }
            @elseif ($options['chart_type'] == 'pie')
            
            mode: 'label',
            callbacks: {
                label: function(tooltipItem, data) { 
                    var indice = tooltipItem.index;                 
                    return  data.labels[indice] +' : '+data.datasets[0].data[indice].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+ '';
                }
            }
            @endif
        },
        height: '{{ $options['chart_height'] ?? "300px" }}',
        @if ($options['chart_type'] != 'pie')
            scales: {
                xAxes: [],
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        callback: function(label, index, labels) {
                        return new Intl.NumberFormat('en-ID', { maximumSignificantDigits: 19 }).format(label/1000000000)+' M';
                        }
                    },
                    
                    
                }]
            },
        @endif
        
       
    }
    });
</script>
