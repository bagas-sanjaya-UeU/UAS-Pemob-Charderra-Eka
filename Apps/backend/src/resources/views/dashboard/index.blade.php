@extends('dashboard')

@section('title', 'Dashboard')

@section('chart')

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            function grafikSkorTotalperHari() {
                let categories = Object.values(@json($tanggal));
                let skor_total_hari_ini = Object.values(@json($skor_total_hari_ini));

                let options = {
                    series: [{
                        name: 'Skor Total Hari Ini',
                        data: skor_total_hari_ini,
                    }],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        title: {
                            text: 'Tanggal di bulan {{ date('F') }}'
                        },
                        categories: categories,
                    },
                    yaxis: {
                        title: {
                            text: 'Total Skor Responden'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " Skor"
                            }
                        }
                    }
                };

                let chart = new ApexCharts(document.querySelector("#barangHarian"), options);
                chart.render();
            }






            grafikSkorTotalperHari();
           
        });
    </script> --}}

@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class='bx bx-box' style="font-size: 50px;"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="#">View
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Atlit</span>
                                <h3 class="card-title text-nowrap mb-1">--</h3>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class='bx bx-edit' style="font-size: 50px;"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">


                                            <a class="dropdown-item" href="#">View More</a>


                                        </div>
                                    </div>
                                </div>
                                <span>Laporan</span>
                                <h3 class="card-title text-nowrap mb-1">--</h3>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!-- Total Revenue -->
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">Grafik Donasi Harian</h5>
                            <div id="barangHarian" class="px-2"></div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->
            {{-- <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Jenis Rawat</h5>
                                        </div>

                                        <div id="jenisRawat"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Jenis Tanggungan</h5>
                                        </div>

                                        <div id="jenisTanggungan"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
@endsection
