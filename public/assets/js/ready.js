"use strict";

$(function () {
	$('[data-toggle="tooltip"]').tooltip();
	$('[data-toggle="popover"]').popover();
	layoutsColors();
});

function layoutsColors(){
	if($('.sidebar').is('[data-background-color]')) { 
		$('html').addClass('sidebar-color');
	} else {
		$('html').removeClass('sidebar-color');
	}

	if($('.sidebar').is('[data-image]')) {
		$('.sidebar').append("<div class='sidebar-background'></div>");
		$('.sidebar-background').css('background-image', 'url("' + $('.sidebar').attr('data-image') + '")');
	} else {
		$(this).remove('.sidebar-background');
		$('.sidebar-background').css('background-image', '');
	}
}

function legendClickCallback(event) {
	event = event || window.event;

	var target = event.target || event.srcElement;
	while (target.nodeName !== 'LI') {
		target = target.parentElement;
	}
	var parent = target.parentElement;
	var chartId = parseInt(parent.classList[0].split("-")[0], 10);
	var chart = Chart.instances[chartId];
	var index = Array.prototype.slice.call(parent.children).indexOf(target);

	chart.legend.options.onClick.call(chart, event, chart.legend.legendItems[index]);
	if (chart.isDatasetVisible(index)) {
		target.classList.remove('hidden');
	} else {
		target.classList.add('hidden');
	}
}

$(document).ready(function(){

	$('.sidebar').on('data-attribute-changed', function() {
		layoutsColors();
	});

	var scrollbarDashboard = $('.sidebar .scrollbar-inner');
	if (scrollbarDashboard.length > 0) {
		scrollbarDashboard.scrollbar();
	}

	var messagesScrollbar = $('.messages-scroll.scrollbar-outer');
	if (messagesScrollbar.length > 0) {
		messagesScrollbar.scrollbar();
	}

	var tasksScrollbar = $('.tasks-scroll.scrollbar-outer');
	if (tasksScrollbar.length > 0) {
		tasksScrollbar.scrollbar();
	}

	var quickScrollbar = $('.quick-scroll');
	if (quickScrollbar.length > 0) {
		quickScrollbar.scrollbar();
	}

	$('.scroll-bar').draggable();

	var toggle_sidebar = false,
	toggle_quick_sidebar = false,
	toggle_topbar = false,
	minimize_sidebar = false,
	nav_open = 0,
	quick_sidebar_open = 0,
	topbar_open = 0,
	mini_sidebar = 0;


	if(!toggle_sidebar) {
		var toggle = $('.sidenav-toggler');

		toggle.click(function() {
			if (nav_open == 1){
				$('html').removeClass('nav_open');
				toggle.removeClass('toggled');
				nav_open = 0;
			}  else {
				$('html').addClass('nav_open');
				toggle.addClass('toggled');
				nav_open = 1;
			}
		});
		toggle_sidebar = true;
	}

	if(!quick_sidebar_open) {
		var toggle = $('.quick-sidebar-toggler');

		toggle.click(function() {
			if (nav_open == 1){
				$('html').removeClass('quick_sidebar_open');
				$('.quick-sidebar-overlay').remove();
				toggle.removeClass('toggled');
				quick_sidebar_open = 0;
			}  else {
				$('html').addClass('quick_sidebar_open');
				toggle.addClass('toggled');
				$('<div class="quick-sidebar-overlay"></div>').insertAfter('.quick-sidebar');
				quick_sidebar_open = 1;
			}
		});

		$('.wrapper').mouseup(function(e)
		{
			var subject = $('.quick-sidebar'); 

			if(e.target.className != subject.attr('class') && !subject.has(e.target).length)
			{
				$('html').removeClass('quick_sidebar_open');
				$('.quick-sidebar-toggler').removeClass('toggled');
				$('.quick-sidebar-overlay').remove();
				quick_sidebar_open = 0;
			}
		});

		$(".close-quick-sidebar").on('click', function(){
			$('html').removeClass('quick_sidebar_open');
			$('.quick-sidebar-toggler').removeClass('toggled');
			$('.quick-sidebar-overlay').remove();
			quick_sidebar_open = 0;
		});

		quick_sidebar_open = true;
	}

	if(!toggle_topbar) {
		var topbar = $('.topbar-toggler');

		topbar.on('click', function() {
			if (topbar_open == 1) {
				$('html').removeClass('topbar_open');
				topbar.removeClass('toggled');
				topbar_open = 0;
			} else {
				$('html').addClass('topbar_open');
				topbar.addClass('toggled');
				topbar_open = 1;
			}
		});
		toggle_topbar = true;
	}

	if(!minimize_sidebar){
		var minibutton = $('.btn-minimize');
		if($('html').hasClass('sidebar_minimize')){
			mini_sidebar = 1;
			minibutton.addClass('toggled');
			minibutton.html('<i class="la la-ellipsis-v"></i>');
		}

		minibutton.on('click', function() {
			if (mini_sidebar == 1) {
				$('html').removeClass('sidebar_minimize');
				minibutton.removeClass('toggled');
				minibutton.html('<i class="la la-navicon"></i>');
				mini_sidebar = 0;
			} else {
				$('html').addClass('sidebar_minimize');
				minibutton.addClass('toggled');
				minibutton.html('<i class="la la-ellipsis-v"></i>');
				mini_sidebar = 1;
			}
			$(window).resize();
		});
		minimize_sidebar = true;
	}


	$('.sidebar').hover(function() {
		if ($('html').hasClass('sidebar_minimize')){
			$('html').addClass('sidebar_minimize_hover');
		}
	}, function(){
		if ($('html').hasClass('sidebar_minimize')){
			$('html').removeClass('sidebar_minimize_hover');
		}
	});

	// addClass if nav-item click and has subnav

	$(".nav-item a").on('click', (function(){
		if ( $(this).parent().find('.collapse').hasClass("show") ) {
			$(this).parent().removeClass('submenu');
		} else {
			$(this).parent().addClass('submenu');
		}
	}));


	//Chat Open
	$('.messages-contact .user a').on('click', function(){
		$('.tab-chat').addClass('show-chat')
	});

	$('.messages-wrapper .return').on('click', function(){
		$('.tab-chat').removeClass('show-chat')
	});

	//select all
	$('[data-select="checkbox"]').change(function(){
		var target = $(this).attr('data-target');
		$(target).prop('checked', $(this).prop("checked"));
	})

	//form-group-default active if input focus
	$(".form-group-default .form-control").focus(function(){
		$(this).parent().addClass("active");
	}).blur(function(){
		$(this).parent().removeClass("active");
	})

});

// Input File Image

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(input).parent('.input-file-image').find('.img-upload-preview').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$('.input-file-image input[type="file"').change(function () {
	readURL(this);
});

// Show Password

function showPassword(button) {
	var inputPassword = $(button).parent().find('input');
	if (inputPassword.attr('type') === "password") {
		inputPassword.attr('type', 'text');
	} else {
		inputPassword.attr('type','password');
	}
}

$('.show-password').on('click', function(){
	showPassword(this);
})

// Sign In & Sign Up
var containerSignIn = $('.container-login'),
containerSignUp = $('.container-signup'),
showSignIn = true,
showSignUp = false;

function changeContainer(){
	if(showSignIn == true){
		containerSignIn.css('display', 'block')
	} else {
		containerSignIn.css('display', 'none')
	}

	if(showSignUp == true){
		containerSignUp.css('display', 'block')
	} else {
		containerSignUp.css('display', 'none')
	}
}

$('#show-signup').on('click', function(){ 
	showSignUp = true;
	showSignIn = false;
	changeContainer();
})

$('#show-signin').on('click', function(){ 
	showSignUp = false;
	showSignIn = true;
	changeContainer();
})

changeContainer();

//Input with Floating Label

$('.form-floating-label .form-control').keyup(function(){
	if($(this).val() !== '') {
		$(this).addClass('filled');
	} else {
		$(this).removeClass('filled');
	}
})

