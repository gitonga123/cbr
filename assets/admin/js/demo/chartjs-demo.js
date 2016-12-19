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
            case_view();
        } else if (value === 'case_summary') {
            case_summary();
        } else if (value === 'sytem_user') {
            view_all_users();
        } else if (value === 'frequently_searched') {
            frequently_searched();
        } else {
            console.log("Frequenty Searched Case");
        }
    });
});

function case_view() {
    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/index.php/welcome/case_summary',
        data: {},
        type: 'post',
        datatype: 'json'

    }
    );
    srvRqst.done(function (responses)
    {

        var responseObj = $.parseJSON(responses);
        var disease_lables = Object.keys(responseObj);
        var disease_values = Object.keys(responseObj).map(function (k) {
            return responseObj[k];
        });
        var barData = {
            labels: disease_lables,
            datasets: [
                {
                    label: "Disease Count",
                    fillColor: "rgba(220,220,220,0.5)",
                    data: disease_values
                }
            ]
        };

        var barOption = {
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
        var ctx = document.getElementById("chartArea").getContext("2d");


        var myBarChat = new Chart(ctx, {
            type: 'bar',
            data: barData,
            options: barOption
        });
    });

}

function view_all_users() {

    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/user/view_all_users',
        data: {},
        type: 'post'
    });

    srvRqst.done(function (response) {
        $('div.reports_areas').html(response);
    });
}

function show_confirm(act, gotoid) {

    if (act === "edit_symptom") {

        var r = confirm("Do you really want to edit the Symptom?");
    } else if (act === "edit_disease") {

        var r = confirm("Do you really want to edit the Disease?");
    } else if (act === "delete_symptom") {

        var r = confirm("Do you really want to edit the Symptom?");
    } else if (act === "delete_disease") {

        var r = confirm("Do you really want to delete the Disease");
    } else if (act === "edit_user") {
        var r = confirm("Do you really want to edit the user?");
    } else {
        var r = confirm("Do yo really want to delete the user?");
    }

    if (r === true) {

        window.location = "index.php/welcome/" + act + "/" + gotoid;
    }
    //            function display_name() {
    //                console.log('Daniel Mutwiri');
    //            }
}
$(document).ready(function () {
    $("#new_user").click(function () {
        $("#myModal3").modal({backdrop: false});
    });
    $('form#add_new_user').on('submit', function (form) {
        form.preventDefault();
        $.post('index.php/welcome/new_user', $('form#add_new_user').serialize(), function (data) {
            $('div.user_error').html(data);
        });
    });
});

function alert_form() {

    $("#new_user").click(function () {
        $("#myModal3").modal({backdrop: false});
    });
}

function case_summary() {

//    var srvRqst = $.ajax({
//        url: 'http://localhost/cbr/welcome/unaccount_symptom',
//        data: {},
//        type: 'post'
//    });
//
//    srvRqst.done(function (response) {
//        $('div.reports_areas').html(response);
//    });
//    var srvRqst = $.ajax({
//        url: 'http://localhost/cbr/index.php/welcome/frequent_symptom',
//        data: {},
//        type: 'post',
//        datatype: 'json'
//
//    }
//    );
//    srvRqst.done(function (responses)
//    {
//
//        var responseObj = $.parseJSON(responses);
//        var disease_lables = Object.keys(responseObj);
//        var disease_values = Object.keys(responseObj).map(function (k) {
//            return responseObj[k];
//        });
//        var barData = {
//            labels: disease_lables,
//            datasets: [
//                {
//                    label: "Disease Count",
//                    fillColor: "rgba(220,220,220,0.5)",
//                    data: disease_values
//                }
//            ]
//        };
//
//        var barOption = {
//            scales: {
//                yAxes: [{
//                        scaleLabel: {
//                            display: true,
//                            labelString: 'Symptom Frequency'
//                        },
//                        ticks: {
//                            suggestedMin: 0
//                        }
//                    }]
//            }
//        };
//        var ctx = document.getElementById("chartArea").getContext("2d");
//
//
//        var myBarChat = new Chart(ctx, {
//            type: 'bar',
//            data: barData,
//            options: barOption
//        });
//    });


}

function frequently_searched() {
    var srvRqst = $.ajax({
        url: 'http://localhost/cbr/index.php/welcome/frequent_symptom_searches',
        data: {},
        type: 'post',
        datatype: 'json'

    }
    );
    srvRqst.done(function (responses)
    {
        console.log(responses);
        var responseObj = $.parseJSON(responses);
        var disease_lables = Object.keys(responseObj);
        var disease_values = Object.keys(responseObj).map(function (k) {
            return responseObj[k];
        });
        alert(disease_values);
        var barData = {
            labels: disease_lables,
            datasets: [
                {
                    label: "Disease Count",
                    fillColor: "rgba(220,220,220,0.5)",
                    data: disease_values
                }
            ]
        };

        var barOption = {
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
        var ctx = document.getElementById("chartArea").getContext("2d");


        var myBarChat = new Chart(ctx, {
            type: 'bar',
            data: barData,
            options: barOption
        });
    });
}