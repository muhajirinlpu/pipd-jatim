/**
 * Created by someone on 21/10/2016.
 */
$(function(){
    var fn = {
        initSlider : function(){
            var size;
            $.getJSON("./api.php?do=getSlider",function(data){
                $.each(data['message'],function (a,b) {
                    var div = $("<div></div>").css({
                        "backgroundImage" : "url('assets/pic/"+ b.pic_name +"')"
                    }).attr("data-action",a);
                    var h1 = $("<h2></h2>").html(b.title);
                    var p = $("<p></p>").html(b.descrip.substr(0,190)+"... ");
                    var a = $("<a></a>").attr("href","./?p=detail&title="+ b.slug).html("selengkapnya");
                    $(a).appendTo(p);
                    $(h1).appendTo(div);
                    $(p).appendTo(div);
                    $(div).appendTo("#slider");
                });
                size = data['message'].length;
            });

            var a = 0;
            setInterval(function(){
                $("#slider > div[data-action="+a+"]").fadeOut();
                if (a == 0) a = size;
                $("#slider > div[data-action="+(--a)+"]").fadeIn();
            },5000);
        },

        loadPlace : function(page){
            var url = "./api.php?do=getPlaces&page="+page;
            $.getJSON(url,function(data){
                if (data['message']['data'].length != 0){
                    $.each(data['message']['data'],function(a,b){
                        var div = $("<div></div>").addClass("place-contents");
                        var img = $("<img>").attr("src","./assets/pic/"+ b.pic_name).css({"width":"200px","height":"130px"});
                        var span= $("<span></span>").html("<h2>"+ b.title+"</h2><p>"+ b.descrip.substr(0,100)+"</p>");
                        var a   = $("<a></a>").attr("href","./?p=detail&title="+b.slug).html("Selengkapnya");
                        $(img).appendTo(div);
                        $(span).appendTo(div);
                        $(a).appendTo(div);
                        $(div).appendTo(".container");
                    });
                }
            });
        }
    };

    //fn start
    fn.initSlider();

   /* var page = 1;
    $(window).scroll(function(){
        if ($(window).scrollTop() == $(document).height() - $(window).height()){
            fn.loadPlace(page);
            page++;
        }
    });*/



    var fun = false;
    $(".fun-pic").bind("click",function(){
        if (!fun) {
            $(this).css({
                "transform" : "scale(3)",
                "position"  : "fixed",
                "top"       : "40%",
                "transition": "0.5s",
                "z-index"   : "100"
            }).addClass("center");
            fun = true;
        }else{
            $(this).removeAttr("style").removeClass("center");
            fun = false;
        }
    });

    $(".confirm").bind("click",function(){
        var conf = confirm($(this).data("msg"));
        if(conf) window.location = $(this).data("action");
    });

    $(".menu-btn").bind("click",function(){
        $("#menu").slideToggle(400);
    });

});