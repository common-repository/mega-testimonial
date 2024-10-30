/**
 * 
 * @file admin-script.js
 * @description All the script here will be included in admin panel
 * 
 * */
(function($){
$(document).ready(function(){
    
// Custom admin theme option js code 
$('.btn-radio').click(function(e) {
    $('.btn-radio').not(this).removeClass('active')
        .siblings('input').prop('checked',false)
        .siblings('.img-radio').css('opacity','0.5');
    $(this).addClass('active')
        .siblings('input').prop('checked',true)
        .siblings('.img-radio').css('opacity','1');
});
   
})
})(jQuery);

