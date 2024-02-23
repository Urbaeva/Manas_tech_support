@extends('admin.layouts.main')
@section('content')
    <div >
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">{{ $video->title }}</h4>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Statistic</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apex-basic"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <video style="width: 700px; height: 400px;" controls>
                            <source src="{{ route('user.service.getVideo', $video->id) }}">
                        </video>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        let aylar =  ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',  'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        getData();
        function getData(){
            let url = "{{ route('admin.video.statistic.video') }}";
            let data = new FormData();
            data.append('video_id', "{{ $video->id }}");
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                body: data
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    let views = data.data.viewsCounts;
                    let months = data.data.months;
                    console.log(months);
                    for (let i = 0; i < months.length; i++) {
                        months[i] = aylar[parseInt(months[i])-1];
                    }
                    document.getElementById('apex-basic').innerHTML = '';
                    displayChart(views, months);
                });
        }

        function displayChart(data, months) {
            options = {
                chart: {
                    height: 350,
                    type: "line",
                    zoom: {
                        enabled: !1
                    }
                },
                colors: ["#4788ff"],
                series: [{
                    name: "Views",
                    data: data
                }],
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "straight"
                },
                title: {
                    text: "Video view statistic",
                    align: "left"
                },
                grid: {
                    row: {
                        colors: ["#f3f3f3", "transparent"],
                        opacity: .5
                    }
                },
                xaxis: {
                    categories: months
                }
            };
            if(typeof ApexCharts !== typeof undefined){
                (chart = new ApexCharts(document.querySelector("#apex-basic"), options)).render()
                const body = document.querySelector('body')
                if (body.classList.contains('dark')) {
                    apexChartUpdate(chart, {
                        dark: true
                    })
                }

                document.addEventListener('ChangeColorMode', function (e) {
                    apexChartUpdate(chart, e.detail)
                })
            }
        }

    </script>
@endsection
