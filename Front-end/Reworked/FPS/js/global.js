var windowSize;

function refresh(id) {
    setTimeout(function () {
        windowHeight = $(window).height();
        windowWidth = $(window).width();
        console.log(windowHeight);
        console.log(windowWidth);

        if (windowWidth < 710) {
            $("#responsivePic").attr("src", "./img/narrowMap.png");
            $('#responsivePic').width(windowWidth);
            $('#responsivePic').height(windowHeight);
            console.log("maziau");
        }
        else {
            $("#responsivePic").attr("src", "./img/wideMap.png");
            $('#responsivePic').width(windowWidth);
            $('#responsivePic').height(windowHeight);
            console.log("daugiau");
        }
        $("#Park" + id).css("opacity", "1");
        $("#Park" + id).fadeIn(250).fadeOut(250).fadeIn(250).fadeOut(250).fadeIn(250)
                        .fadeOut(250).fadeIn(250).fadeOut(250).fadeIn(250).fadeOut(250).fadeIn(250);
    }, 20);

   
}

function updateClock() {
    var currentTime = new Date();
    var currentHours = currentTime.getHours();
    var currentMinutes = currentTime.getMinutes();
    var currentSeconds = currentTime.getSeconds();
    var currentYear = currentTime.getFullYear();
    var currentMonth = currentTime.getMonth() + 1;
    var currentDay = currentTime.getDay();

    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

    switch (currentMonth) {
        case 1:
            currentMonth ="Jan";
            break;
        case 2:
            currentMonth ="Feb";
            break;
        case 3:
            currentMonth ="Mar";
            break;
        case 4:
            currentMonth ="Apr";
            break;
        case 5:
            currentMonth ="May";
            break;
        case 6:
            currentMonth ="Jun";
            break;
        case 7:
            currentMonth ="Jul";
            break;
        case 8:
            currentMonth ="Aug";
            break;
        case 9:
            currentMonth ="Sep";
            break;
        case 10:
            currentMonth ="Oct";
            break;
        case 11:
            currentMonth ="Nov";
            break;
        case 12:
            currentMonth ="Dec";
            break;
    }

    if(currentHours < 10)
    {
        currentHours = "0" + currentHours;
    }

    var currentTimeString = currentTime.getDate() + "-" + currentMonth + " " + currentHours + ":" + currentMinutes + ":" + currentSeconds;

   	$("#clock").html('('+currentTimeString+')');
}

$(document).ready(function () {
    setInterval('updateClock()', 1000);
});

$(document).ready(function(){
    updateClock();
    windowHeight = $(window).height();
    windowWidth = $(window).width();
    console.log(windowHeight);
    console.log(windowWidth);

    if (windowWidth < 710) {
        $("#responsivePic").attr("src", "./img/narrowMap.png");
        $('#responsivePic').width(windowWidth);
        $('#responsivePic').height(windowHeight);
        console.log("maziau");
    }
    else {
        $("#responsivePic").attr("src", "./img/wideMap.png");
        $('#responsivePic').width(windowWidth);
        $('#responsivePic').height(windowHeight);
        console.log("daugiau");
    }
    $('.glyphicon-map-marker, #mapView').click(function () {
        setTimeout(function () {
            windowHeight = $(window).height();
            windowWidth = $(window).width();
            console.log(windowHeight);
            console.log(windowWidth);

            if (windowWidth < 710) {
                $("#responsivePic").attr("src", "./img/narrowMap.png");
                $('#responsivePic').width(windowWidth);
                $('#responsivePic').height(windowHeight);
                console.log("maziau");
            }
            else {
                $("#responsivePic").attr("src", "./img/wideMap.png");
                $('#responsivePic').width(windowWidth);
                $('#responsivePic').height(windowHeight);
                console.log("daugiau");
            }
        }, 20);
    });
});

