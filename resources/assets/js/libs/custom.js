$(document).ready(function() {


    
    $(".orange").on("mouseover",function() {
        $(this).css({
            "color":"orange",
            "border-bottom":"3px solid green"
            });
    });
    $(".orange").on("mouseleave",function() {
        $(this).css({
            "color":"gray",
            "border-bottom":"none"
            });
    });
});