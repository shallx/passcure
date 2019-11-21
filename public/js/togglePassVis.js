$(document).ready(function(){

    $(".showAllBtn").click(function(){
        var input = $('.form-control-plaintext');
        var button = $(this).children("i");
        if(input.attr("type") == "password"){
            input.prop('type', 'text');
            button.addClass("fa-eye-slash");
        }
        else{
            input.prop('type','password');
            button.removeClass("fa-eye-slash");
        }
        
    });
    $(".showBtn").click(function(){
        
        var data = ".pass" + $(this).attr("data-id");
        var input = $(data).children('input');
        var button = $(this).children("i");
        if(input.attr('type') == "password") {
            input.prop('type','text');
            button.addClass("fa-eye-slash")
        }
        else {
            input.prop('type','password');
            button.removeClass("fa-eye-slash");
        }    
    });

});