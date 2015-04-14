/**
 * Created by Demitry on 12.04.2015.
 */

$(document).ready(function () {
    var lang;

// check localstorage, if empty - set def val = 'en'
    var hasStorage = true;
    if (!localStorage.getItem("lang")) {
        var hasStorage = (function () {
            try {
                localStorage.setItem("lang", 'en');
                return true;
            } catch (e) {
                return false;
            }
        }());
    }

//set to localStorage from buttons
    $("button").click(function () {
            lang = $(this).val();
            localStorage["lang"] = JSON.stringify(lang);
        }
    );
////////////////////////////////////////////////////////////

//get from local storage and send to server

    //$.post('/', {lang: localStorage["lang"]}, function(response) {
    //    // Log the response to the console
    //    //console.log("Response: "+response);
    //});

    //$.post('', { lang: localStorage["lang"]}).done(function(data) {
    //    console.log(data);
    //});

    //$.ajax
    //({
    //    type: "POST",
    //    url: "",
    //    data: localStorage["lang"],
    //    success: function () {
    //        console.log("Order Submitted");
    //    }
    //});
});
