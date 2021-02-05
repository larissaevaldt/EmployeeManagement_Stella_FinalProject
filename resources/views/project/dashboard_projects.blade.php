@extends('main')

@section('title', 'Dashboard')

@section('styleAdd')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/project.css')}}">
@endsection

@section('body')
@include('partials._nav_search') 
	<div class="container">
	    <div class="py-4 w-100">
	        <div class="pt-1 mt-3 text-center heading-text-color">
	            <label class="h1 ml-5">Welcome back,&nbsp</label>
				<label class="h1">{{ Auth::user()->name}}</label>
	            <label class="h1">!</label>
	        </div>
	        {{-- <div class="mt-1 text-center">
	            <label class="h1 ml-5 pb-2 heading-text-color">Check our on-going projects at the moment</label>
	        </div> --}}
	        <div class="mt-1 text-center">
	            <label class="h3 ml-5 pb-2 text-color">Click on the event to get more information</label>
	        </div>

            <div class="Piechart">
                @foreach($projects as $project)
                {{-- PUT THE PIE CHART HERE!!!! --}}
                <div class="col-xl-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container">
                                <p>Company: {{  $project->company->name}}</p> 
                                <div class="chart has-fixed-height" id="pie_basic_{{$project->id}}" >
                                </div>
                                <p>Number of Messages sent: {{  $project->sent }}</p>
                                <p>Accepted: {{  $project->found }}</p>
                                <p>Denied: {{  $project->denied }}</p>
                            </div>
                        </div>
                    </div>
                </div>	
	         @endforeach
            </div>
	    </div>
	</div>
</div>
@endsection
@section('scriptAdd')
<script type="text/javascript">
    $(window).bind("load", function() {
        // code here
        var projects = @json($projects);
        console.log(projects);
        var pie_basic_element;
        var pie_basic;

        for(var i=0; i<projects.length; i++) {
            var cssId = `pie_basic_${projects[i].id}`;
            console.log(cssId);
            pie_basic_element = document.getElementById(cssId);
            console.log(pie_basic_element);
            if (pie_basic_element) {
                pie_basic = echarts.init(pie_basic_element)
                console.log(pie_basic)
                pie_basic.setOption({
                    // color: [
                    //     '#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
                    //     '#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
                    //     '#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
                    //     '#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
                    // ],          
                
                    textStyle: {
                        fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                        fontSize: 13
                    },

                    title: {
                        text: `Project Id: ${projects[i].id}`,
                        left: 'center',
                        textStyle: {
                            fontSize: 17,
                            fontWeight: 500
                        },
                        subtextStyle: {
                            fontSize: 12
                        }
                    },

                    tooltip: {
                        trigger: 'item',
                        backgroundColor: 'rgba(0,0,0,0.75)',
                        padding: [10, 15],
                        textStyle: {
                            fontSize: 13,
                            fontFamily: 'Roboto, sans-serif'
                        },
                        formatter: "{a} <br/>{b}: {c} ({d}%)"
                    },

                    legend: {
                        orient: 'horizontal',
                        bottom: '0%',
                        left: 'center',                   
                        data: ['Found','Denied'],
                        itemHeight: 8,
                        itemWidth: 8
                    },

                    series: [{
                        name: 'Messages Statistics',
                        type: 'pie',
                        radius: '70%',
                        center: ['50%', '50%'],
                        itemStyle: {
                            normal: {
                                borderWidth: 1,
                                borderColor: '#fff'
                            }
                        },
                        data: [
                            {value: projects[i].found, name: 'Found'},
                            {value: projects[i].denied, name: 'Denied'}
                        ]
                    }]
                });
            }

        }
    });
</script>
@endsection