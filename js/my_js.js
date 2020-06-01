// JavaScript Document
//<![CDATA[

$(document).ready(function() {
	"use strict";
	$('#navPhone').click(function(){
		$('#navPhoneMenu').slideToggle(300);
	});//end click function

	$('#target').click(function(){
		$('#myDropdown').slideToggle(300);
	});//end click function

	$(window).resize(function(){
		if($(window).width() > 768){
			$('#myDropdown').hide();
		} // end if window.width()
	}); //end window.resize function

	$(window).resize(function(){
		if($(window).width() > 768){
			$('#navPhoneMenu').hide();
		} // end if window.width()
	}); //end window.resize function

});//end document.ready

function goBack() {
  window.history.back();
}






//]]>
