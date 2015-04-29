function DoPost(id) {
    $.post("main", {id_room: id});  //Your values here..
}
function myFunction(id) {
    window. open("details/"+id, "_blank", "toolbar=no, location=no, scrollbars=yes, resizable=yes, top=500, left=500, width=600, height=400");
}

//function myFunction() {
//    window. open("details/", "_blank", "toolbar=no, location=no, scrollbars=yes, resizable=yes, top=500, left=500, width=600, height=400");
//}

$('.collapse').on('show.bs.collapse', function () {
    $('.collapse.in').collapse('hide');
});

jQuery(document).ready(function () {
        $("html, body").animate({scrollTop: $("#scrol").offset().top}, 700);
        console.log('executed scrollToElement');
        return true;
    });


