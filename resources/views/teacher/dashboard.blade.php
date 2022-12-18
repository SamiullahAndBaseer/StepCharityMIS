@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('assets/src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('assets/src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/src/assets/css/light/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/src/assets/css/dark/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <script src="{{ asset('assets/src/plugins/src/apex/apexcharts.min.js') }}"></script>
    @section('title', 'Teacher Dashboard')
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="row layout-top-spacing">

                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-three">
                        <div class="widget-heading">
                            <div class="">
                                <h5 class="">Users per Month</h5>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div id="attendancePerMonth"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-two">
                        <div class="widget-heading">
                            <h5 class="">Users by Category</h5>
                        </div>
                        <div class="widget-content">
                            <div id="user_by_category" class=""></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row widget-statistic">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <div class="widget widget-one_hybrid widget-leaves">
                                <div class="widget-heading">
                                    <div class="w-title">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                        <div class="">
                                            <p class="w-value">2</p>
                                            <h5 class="">Leaves</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">    
                                    <div class="w-chart">
                                        <div id="hybrid_followers"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <div class="widget widget-one_hybrid widget-absents">
                                <div class="widget-heading">
                                    <div class="w-title">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                        <div class="">
                                            <p class="w-value">10</p>
                                            <h5 class="">Absents</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">    
                                    <div class="w-chart">
                                        <div id="hybrid_followers1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <div class="widget widget-one_hybrid widget-engagement">
                                <div class="widget-heading">
                                    <div class="w-title">
                                        <div class="w-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        </div>
                                        <div class="">
                                            <p class="w-value">18</p>
                                            <h5 class="">Presents</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content">    
                                    <div class="w-chart">
                                        <div id="hybrid_followers3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!--  BEGIN FOOTER  -->
    @include('layouts.admin_layouts.footer')
    <!--  END FOOTER  -->
</div>
@endsection
@section('custom_js_content')
    <script>
        
        window.addEventListener("load", function(){
            try {
                var datas = @php echo json_encode($datas) @endphp;
                var teacher_data = @php echo json_encode($teacher_data) @endphp;
                var student_data = @php echo json_encode($student_data) @endphp;
                var present_data = @php echo json_encode($present_data) @endphp;

                getcorkThemeObject = localStorage.getItem("theme");
                getParseObject = JSON.parse(getcorkThemeObject)
                ParsedObject = getParseObject;

                if (ParsedObject.settings.layout.darkMode) {

                    var Theme = 'dark';

                    Apex.tooltip = {
                        theme: Theme
                    }
                    
                    /**
                        ==============================
                        |    @Options Charts Script   |
                        ==============================
                    */

                    /*
                        ==================================
                            Users by category | Options
                        ==================================
                    */
                        var options = {
                            chart: {
                                type: 'donut',
                                width: 370,
                                height: 430
                            },
                            colors: ['#622bd7', '#e2a03f', '#e7515a', '#e2a03f'],
                            dataLabels: {
                            enabled: false
                            },
                            legend: {
                                position: 'bottom',
                                horizontalAlign: 'center',
                                fontSize: '14px',
                                markers: {
                                width: 10,
                                height: 10,
                                offsetX: -5,
                                offsetY: 0
                                },
                                itemMargin: {
                                horizontal: 10,
                                vertical: 30
                                }
                            },
                            plotOptions: {
                            pie: {
                                donut: {
                                size: '75%',
                                background: 'transparent',
                                labels: {
                                    show: true,
                                    name: {
                                    show: true,
                                    fontSize: '29px',
                                    fontFamily: 'Nunito, sans-serif',
                                    color: undefined,
                                    offsetY: -10
                                    },
                                    value: {
                                    show: true,
                                    fontSize: '26px',
                                    fontFamily: 'Nunito, sans-serif',
                                    color: '#bfc9d4',
                                    offsetY: 16,
                                    formatter: function (val) {
                                        return val
                                    }
                                    },
                                    total: {
                                    show: true,
                                    showAlways: true,
                                    label: 'Total Accounts',
                                    color: '#888ea8',
                                    formatter: function (w) {
                                        return w.globals.seriesTotals.reduce( function(a, b) {
                                        return a + b
                                        }, 0)
                                    }
                                    }
                                }
                                }
                            }
                            },
                            stroke: {
                            show: true,
                            width: 15,
                            colors: '#0e1726'
                            },
                            series: [{{ $employees }},{{ $students }}, {{ $teachers }}],
                            labels: ['Employee', 'Students', 'Teachers'],
                    
                            responsive: [
                            { 
                                breakpoint: 1440, options: {
                                chart: {
                                    width: 325
                                },
                                }
                            },
                            { 
                                breakpoint: 1199, options: {
                                chart: {
                                    width: 380
                                },
                                }
                            },
                            { 
                                breakpoint: 575, options: {
                                chart: {
                                    width: 320
                                },
                                }
                            },
                            ],
                        }
                    
                    
                    /*
                        ===================================
                            user_data  | Options
                        ===================================
                    */
                    
                    var d_1options1 = {
                        chart: {
                            height: 350,
                            type: 'bar',
                            toolbar: {
                                show: false,
                            }
                        },
                        colors: ['#622bd7', '#ffbb44', '#ff4533'],
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '65%',
                                endingShape: 'rounded',
                                borderRadius: 10,
                        
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            fontSize: '14px',
                            markers: {
                                width: 10,
                                height: 10,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 8
                            }
                        },
                        grid: {
                            borderColor: '#191e3a',
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        series: [{
                            name: 'Employees',
                            data: datas
                        }, {
                            name: 'Teachers',
                            data: teacher_data
                        },{
                            name: 'Students',
                            data: student_data
                        }],
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        },
                        yaxis: {
                            min: 0,
                            max: 5,
                            tickAmount: 5,
                        },
                        fill: {
                            type: 'gradient',
                            gradient: {
                            shade: Theme,
                            type: 'vertical',
                            shadeIntensity: 0.3,
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 0.8,
                            stops: [0, 100]
                            }
                        },
                        tooltip: {
                            marker : {
                                show: false,
                            },
                            theme: Theme,
                            y: {
                                formatter: function (val) {
                                    return val
                                }
                            }
                        },
                        responsive: [
                            { 
                                breakpoint: 767,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 0,
                                            columnWidth: "50%"
                                        }
                                    }
                                }
                            },
                        ]
                    }
                    
                    /*
                        ==============================
                            Statistics | Options
                        ==============================
                    */
                    
                    // leaves
                    
                    var d_1options3 = {
                        chart: {
                            id: 'sparkline1',
                            type: 'area',
                            height: 160,
                            sparkline: {
                            enabled: true
                            },
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2,
                        },
                        series: [{
                            name: 'Sales',
                            data: [38, 60, 38, 52, 36, 40, 28 ]
                        }],
                        labels: ['1', '2', '3', '4', '5', '6', '7'],
                        yaxis: {
                            min: 0
                        },
                        colors: ['#4361ee'],
                        tooltip: {
                            x: {
                            show: false,
                            }
                        },
                        grid: {
                            show: false,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                            top: 5,
                            right: 0,
                            left: 0
                            }, 
                        },
                        fill: {
                            type:"gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .30,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        }
                    }
                    
                    // absents
                    
                    var d_1options4 = {
                        chart: {
                            id: 'sparkline1',
                            type: 'area',
                            height: 160,
                            sparkline: {
                            enabled: true
                            },
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2,
                        },
                        series: [{
                            name: 'Sales',
                            data: [ 60, 28, 52, 38, 40, 36, 38]
                        }],
                        labels: ['1', '2', '3', '4', '5', '6', '7'],
                        yaxis: {
                            min: 0
                        },
                        colors: ['#e7515a'],
                        tooltip: {
                            x: {
                            show: false,
                            }
                        },
                        grid: {
                            show: false,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                            top: 5,
                            right: 0,
                            left: 0
                            }, 
                        },
                        fill: {
                            type:"gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .30,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        }
                    }
                    
                    // presents
                    
                    var d_1options5 = {
                        chart: {
                        id: 'sparkline1',
                        type: 'area',
                        height: 160,
                        sparkline: {
                            enabled: true
                        },
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2,
                        },
                        fill: {
                        opacity: 1,
                        },
                        series: [{
                        name: 'Present',
                        data: present_data
                        }],
                        labels: ['1', '2', '3', '4', '5', '6', '7'],
                        yaxis: {
                        min: 0
                        },
                        colors: ['#00ab55'],
                        tooltip: {
                        x: {
                            show: false,
                        }
                        },
                        grid: {
                            show: false,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                            top: 5,
                            right: 0,
                            left: 0
                            }, 
                        },
                        fill: {
                        type:"gradient",
                        gradient: {
                            type: "vertical",
                            shadeIntensity: 1,
                            inverseColors: !1,
                            opacityFrom: .30,
                            opacityTo: .05,
                            stops: [100, 100]
                        }
                        }
                    }
                

                } else {
                
                    var Theme = 'dark';
                    
                    Apex.tooltip = {
                        theme: Theme
                    }
                    
                    /**
                        ==============================
                        |    @Options Charts Script   |
                        ==============================
                    */

                        /*
                        ==================================
                            Users by Category | Options
                        ==================================
                    */
                    var options = {
                        chart: {
                            type: 'donut',
                            width: 370,
                            height: 430
                        },
                        colors: ['#622bd7', '#e2a03f', '#e7515a', '#e2a03f'],
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            fontSize: '14px',
                            markers: {
                                width: 10,
                                height: 10,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 30
                            }
                        },
                        plotOptions: {
                            pie: {
                            donut: {
                                size: '75%',
                                background: 'transparent',
                                labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontSize: '29px',
                                    fontFamily: 'Nunito, sans-serif',
                                    color: undefined,
                                    offsetY: -10
                                },
                                value: {
                                    show: true,
                                    fontSize: '26px',
                                    fontFamily: 'Nunito, sans-serif',
                                    color: '#0e1726',
                                    offsetY: 16,
                                    formatter: function (val) {
                                    return val
                                    }
                                },
                                total: {
                                    show: true,
                                    showAlways: true,
                                    label: 'Total Accounts',
                                    color: '#888ea8',
                                    formatter: function (w) {
                                    return w.globals.seriesTotals.reduce( function(a, b) {
                                        return a + b
                                    }, 0)
                                    }
                                }
                                }
                            }
                            }
                        },
                        stroke: {
                            show: true,
                            width: 15,
                            colors: '#fff'
                        },
                        series: [{{ $employees }},{{ $students }}, {{ $teachers }}],
                        labels: ['Employees', 'Students', 'Teachers'],
                    
                        responsive: [
                            { 
                            breakpoint: 1440, options: {
                                chart: {
                                width: 325
                                },
                            }
                            },
                            { 
                            breakpoint: 1199, options: {
                                chart: {
                                width: 380
                                },
                            }
                            },
                            { 
                            breakpoint: 575, options: {
                                chart: {
                                width: 320
                                },
                            }
                            },
                        ],
                    }
                    
                    
                    /*
                        ===================================
                            user_data  | Options
                        ===================================
                    */
                    
                    var d_1options1 = {
                        chart: {
                            height: 350,
                            type: 'bar',
                            toolbar: {
                                show: false,
                            }
                        },
                        colors: ['#622bd7', '#ffbb44', '#ff4533'],
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '65%',
                                endingShape: 'rounded',
                                borderRadius: 10,
                        
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            fontSize: '14px',
                            markers: {
                                width: 10,
                                height: 10,
                                offsetX: -5,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 10,
                                vertical: 8
                            }
                        },
                        grid: {
                            borderColor: '#e0e6ed',
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        series: [{
                            name: 'Employees',
                            data: datas
                        }, {
                            name: 'Teachers',
                            data: teacher_data
                        }, {
                            name: 'Students',
                            data: student_data
                        }],
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        },
                        yaxis: {
                            min: 0,
                            max: 5,
                            tickAmount: 5,
                        },
                        fill: {
                            type: 'gradient',
                            gradient: {
                            shade: Theme,
                            type: 'vertical',
                            shadeIntensity: 0.3,
                            inverseColors: false,
                            opacityFrom: 1,
                            opacityTo: 0.8,
                            stops: [0, 100]
                            }
                        },
                        tooltip: {
                            marker : {
                                show: false,
                            },
                            theme: Theme,
                            y: {
                                formatter: function (val) {
                                    return val
                                }
                            }
                        },
                        responsive: [
                            { 
                                breakpoint: 767,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 0,
                                            columnWidth: "60%"
                                        }
                                    }
                                }
                            },
                        ]
                    }
                    
                    /*
                        ==============================
                            Statistics | Options
                        ==============================
                    */
                    
                    // leaves
                    
                    var d_1options3 = {
                        chart: {
                            id: 'sparkline1',
                            type: 'area',
                            height: 160,
                            sparkline: {
                            enabled: true
                            },
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2,
                        },
                        series: [{
                            name: 'Sales',
                            data: [38, 60, 38, 52, 36, 40, 28 ]
                        }],
                        labels: ['1', '2', '3', '4', '5', '6', '7'],
                        yaxis: {
                            min: 0
                        },
                        colors: ['#4361ee'],
                        tooltip: {
                            x: {
                            show: false,
                            }
                        },
                        grid: {
                            show: false,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                            top: 5,
                            right: 0,
                            left: 0
                            }, 
                        },
                        fill: {
                            type:"gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .40,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        }
                    }
                    
                    // absents
                    
                    var d_1options4 = {
                        chart: {
                            id: 'sparkline1',
                            type: 'area',
                            height: 160,
                            sparkline: {
                            enabled: true
                            },
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2,
                        },
                        series: [{
                            name: 'Sales',
                            data: [ 60, 28, 52, 38, 40, 36, 38]
                        }],
                        labels: ['1', '2', '3', '4', '5', '6', '7'],
                        yaxis: {
                            min: 0
                        },
                        colors: ['#e7515a'],
                        tooltip: {
                            x: {
                            show: false,
                            }
                        },
                        grid: {
                            show: false,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                            top: 5,
                            right: 0,
                            left: 0
                            }, 
                        },
                        fill: {
                            type:"gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .40,
                                opacityTo: .05,
                                stops: [100, 100]
                            }
                        }
                    }
                    
                    // presents
                    
                    var d_1options5 = {
                        chart: {
                        id: 'sparkline1',
                        type: 'area',
                        height: 160,
                        sparkline: {
                            enabled: true
                        },
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2,
                        },
                        fill: {
                        opacity: 1,
                        },
                        series: [{
                        name: 'Presents',
                        data: present_data
                        }],
                        labels: ['1', '2', '3', '4', '5', '6', '7'],
                        yaxis: {
                        min: 0
                        },
                        colors: ['#00ab55'],
                        tooltip: {
                        x: {
                            show: false,
                        }
                        },
                        grid: {
                            show: false,
                            xaxis: {
                                lines: {
                                    show: false
                                }
                            },
                            padding: {
                            top: 5,
                            right: 0,
                            left: 0
                            }, 
                        },
                        fill: {
                        type:"gradient",
                        gradient: {
                            type: "vertical",
                            shadeIntensity: 1,
                            inverseColors: !1,
                            opacityFrom: .40,
                            opacityTo: .05,
                            stops: [100, 100]
                        }
                        }
                    }

                }
                
                /**
                    ==============================
                    |    @Render Charts Script    |
                    ==============================
                */

                /*
                =================================
                    Users By Category | Render
                =================================
                */
                var chart = new ApexCharts(
                    document.querySelector("#user_by_category"),
                    options
                );

                chart.render();

                /*
                    ===================================
                        user_data  | Script
                    ===================================
                */

                var d_1C_3 = new ApexCharts(
                    document.querySelector("#attendancePerMonth"),
                    d_1options1
                );
                d_1C_3.render();


                /*
                    ==============================
                        Statistics | Script
                    ==============================
                */


                // leaves

                var d_1C_5 = new ApexCharts(document.querySelector("#hybrid_followers"), d_1options3);
                d_1C_5.render()

                // absents

                var d_1C_6 = new ApexCharts(document.querySelector("#hybrid_followers1"), d_1options4);
                d_1C_6.render()

                // presents

                var d_1C_7 = new ApexCharts(document.querySelector("#hybrid_followers3"), d_1options5);
                d_1C_7.render()


                /**
                * =================================================================================================
                * |     @Re_Render | Re render all the necessary JS when clicked to switch/toggle theme           |
                * =================================================================================================
                */

                document.querySelector('.theme-toggle').addEventListener('click', function() {

                getcorkThemeObject = localStorage.getItem("theme");
                getParseObject = JSON.parse(getcorkThemeObject)
                ParsedObject = getParseObject;

                // console.log(ParsedObject.settings.layout.darkMode)

                if (ParsedObject.settings.layout.darkMode) {

                    /*
                        ==============================
                        |    @Re-Render Charts Script    |
                        ==============================
                    */

                    /*
                    ==================================
                        Users By Category | Options
                    ==================================
                    */

                    chart.updateOptions({
                        stroke: {
                        colors: '#0e1726'
                        },
                        plotOptions: {
                        pie: {
                            donut: {
                            labels: {
                                value: {
                                color: '#bfc9d4'
                                }
                            }
                            }
                        }
                        }
                    });
                
                    /*
                        ===================================
                            user_data  | Script
                        ===================================
                    */
                
                    d_1C_3.updateOptions({
                    grid: {
                            borderColor: '#191e3a',
                        },
                    })
                    
                    /*
                        ==============================
                            Statistics | Script
                        ==============================
                    */
                
                
                    // leaves

                    d_1C_5.updateOptions({
                        fill: {
                            type:"gradient",
                            gradient: {
                                opacityFrom: .30,
                            }
                        }
                    })
                
                    // absents

                    d_1C_6.updateOptions({
                        fill: {
                            type:"gradient",
                            gradient: {
                                opacityFrom: .30,
                            }
                        }
                    })
                
                    // presents

                    d_1C_7.updateOptions({
                        fill: {
                            type:"gradient",
                            gradient: {
                                opacityFrom: .30,
                            }
                        }
                    })
                    
                } else {
                    
                    /*
                        ==============================
                        |    @Re-Render Charts Script    |
                        ==============================
                    */

                        /*
                    ==================================
                        Users By Category | Options
                    ==================================
                    */

                    chart.updateOptions({
                        stroke: {
                        colors: '#fff'
                        },
                        plotOptions: {
                        pie: {
                            donut: {
                            labels: {
                                value: {
                                color: '#0e1726'
                                }
                            }
                            }
                        }
                        }
                    })
                
                    /*
                        ===================================
                            user_data  | Script
                        ===================================
                    */
                
                    d_1C_3.updateOptions({
                    grid: {
                            borderColor: '#e0e6ed',
                        },
                    })
                    
                    /*
                        ==============================
                            Statistics | Script
                        ==============================
                    */
                
                
                    // leaves

                    d_1C_5.updateOptions({
                        fill: {
                            type:"gradient",
                            gradient: {
                                opacityFrom: .40,
                            }
                        }
                    })
                
                    // absents

                    d_1C_6.updateOptions({
                        fill: {
                            type:"gradient",
                            gradient: {
                                opacityFrom: .40,
                            }
                        }
                    })
                
                    // presents

                    d_1C_7.updateOptions({
                        fill: {
                            type:"gradient",
                            gradient: {
                                opacityFrom: .40,
                            }
                        }
                    })

                }
                
            });


            } catch(e) {
                // statements
                console.log(e);
            }

            })
    </script>
@endsection