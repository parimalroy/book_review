$(document).ready(function(){
    $('input, textarea').on({
        focus:function(){
            $(this).css('background-color','#f2f2f2');
        },
        blur:function(){
            $(this).css('background-color','white');
        }
    });
});