@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style>
    .div-btn {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1;
    }

    #company {
        position: absolute;
        bottom: 0;
    }

    #KPIdates {
        padding: 6px;
        font-size: 14px;
        width: 50%;
        border-radius: 4px;
        box-shadow: none;
        border: 1px solid rgb(206, 212, 218);
        margin-bottom: 15px;
    }

    #kpi-data{
        position: relative;
    }

    #no-data{
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
</style>
@endsection
@section('main-content')
<div class="breadcrumb">
    <h1>DashBoard</h1>
    <ul>
        <li>Dashboard</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-2">Score</div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 orange rounded d-flex align-items-center">
                                    <a href="{{route('filterApplication', ['col' => 'score', 'filter' => 'hot'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Feedburner text-white text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 text-white mb-1">Hot</h4>
                                        <span class="text-white">Total: {{$hot}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 bg-warning rounded d-flex align-items-center">
                                    <a href="{{route('filterApplication', ['col' => 'score', 'filter' => 'aborted'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Thumbs-Down-Smiley text-white text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 text-white mb-1">Aborted</h4>
                                        <span class="text-white">Total: {{$aborted}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 rounded d-flex align-items-center" style="background-color:lightsalmon;">
                                    <a href="{{route('filterApplication', ['col' => 'score', 'filter' => 'warm'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Temperature1 text-white text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 text-white mb-1">Warm</h4>
                                        <span class="text-white">Total: {{$warm}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 bg-danger rounded d-flex align-items-center">
                                    <a href="{{route('filterApplication', ['col' => 'score', 'filter' => 'rejected'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Delete-File text-white text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 text-white mb-1">Rejected</h4>
                                        <span class="text-white">Total: {{$rejected}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 teal rounded d-flex align-items-center">
                                    <a href="{{route('filterApplication', ['col' => 'score', 'filter' => 'cold'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Snow1 text-white text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 text-white mb-1">Cold</h4>
                                        <span class="text-white">Total: {{$cold}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body" id="echart1" style="width:100%; height:311px;">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title mb-2">Status</div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 rounded d-flex align-items-center indigo text-white">
                                    <a href="{{route('filterApplication', ['col' => 'status', 'filter' => 'new'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Info-Window text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 mb-1 text-white">New</h4>
                                        <span>Total: {{$new}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 bg-dark rounded d-flex align-items-center text-white">
                                    <a href="{{route('filterApplication', ['col' => 'status', 'filter' => 'reviewing'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Magnifi-Glass1 text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 text-white mb-1">Reviewing</h4>
                                        <span>Total: {{$reviewing}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 bg-success rounded d-flex align-items-center text-white">
                                    <a href="{{route('filterApplication', ['col' => 'status', 'filter' => 'approved'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Approved-Window text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 mb-1 text-white">Approved</h4>
                                        <span>Total: {{$approved}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 rounded d-flex align-items-center orange text-white">
                                    <a href="{{route('filterApplication', ['col' => 'status', 'filter' => 'pending'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Loading-3 text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 mb-1 text-white">Pending</h4>
                                        <span>Total: {{$pending}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 bg-danger rounded d-flex align-items-center text-white">
                                    <a href="{{route('filterApplication', ['col' => 'status', 'filter' => 'rejected'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Delete-File text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 text-white mb-1">Rejected</h4>
                                        <span>Total: {{$rejected}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="p-4 bg-warning rounded d-flex align-items-center text-white">
                                    <a href="{{route('filterApplication', ['col' => 'status', 'filter' => 'aborted'])}}"><span class="div-btn"></span></a>
                                    <i class="i-Thumbs-Down-Smiley text-white text-32 mr-3"></i>
                                    <div>
                                        <h4 class="text-18 text-white mb-1">Aborted</h4>
                                        <span>Total: {{$aborted}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body" id="echart2" style="width:100%; height:311px;">>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-2">Upcoming Reminders</div>
                        <div style=" height:300px; overflow-y: scroll;">
                            @if (count($reminders) == 0)
                            <div style="display: flex; justify-content:center; align-items:center; height:90%">
                                <h4>No Upcoming Reminders.</h4>
                            </div>
                            @endif
                            @foreach($reminders as $reminder)
                            <div class="card m-3">
                                <div class="card-body">
                                    <h6 class="heading">
                                        <div class="row align-items-center justify-content-end">
                                        </div>
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <span class="h4 font-weight-bold">{{ $reminder->dateTime->format('D')}}</span><br>
                                            <span class="h1 font-weight-bold">{{ $reminder->dateTime->format('d')}}</span><br>
                                            <span class="h6 font-weight-bold">{{ $reminder->dateTime->format('M Y')}}</span><br>
                                            <span class="h6 font-weight-bold">{{ $reminder->dateTime->format('h:i A')}}</span><br>
                                        </div>
                                        <div class="col-md-9 d-inline">
                                            <div>
                                                <p id="reminder_title" class="m-0"><strong>{{ $reminder->title }}</strong></p>
                                            </div>
                                            <div>
                                                <p class="mb-2" id='upcoming_details'><i>{{$reminder->detail}}</i></p>
                                            </div>
                                            <div class="d-flex justify-content-end ml-auto mt-auto">
                                                <span class=" font-weight-normal" id="company"><i class="i-Building mr-1"></i>{{$reminder->application->company->name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                    <div class="card-title mb-2">KPI Chart</div>
                        <div>
                            <div id="kpi-data" class="container" style="height: auto;">
                                <div id="no-data"  class="mx-auto text-center"></div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('assets/js/vendor/toastr.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@if(session('toast-success'))
<script>
    toastr.success("{{session('toast-success')}}", "Success", {
        timeOut: "5000",
    });
</script>
@endif
<script type="text/javascript">
    // based on prepared DOM, initialize echarts instance
    var myChart = echarts.init(document.getElementById('echart1'));

    // specify chart configuration item and data
    var option = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)'
        },
        legend: {
            show: true,
            bottom: 0,
        },
        series: [{
            name: 'Score',
            type: 'pie',
            radius: ['50%', '70%'],
            center: ['50%', '45%'],
            avoidLabelOverlap: false,
            label: {
                show: false,
                position: 'center'
            },
            emphasis: {
                label: {
                    show: true,
                    fontSize: '25',
                    fontWeight: 'bold'
                }
            },
            labelLine: {
                show: false
            },
            data: [{
                name: 'Hot',
                value: '{{$hot}}',
                itemStyle: {
                    color: "orange",
                }
            }, {
                name: 'Warm',
                value: '{{$warm}}',
                itemStyle: {
                    color: 'lightsalmon',
                }
            }, {
                name: 'Cold',
                value: '{{$cold}}',
                itemStyle: {
                    color: '#20c997',
                }
            }, {
                name: 'Aborted',
                value: '{{$aborted}}',
                itemStyle: {
                    color: '#ffc107',
                }
            }, {
                name: 'Rejected',
                value: '{{$rejected}}',
                itemStyle: {
                    color: '#f44336',
                }
            }]
        }]
    };

    // use configuration item and data specified to show chart
    myChart.setOption(option);
    $(window).on('resize', function() {
        setTimeout(() => {
            myChart.resize();
        }, 500);
    });
</script>

<script type="text/javascript">
    // based on prepared DOM, initialize echarts instance
    var echart2 = echarts.init(document.getElementById('echart2'));

    // specify chart configuration item and data
    var option = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b}: {c} ({d}%)'
        },
        legend: {
            show: true,
            bottom: 0,
        },
        series: [{
            name: 'Status',
            type: 'pie',
            radius: ['50%', '70%'],
            center: ['50%', '40%'],
            avoidLabelOverlap: false,
            label: {
                show: false,
                position: 'center'
            },
            emphasis: {
                label: {
                    show: true,
                    fontSize: '25',
                    fontWeight: 'bold'
                }
            },
            labelLine: {
                show: false
            },
            data: [{
                name: 'New',
                value: '{{$new}}',
                itemStyle: {
                    color: '#3F51B5',
                }
            }, {
                name: 'Pending',
                value: '{{$pending}}',
                itemStyle: {
                    color: '#e97d23',
                }
            }, {
                name: 'Approved',
                value: '{{$approved}}',
                itemStyle: {
                    color: '#4caf50',
                }
            }, {
                name: 'Rejected',
                value: '{{$rejected}}',
                itemStyle: {
                    color: '#f44336',
                }
            }, {
                name: 'Aborted',
                value: '{{$aborted}}',
                itemStyle: {
                    color: '#ffc107',
                }
            }, {
                name: 'Reviewing',
                value: '{{$reviewing}}',
                itemStyle: {
                    color: '#0b192b',
                }
            }]
        }]
    };

    // use configuration item and data specified to show chart
    echart2.setOption(option);
    $(window).on('resize', function() {
        setTimeout(() => {
            echart2.resize();
        }, 500);
    });
</script>


<script>
    var month = {
        !!json_encode($monthsArr) !!
    };
    var amount = {
        !!json_encode($amountArr) !!
    };
    var basicAreaElem = document.getElementById('basicArea');
    if (basicAreaElem) {
        var basicArea = echarts.init(basicAreaElem);
        basicArea.setOption({
            tooltip: {
                trigger: 'axis',

                axisPointer: {
                    animation: true
                }
            },
            grid: {
                left: '4%',
                top: '4%',
                right: '3%',
                bottom: '10%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: month,
                axisLabel: {
                    formatter: '{value}',
                    color: '#666',
                    fontSize: 12,
                    fontStyle: 'normal',
                    fontWeight: 400

                },
                axisLine: {
                    lineStyle: {
                        color: '#ccc',
                        width: 1
                    }
                },
                axisTick: {
                    lineStyle: {
                        color: '#ccc',
                        width: 1
                    }
                },
                splitLine: {
                    show: false,
                    lineStyle: {
                        color: '#ccc',
                        width: 1
                    }
                }
            },
            yAxis: {
                type: 'value',
                min: 0,
                axisLabel: {
                    formatter: '{value}k',
                    color: '#666',
                    fontSize: 12,
                    fontStyle: 'normal',
                    fontWeight: 400

                },
                axisLine: {
                    lineStyle: {
                        color: '#ccc',
                        width: 1
                    }
                },
                axisTick: {
                    lineStyle: {
                        color: '#ccc',
                        width: 1
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: '#ddd',
                        width: 1,
                        opacity: 0.5
                    }
                }
            },
            series: [{
                name: 'Total Amount',
                type: 'line',
                smooth: true,
                data: amount,
                symbolSize: 8,
                showSymbol: false,
                lineStyle: {
                    color: 'rgb(255, 87, 33)',
                    opacity: 1,
                    width: 1.5
                },
                itemStyle: {
                    show: false,
                    color: '#ff5721',
                    borderColor: '#ff5721',
                    borderWidth: 1.5
                },
                areaStyle: {
                    normal: {
                        color: {
                            type: 'linear',
                            x: 0,
                            y: 0,
                            x2: 0,
                            y2: 1,
                            colorStops: [{
                                offset: 0,
                                color: 'rgba(255, 87, 33, 1)'
                            }, {
                                offset: 0.3,
                                color: 'rgba(255, 87, 33, 0.7)'
                            }, {
                                offset: 1,
                                color: 'rgba(255, 87, 33, 0)'
                            }]
                        }
                    }
                }
            }]
        });
        $(window).on('resize', function() {
            setTimeout(function() {
                basicArea.resize();
            }, 500);
        });
    }
</script>
<script>
    // get sum of loan amt per month in an array x:y e.g x:'january', y:'9999' put in data: property
    function getLoanAmt() {
        fetch('/application/getLoanAmt/123')
        .then((res) => {
            if (res.ok){
                return res.json();
            }
            document.getElementById('no-data').innerHTML = '<h4>No Available Data.</h4>';
            document.getElementById('myChart').remove();
        })
        .then((val) => {
            loadChart(val);
        })
    }
    getLoanAmt(); 
function loadChart(data1) {
    
    function removeJSONString(data1) {
        // store all keys of this object for later use
        let keys = Object.keys(data1);
        // for each key update the "json" key
        keys.map(key => {
            // updates only if it has "json"
            if (data1[key].hasOwnProperty("0")) {
            // assign the current obj a new field with "json" value pair
            Object.assign(data1[key], data1[key]["0"]);
            // delete "json" key from this object
            delete data1[key]["0"];
            }
        })
        // updated all fields of obj
        return data1;
    }
    let data123 = removeJSONString(data1);
    console.log(data123);

    var holder = {};

    data123.forEach(function(d) {
        if (holder.hasOwnProperty(d.approved_at)) {
            holder[d.approved_at] += parseInt(d.loan_amt);
        } else {
            holder[d.approved_at] = parseInt(d.loan_amt);
        }   
    });
    console.log(holder);
    var obj2 = [];

    for (var prop in holder) {
        obj2.push({ approved_at: prop, loan_amt: holder[prop] });
    }

    console.log(obj2);
    const data = {
    datasets: [{
        label: 'Loan Amount',
        data: obj2,
        fill: false,
        }]
    };

const config = {
  type: 'bar',
  data: data,
  options: {
    parsing: {
        xAxisKey: 'approved_at',
        yAxisKey: 'loan_amt'
    },
    plugins: {
            title: {
                display: true,
                text: 'Custom Chart Title'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        var label = context.dataset.label || '';

                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed.y !== null) {
                            label += new Intl.NumberFormat('en-SG', { style: 'currency', currency: 'SGD' }).format(context.parsed.y);
                        }
                        return label;
                    }
                }
            }
        },
    elements: {
        bar: {
            backgroundColor: 'rgb(255,255,255)',
            borderWidth: 1,
            borderColor: 'rgb(75, 192, 192)',
        }
    },
    scales: {
        yAxisKey: {
                ticks: {
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return value/1000 + 'k';
                    }
                }
            }
        }
  }
};

const ctx  = document.getElementById('myChart');
var myChart = new Chart(
    ctx,config
  );
}

</script>
@endpush