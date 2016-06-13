$(function(){

	$( "#from01" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
			$( "#to01" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#to01" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
			$( "#from01" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	$( "#from02" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
			$( "#to02" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#to02" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		onClose: function( selectedDate ) {
			$( "#from02" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	$( "#datepick01 , #datepick02 , #datepick03" ).datepicker({
		changeMonth: true,
		changeYear: true
	});//日期修改年份
	
});










