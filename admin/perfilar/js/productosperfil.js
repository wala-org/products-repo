$(document).ready(function(){


//tabla listado personas
tbllistadoproductosperfil = $('#tbl_listadoproductosperfil').dataTable({
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

tbllistadoproductosperfil.columnFilter({
			aoColumns: [ 
					 { type: "text"},
				     { type: "text" },
				     { type: "text"},
					 { type: "text"},
					null
				]
				});


				

});