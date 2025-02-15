<div>
    <div
        label="{{ json_encode($data['nama']) }}"
        data="{{ json_encode($data['total']) }}"
        id="chart-{{ $this->getId() }}"></div>
</div>

@script
<script>
    (function() {
        var options = {
            colors: ["{{ $color }}"],
            series: [{
                data: JSON.parse(document.querySelector("#chart-{{ $this->getId() }}").getAttribute('data'))
            }],
            chart: {
                color: '#fff',
                type: 'bar',
                height: "{{ $height }}"
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: JSON.parse(document.querySelector("#chart-{{ $this->getId() }}").getAttribute('label')),
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-{{ $this->getId() }}"), options);
        chart.render();
    })();
</script>
@endscript