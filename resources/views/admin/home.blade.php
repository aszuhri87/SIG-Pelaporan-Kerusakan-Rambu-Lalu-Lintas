@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
                <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ __('Laporan') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['laporan'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

           <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ __('Diperbaiki') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['fix'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-double fa-2x text-gray-300"></i>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{ __('Belum Diperbaiki') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['unfix'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('Pelapor') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['pelapor'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </div>


        <!-- Users -->


    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>
                </div>
                <div class="card-body">
                    <div class="content">
                          <div id="chartCont">



                          </div><!-- /.container-fluid -->
                        </div>

                        <!-- /.content -->
                      </div>
                      
                </div>
            </div>

    </div>

  <script src="{{asset('/js/highcharts.js')}}"></script>

<script type="text/javascript">



     var pe = <?php echo json_encode($data)?>;



    Highcharts.chart('chartCont', {
        chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'column'
    },
        title: {
            text:'Grafik laporan '+'{{ now()->year }}'
        },
        subtitle: {
            text: 'SI Prambu'
        },
         xAxis: {

            categories: [pe["label"][0],pe["label"][1],pe["label"][2],pe["label"][3],pe["label"][4],pe["label"][5],pe["label"][6],pe["label"][7],pe["label"][8],pe["label"][9],pe["label"][10],pe["label"][11]]
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Jumlah Laporan'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
        },
        series: [{
            name: 'Jumlah laporan/ bulan',

            data: [pe["data"][0],pe["data"][1],pe["data"][2],,pe["data"][3],pe["data"][4],pe["data"][5],pe["data"][6],pe["data"][7],pe["data"][8],pe["data"][9],pe["data"][10],pe["data"][11]],
             dataGrouping: {
                enabled: false
            }
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>

@endsection



