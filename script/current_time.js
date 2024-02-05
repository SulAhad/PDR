var hour = 0;
var min = 0;
var sec = 0;

function currentTime() 
{
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();
    hour = date.getHours();
    min = date.getMinutes();
    sec = date.getSeconds();
    hour = updateTime(hour);
    min = updateTime(min);
    sec = updateTime(sec);
    day = updateTime(day);
    month = getMonthName(month);
    // document.getElementById("clock").innerHTML = hour + " : " + min + " : " + sec;
    document.getElementById("clock").innerHTML = hour + " : " + min;
    var t = setTimeout(function(){ currentTime() }, 1000);
}

function updateTime(k) 
{
    if (k < 10) {
        return "0" + k;
    }
    else 
    {
        return k;
    }
}

function getMonthName(month) 
{
    var months = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
    return months[month];
}

currentTime();