$(window).on('resize', function(){
    checkPosition();
});
$(window).on("load", function () {
	checkPosition();
});
function checkPosition() {
	ResetPosition();
    if (window.matchMedia('(min-width: 768px)').matches) {
        $(document).on('click','.res_menu',function(event){
			 event.preventDefault();
            if(!$(this).hasClass('res_menu_on')){
             $(this).addClass('res_menu_on');
             $(this).find('i').removeClass('bi-list');
             $(this).find('i').addClass('bi-x-lg');
             $('.admin_aside').addClass('admin_aside_on');
             $('.admin_right').addClass('admin_right_on');
            }
            else{
                $('.admin_right').removeClass('admin_right_on');
				$('.admin_aside').removeClass('admin_aside_on');
				$(this).removeClass('res_menu_on');
				$(this).find('i').addClass('bi-list');
				$(this).find('i').removeClass('bi-x-lg');      
            }
         })
    } 
    else{
        $(document).on('click','.res_menu',function(event){
			 event.preventDefault();
            if(!$(this).hasClass('res_menu_on')){
             $(this).addClass('res_menu_on');
             $(this).find('i').removeClass('bi-list');
             $(this).find('i').addClass('bi-x-lg');
             $('.admin_aside').addClass('admin_aside_mobile_on');
            }
            else{
             $('.admin_aside').removeClass('admin_aside_mobile_on');
             $(this).removeClass('res_menu_on');
             $(this).find('i').addClass('bi-list');
             $(this).find('i').removeClass('bi-x-lg');      
            }
         })
    }
}

function ResetPosition(){
   $('.res_menu').removeClass('res_menu_on');
   $('.res_menu').find('i').addClass('bi-list');
   $('.res_menu').find('i').removeClass('bi-x-lg');  
   $('.admin_aside').removeClass('admin_aside_on');
	$('.admin_aside').removeClass('admin_aside_mobile_on');   
   $('.admin_right').removeClass('admin_right_on');
}
