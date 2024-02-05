$(document).ready(function() {
    // Определение начального значения дней без несчастных случаев
    var dateWithoutAccidents = new Date('2020-02-13');
    var today = new Date();
    var interval = Math.floor((today - dateWithoutAccidents) / (1000 * 60 * 60 * 24));
    var hours, minutes, seconds, milliseconds;

    function updateClock() {
        var currentTime = new Date();
        hours = currentTime.getHours();
        minutes = currentTime.getMinutes();
        seconds = currentTime.getSeconds();
        milliseconds = currentTime.getMilliseconds();

        $("#daysCount").text("Количество дней без несчастных случаев: " + interval);
    }
    updateClock();
    setInterval(updateClock, 1);
});