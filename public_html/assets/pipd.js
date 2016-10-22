/**
 * Created by someone on 21/10/2016.
 */
$(function(){

    $(".confirm").bind("click",function(){
        var conf = confirm($(this).data("msg"));
        if(conf) window.location = $(this).data("action");
    });

});