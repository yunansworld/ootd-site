$(".menu_btn_box li").on("click",function(){
    console.log("ddd");
    $(".menu_btn_box > li").removeClass("active");
    $(this).addClass("active");
});

$(document).ready(function(){
    console.log("hi");
    $('img[usemap]').rwdImageMaps();
});
