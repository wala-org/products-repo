$(document).ready(function(){


//tabla listado personas
tbllistadotiendas = $('#tbl_listadotiendas').dataTable({
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

tbllistadotiendas.columnFilter({
			aoColumns: [ 
					 { type: "text"},
				     { type: "text" },
				     { type: "text"},
				     { type: "text"},
					 { type: "text"},
					 { type: "select"},
					null
				]
				});


				

});