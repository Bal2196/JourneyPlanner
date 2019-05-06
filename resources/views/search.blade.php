@extends('layout')

@section('content')
<script>
function save_journey() {
    var content = $('#journey').html();

    $.ajax({
        type: 'POST',
        url: '/',
        data: {
            content: content
        },
        success: function(data) {}
    })
}

$.ajax({
    type: 'GET',
    url: "https://api.tfl.gov.uk/Journey/JourneyResults/{{ $start_code }}/to/{{ $end_code }}?app_id={{ env('TFL_ID', '') }}&app_key={{ env('TFL_KEY', '') }}",
    dataType: 'json',
    success: function(data) {
        var date = new Date().toString("dd/MM/yyyy");
        var startTime = new Date(data['journeys'][0]['startDateTime']).toString("H:mm");
        var endTime = new Date(data['journeys'][0]['arrivalDateTime']).toString("H:mm");
        var duration = data['journeys'][0]['duration'] + " mins";

        $('#journey').append("<h2>Your walk to <span class='highlight'>{{ $end_code }}</span></h2>");
        $('#journey').append("<p><b>" + date + "</b></p>");
        $('#journey').append("<p><b>Start time</b>" + "&emsp;" + startTime + "&emsp;&emsp;&emsp;" +
                            "<b>End time</b>" + "&emsp;" + endTime + "&emsp;&emsp;&emsp;" +
                            "<b>Duration</b>" + "&emsp;" + duration + "</p>");

        $('#journey').append("<p><b>Directions</b></p>");
        $.each(data['journeys'][0]['legs'][0]['instruction']['steps'], function(key, value) {
            var direction = value.turnDirection.charAt(0).toUpperCase() + value.turnDirection.substr(1).toLowerCase();
            $('#journey').append("<li><span class='font-med'>" + direction + " " + value.description + "</span></li>");
        });
            $('#journey').append("<li><span class='font-med'>You have now arrived</span></li>");
    }
});
</script>
<div id="journey"></div>
<button onclick="save_journey()">Save journey</button>
@endsection