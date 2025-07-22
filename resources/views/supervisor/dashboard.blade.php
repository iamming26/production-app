@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Dashboard</h5>
        </div>
        <div class="card-body">
            <p>Welcome to the Supervisor Dashboard. Here you can manage lots and view production data.</p>
            <div class="d-flex justify-content-end">
            </div>
        </div>
    </div>

    <div class="card shadow-sm mt-3">
        {{-- <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Dashboard</h5>
        </div> --}}
        <div class="card-body">
            <div class="col-md-12">
                <div id="main" style="width: 100%; height: 50vh;"></div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/echarts@5.6.0/dist/echarts.min.js"></script>
<script>
    const shifts = @json($data['shifts']);
    const dates = @json($data['dates']);
    const values = @json($data['values']);

    var chartDom = document.getElementById('main');
    var myChart = echarts.init(chartDom);

    var app = {};

    var option;

    const posList = [
    'left',
    'right',
    'top',
    'bottom',
    'inside',
    'insideTop',
    'insideLeft',
    'insideRight',
    'insideBottom',
    'insideTopLeft',
    'insideTopRight',
    'insideBottomLeft',
    'insideBottomRight'
    ];
    app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
        left: 'left',
        center: 'center',
        right: 'right'
        }
    },
    verticalAlign: {
        options: {
        top: 'top',
        middle: 'middle',
        bottom: 'bottom'
        }
    },
    position: {
        options: posList.reduce(function (map, pos) {
        map[pos] = pos;
        return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
    };
    app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        const labelOption = {
        rotate: app.config.rotate,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        position: app.config.position,
        distance: app.config.distance
        };
        myChart.setOption({
        series: [
            {
            label: labelOption
            },
            {
            label: labelOption
            },
            {
            label: labelOption
            },
            {
            label: labelOption
            }
        ]
        });
    }
    };
    const labelOption = {
    show: true,
    position: app.config.position,
    distance: app.config.distance,
    align: app.config.align,
    verticalAlign: app.config.verticalAlign,
    rotate: app.config.rotate,
    formatter: '{c}  {name|{a}}',
    fontSize: 16,
    rich: {
        name: {}
    }
    };

    const series = shifts.map(shift => {
        const data = dates.map(date => {
            return values[date]?.[shift] ? parseInt(values[date][shift]) : 0;
        });

        return {
            name: shift,
            type: 'bar',
            label: labelOption,
            emphasis: { focus: 'series' },
            data: data
        };
    });


    option = {
    tooltip: {
        trigger: 'axis',
        axisPointer: {
        type: 'shadow'
        }
    },
    legend: {
        data: shifts
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
        mark: { show: true },
        dataView: { show: true, readOnly: false },
        magicType: { show: true, type: ['line', 'bar', 'stack'] },
        restore: { show: true },
        saveAsImage: { show: true }
        }
    },
    xAxis: [
        {
        type: 'category',
        axisTick: { show: false },
        data: dates
        }
    ],
    yAxis: [
        {
        type: 'value'
        }
    ],
    series: series
    };

    option && myChart.setOption(option);
</script>
@endsection