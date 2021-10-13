@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row mt-5 pt-6">
            
                <div class="col-md-12">
                    <div class="card card-stats mb-4 mb-xl-0">
                    <form method="POST" action="{{ route('dashboard.filter') }}">
                        @csrf
                        <div class="card-body row">
                            <select name="uni_id" id="select_domain" class="form-control col-5">
                                    <option value="">Select university</option>
                                    @foreach($domains as $uni => $domain)
                                        <option value="{{ $domain->id }}">{{ $domain->name_en }}</option>
                                    @endforeach
                            </select>
                            <button type="button" class='btn btn-info ml-2' id='token_login'>Login</button>
                            <button type="submit" class='btn btn-success ml-2' id='filter'>Filter</button>
                        </div>
                    </form>
                   
                    </div>
                </div>
            
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="doughnut-chart-container">
                            <canvas id="statechartcanvas-1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-4">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="doughnut-chart-container">
                            <canvas id="gender-chartcanvas-1"></canvas>
                        </div>
                        <h4 style="text-align:center">Total : {{ $studentcount }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                    <div class="doughnut-chart-container">
                            <canvas id="yearchartcanvas-2" height="134px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card card-stats mb-4 mb-xl-0">
                    
                    <div class="card-body">
                        <div id="mapcontainer" height="900px">
                        </div>
                    </div>
                    <h4 style="text-align:center">Total : {{ $studentcount }}</h4>
                </div>
            </div>
           
        </div>
        

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
<script>

$(document).ready(function() {
    
// start gender doughnut
    var data = <?php echo json_encode($gender) ?>;
    var ctx1 = $("#gender-chartcanvas-1");
    
    var data1 = {
      labels : ["Female", "Male"],
      datasets : [
        {
          label : "FEMALE",
          data : [data.female, data.male ],
          backgroundColor : [
                      "#4bc0c0",
                      "#fa9e3f",
                  ],
                  borderColor : [
                      "#FFFFFF",
                      "#FFFFFF",
                  ],
                  borderWidth : [1, 1]
        }
      ]
    };

    var options = {
      title : {
        display : true,
        position : "top",
        text : "Doughnut Chart",
        fontSize : 18,
        fontColor : "#111"
      },
      legend : {
        display : true,
        position : "bottom"
      }
    };

    var chart1 = new Chart( ctx1, {
      type : 'doughnut',
      data : data1,
      options : options
    });
// end gender doughnut

// start year chart
    var year = <?php echo json_encode($year) ?>;
    var year_keys = Object.keys(year);
    var year_values = Object.values(year);

    var labels = year_keys
    var data = {
    labels: labels,
    datasets: [{
        label: 'Student Applied Year',
        data: year_values,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1,
        backgroundColor : '#f24e69'
    }]
    };

    var yearchart = $("#yearchartcanvas-2");
    var yearchart = new Chart ( yearchart, {
        type: 'bar',
        data: data,
    })

//  end year chart

// start state chart
    var state = <?php echo json_encode($state) ?>;
    var state_keys = Object.keys(state);
    var state_values = Object.values(state);

    var labels = state_keys
    var data = {
    labels: labels,
    datasets: [{
        label: 'State',
        data: state_values,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1,
        
    }]
    };

    var statechart = $("#statechartcanvas-1");
    var statechart = new Chart ( statechart, {
        type: 'line',
        data: data,
    })

//  end state chart

//    start map 
var datas = <?php echo json_encode($states) ?>;

var state_vals = Object.entries(datas);

var data = state_vals;

// Create the chart
Highcharts.mapChart('mapcontainer', {
    chart: {
        map: 'countries/mm/mm-all'
    },

    title: {
        text: 'Map'
    },

    subtitle: {
        text: ''
    },

    mapNavigation: {
        enabled: true,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    },

    colorAxis: {
        min: 0
    },

    series: [{
        data: data,
        name: '',
        states: {
            hover: {
                color: '#BADA55'
            }
        },
        dataLabels: {
            enabled: true,
            format: '{point.name}'
        }
    }]
});
// end map

});

var domain;
var token;

$('#select_domain').on('change', function(){
    $("#token_login").attr("disabled", true);
    var uni = $("#select_domain option:selected").text()
    
    $.ajax({
    url: "/domain/"+uni,
    success: function(data){
        // $("#email").val(data.email);
        // $("#password").val(data.password);
        // $("#domain").attr('action', data.domain + "/admin/login");
        domain = data.domain;
        $.ajax({
            url: data.domain+ '/api/token',
            success: function(response)
            {
               
                if(typeof response == 'string')
                {
                    $("#token_login").attr("disabled", false);
                }else
                {
                    $("#token_login").attr("disabled", true);
                }
                token = response;
                sessionStorage.setItem('access-token', response);
                
            }
        })
    }
    });

    $('#token_login').click(() => {
        // $.ajax({
        // url: domain +"/api/token/login/"+ token,
        // success: function(data){
        //     window.location.href = domian + '/admin'
        // }
        // });
        window.location.href =  domain +"/token/login/"+ token
    })
                
   



})




</script>
@endpush


