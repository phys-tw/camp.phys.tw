$(function(){
    $(window).resize(function(){
        resizing();
    });
    resizing();
});
function resizing() {
    var myHeight = document.documentElement.clientHeight;
    var setHeight = myHeight-$("#footer").height()-10-30;
    $("#site_content").height(setHeight);
    $(".sidebar").height(setHeight);
    $("#header").height(setHeight+30);
    
    var myWidth = document.documentElement.clientWidth;
    var setWidth = myWidth - $("#header").width()-60;
    $("#site_content").width(setWidth);
    //$("#content").width(setWidth-$(".sidebar").width()-30);
    //$("#content").height(setHeight);
}