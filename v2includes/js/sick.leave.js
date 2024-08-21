// sick leave form

var sl 			  		= $;

var selected 			= new Object();
	selected.dates 		= null;
	selected.numofdays 	= null;
	selected.from 		= null;
	selected.to 		= null;

	
sl(document).ready(function() {
	sl('#incdates').multiDatesPicker({
		beforeShowDay: $.datepicker.noWeekends
	});
		
	sl("#ddates").on("click",function(){
		alert( sl("#incdates").multiDatesPicker("value") )
	})
	// sl("#incdates").jqxCalendar({ width: '250px', height: '250px', theme: 'summer', });
	/*
	sl("#incdates").jqxCalendar({ 
						width: 'auto', 
						height: 'auto' , 
						selectionMode: 'range',
						theme: 'energyblue'
						});
	
	sl('#incdates').on('change', function (event) {
		var type = event.args.type; // keyboard, mouse or null depending on how the date was selected.
		var range = event.args.range;
			
			selected.dates = range.from +" to "+ range.to;
			selected.from  = range.from;
			selected.to    = range.to;
			
			selected.numofdays = numberofworkingdays(selected.from, selected.to);
			
			sl("#numofdays").text(selected.numofdays+" day(s)");
			
	});
	*/
})