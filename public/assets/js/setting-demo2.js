"use strict";

// Setting Color

$(window).resize(function() {
	$(window).width(); 
	customCheckColor();
});

$(document).ready(function(){
	$('.changeSidebarColor').on('click', function(){
		if($(this).attr('data-color') == 'default'){
			$('.sidebar').removeAttr('data-background-color');
		} else {
			$('.sidebar').attr('data-background-color', $(this).attr('data-color'));
		}

		$(this).parent().find('.changeSidebarColor').removeClass("selected");
		$(this).addClass("selected");
		customCheckColor();
		layoutsColors();
	});
})


$('.changeLogoHeaderColor').on('click', function(){
	if($(this).attr('data-color') == 'default'){
		$('.main-header .logo-header').removeAttr('data-background-color');
	} else {
		$('.main-header .logo-header').attr('data-background-color', $(this).attr('data-color'));
	}

	$(this).parent().find('.changeLogoHeaderColor').removeClass("selected");
	$(this).addClass("selected");
	customCheckColor();
	layoutsColors();
});

$('.changeTopBarColor').on('click', function(){
	if($(this).attr('data-color') == 'default'){
		$('.main-header .navbar-header').removeAttr('data-background-color');
	} else {
		$('.main-header .navbar-header').attr('data-background-color', $(this).attr('data-color'));
	}

	$(this).parent().find('.changeTopBarColor').removeClass("selected");
	$(this).addClass("selected");
	layoutsColors();
});

$('.changeBackgroundColor').on('click', function(){
	$('body').removeAttr('data-background-color');
	$('body').attr('data-background-color', $(this).attr('data-color'));
	$(this).parent().find('.changeBackgroundColor').removeClass("selected");
	$(this).addClass("selected");
});

// Change Image Background

var imagePick = '../../assets/img/sidebar-images/1.jpg';

function changeImage(){
	if ($('input#custom-image-background').is(':checked')) {
		$('.sidebar').attr('data-image', imagePick)
		layoutsColors();
	} else {
		$('.sidebar').removeAttr('data-image');
		layoutsColors();
	}
}

$('input#custom-image-background').change(function()
{
	changeImage();
});

$('.img-pick').on('click', function(){
	imagePick = $(this).find('img').attr('src');
	$(this).parent().find('.img-pick').removeClass('active');
	$(this).addClass('active');
	changeImage();
});

function customCheckColor(){
	var sidebar = $('.sidebar').attr('data-background-color'),
	logoHeader = $('.main-header .logo-header').attr('data-background-color');
	if (typeof sidebar == typeof undefined) {
		if (typeof logoHeader !== typeof undefined) {
			$('.logo-header .logo-img').attr('src', '../../assets/img/logoresponsive2.png');
			$('.logo-header .navbar-brand').attr('src', '../../assets/img/logoheader2.png');
		} else {
			$('.logo-header .logo-img').attr('src', '../../assets/img/logoresponsive.png');
			$('.logo-header .navbar-brand').attr('src', '../../assets/img/logoheader.png');
		}
	} 
	else{
		if ($(window).width() > 991) {
			$('.logo-header .logo-img').attr('src', '../../assets/img/logoresponsive2.png');
			$('.logo-header .navbar-brand').attr('src', '../../assets/img/logoheader2.png');
		} else  {
			if(typeof logoHeader !== typeof undefined) {
				$('.logo-header .logo-img').attr('src', '../../assets/img/logoresponsive2.png');
				$('.logo-header .navbar-brand').attr('src', '../../assets/img/logoheader2.png');		
			} else {
				$('.logo-header .logo-img').attr('src', '../../assets/img/logoresponsive.png');
				$('.logo-header .navbar-brand').attr('src', '../../assets/img/logoheader.png');				
			}
		}
	} 
}

var toggle_customSidebar = false,
custom_open = 0;

if(!toggle_customSidebar) {
	var toggle = $('.custom-template .custom-toggle');

	toggle.click(function() {
		if (custom_open == 1){
			$('.custom-template').removeClass('open');
			toggle.removeClass('toggled');
			custom_open = 0;
		}  else {
			$('.custom-template').addClass('open');
			toggle.addClass('toggled');
			custom_open = 1;
		}
	});
	toggle_customSidebar = true;
}