$(document).ready(function(){


//tabla listado personas
tbllistadoproductos = $('#tbl_listadoproductos').dataTable({
			"aaSorting": [],
			"bPaginate": true,
			"bAutoWidth": false,
			"bJQueryUI": true,
			"bLengthChange": true,
			'bFilter': true,	
			"oLanguage": {
                        "sUrl": "../../assets/js/datatable.spanish.txt"
                    }
});

tbllistadoproductos.columnFilter({
			aoColumns: [ 
					 { type: "text"},
				     { type: "text" },
				     { type: "text"},
				     { type: "text"},
					 { type: "text"},
					null
				]
				});


				

});