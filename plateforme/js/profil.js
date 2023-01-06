$(document).ready(function(){

    var myVar = setInterval(myTimer, 1000);
    function myTimer(){
        var d = new Date();
        var x = d.toLocaleTimeString();
        $('.heur').html(x);
        var o = $('.heur').text();
        if(o === '14:19:00'){
            //alert('bonjour ceci est une alert pour vous avertir ...');
            console.log(o)
        }
    }

    $("#demo-calendar-apppearance").zabuto_calendar({
        header_format: '[year] // [month]',
        week_starts: 'sunday',
        show_days: true,
        today_markup: '<span class="badge bg-primary">[day]</span>',
        navigation_markup: {
            prev: '<i class="fas fa-chevron-circle-left"></i>',
            next: '<i class="fas fa-chevron-circle-right"></i>'
        }
    });

});