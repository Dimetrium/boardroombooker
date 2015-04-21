/**
 * Created by Demitry on 18.04.2015.
 */
function initialCalendar() {
    var hr = new XMLHttpRequest();
    var url = "/main";
    var currentTime = new Date();
    var month = currentTime.getMonth() + 1;
    var year = currentTime.getFullYear();
    showmonth = month;
    showyear = year;
    var vars = "showmonth=" + showmonth + "&showear=+" + showyear;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (4 == hr.readyState && 200 == hr.status) {
            var return_data = hr.responseText;
            document.getElementById("showCalendar").innerHTML = return_data;
        }
    }
    hr.send(vars);
    //document.getElementById("showCalendar").innerHTML = "processing...";
}

function nextMonth() {
    var nextmonth = showmonth + 1;
    if (nextmonth > 12) {
        nextmonth = 1;
        showyear = showyear + 1;
    }
    showmonth = nextmonth;
    var hr = new XMLHttpRequest();
    var url = "/main";
    var vars = "showmonth=" + showmonth + "&showear=+" + showyear;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (4 == hr.readyState && 200 == hr.status) {
            var return_data = hr.responseText;
            document.getElementById("showCalendar").innerHTML = return_data;
        }
    }
    hr.send(vars);
    document.getElementById("showCalendar").innerHTML = "processing...";
}

function lastMonth() {
    var lastmonth = showmonth - 1;
    if (lastmonth < 1) {
        lastmonth = 12;
        showyear = showyear - 1;
    }
    showmonth = lastmonth
    ;
    var hr = new XMLHttpRequest();
    var url = "/main";
    var vars = "showmonth=" + showmonth + "&showear=+" + showyear;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (4 == hr.readyState && 200 == hr.status) {
            var return_data = hr.responseText;
            document.getElementById("showCalendar").innerHTML = return_data;
        }
    }
    hr.send(vars);
    document.getElementById("showCalendar").innerHTML = "processing...";
}