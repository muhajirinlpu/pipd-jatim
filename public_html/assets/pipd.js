/**
 * Created by someone on 21/10/2016.
 */
$(function(){

    var musicStat = false ;
    var music = new Audio("assets/1.mp3");

    var fn = {
        initSlider : function(){
            var size;

            $.getJSON("./prcs.php?do=getSlider",function(data){
                $.each(data['message'],function (a,b) {
                    var div = $("<div></div>").css({
                        "backgroundImage" : "url('assets/pic/"+ b.pic_name +"')"
                    }).attr("data-action",a);
                    var h1 = $("<h2></h2>").html(b.title);
                    var p = $("<p></p>").html(b.descrip.substr(0,140)+"... ");
                    var a = $("<a></a>").attr("href","./?p=detail&title="+ b.slug).html("selengkapnya").css({"color":"white"});
                    var container = $("<div></div>");
                    $(h1).appendTo(container);
                    $(p).appendTo(container);
                    $(a).appendTo(container);
                    $(container).appendTo(div);
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
        },

        initMusic : function () {
            if(!musicStat) {
                music.play();
                musicStat = true;
            }else{
                music.pause();
                musicStat = false;
            }
        }

    };

    //fn start
    fn.initSlider();

    /*if(window.location.search = "?p=home"){
    }*/
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

    $("input[name=komen-btn]").bind("click",function(){
        var text = $("#komen-txt").val();
        console.log(text);
        if (users_id == null || contents_id == null){
            alert("login untuk memberi komentar");
        }else{
            $.ajax({
                url : "./prcs.php?user&do=giveComment",
                method : "post",
                data : {
                    author : users_id,
                    contents_id : contents_id,
                    text : text
                },
                dataType : "json",
                success : function(data){
                    console.log(data);
                    alert(data['message']);
                }
            });
        }
        $("#komen-txt").val('');
    });

    $(".confirm").bind("click",function(){
        var conf = confirm($(this).data("msg"));
        if(conf) window.location = $(this).data("action");
    });

    $(".menu-btn").bind("click",function(){
        $("#menu").slideToggle(400);
    });

    $("#login-btn").bind("mouseover",function(){
        $("#login").fadeIn(300);
        $(this).css({
            "backgroundColor":"#EF6C00"
        });
    });

    $("#login").bind("mouseleave",function(){

        $(this).fadeOut();
    });

    $(document).bind("keydown",function(e){
        if(e.keyCode == 77) fn.initMusic();
    });

});