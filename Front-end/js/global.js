var windowSize;

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
    windowSize = $( window ).height();
    console.log(windowSize);

    if(windowSize > 535)
    {
        console.log(windowSize);
    }
});