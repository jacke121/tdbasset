// JavaScript Document

$(function(){
	$('.debt_time li').click(function(e) {
        $(this).children('a').addClass('currentOne');
		$(this).siblings('li').children('a').removeClass('currentOne');
    });	
	$('.debt_money li').click(function(e) {
        $(this).children('a').addClass('currentOne');
		$(this).siblings('li').children('a').removeClass('currentOne');
    });	
})