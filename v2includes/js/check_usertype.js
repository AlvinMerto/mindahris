var the_emps    		= new Object();
	the_emps.isadmin 	= null;
	the_emps.empid 		= null;
	the_emps.fname      = null;

performajax(["My/checking",{ empid : 1235123 }], function(data) {
	if ( data[0] == "admin" ) {
		the_emps.isadmin = true;
	} else {
		the_emps.isadmin = false;
	}
	
	the_emps.fname = data[2];
	the_emps.empid = data[1];
})