    jQuery(document).ready(function () {
        $("html, body").animate({scrollTop: $("#scrol").offset().top}, 700);
        console.log('executed scrollToElement');
        return true;
    });
    
        function DoPost(id) {
        $.post("main", {id_room: id});  //Your values here..
    }
