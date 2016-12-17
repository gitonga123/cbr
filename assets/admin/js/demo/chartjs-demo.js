$(document).ready(function () {
    $("#search_result_diagnosis").hide();
});

function view_graph(data, data2) {
    $("#search_result_diagnosis").show();
    var lineData = {
        labels: data2,
        datasets: [
            {
                label: "Example dataset",
                fillColor: "rgba(75,192,192,0.4)",
                strokeColor: "rgba(26,179,148,0.7)",
                pointColor: "rgba(26,179,148,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(26,179,148,1)",
                data: data
            }
        ]
    };

    var lineOptions = {

        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
        scales: {
            yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Symptom Frequency'
                    },
                    ticks: {
                        suggestedMin: 0
                    }
                }]
        }
    };

    var ctx = document.getElementById("lineChart").getContext("2d");
    var myNewChart = new Chart(ctx, {
        type: 'line',
        data: lineData,
        options: lineOptions
    });

}

$(document).ready(function () {
    $('#searchReport').on('change', function () {
        var value = $(this).val();
        if (value === 'case_view') {
            console.log('Case View');
        } else if (value === 'case_summary') {
            case_summary();
        } else if (value === 'sytem_user') {
            console.log('System User');
        } else if (value === 'frequently_searched') {
            console.log('Frequently Searched');
        } else {
            console.log("Frequenty Searched Case");
        }
    });
});

function case_summary() {
    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/index.php/welcome/disease_summary_case',
        data: {},
        type: 'post',
        datatype: 'json'

    }
    );
   
   
   //var obj=JSON.parse(srvRqst,reviver);
   console.log(srvRqst);

    var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Disease Count",
                fillColor: "rgba(220,220,220,0.5)",
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ]
    }


    var ctx = document.getElementById("chartArea").getContext("2d");

    var myBarChat = new Chart(ctx, {
        type: 'bar',
        data: barData
    });
}

