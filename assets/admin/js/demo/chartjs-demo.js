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
                    ticks:{
                        suggestedMin: 0
                    }
                }]
        }
    };

    var ctx = document.getElementById("lineChart").getContext("2d");
    var myNewChart = new Chart(ctx,{
        type: 'line',
        data: lineData,
        options: lineOptions
    });
   
}