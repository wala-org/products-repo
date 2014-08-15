$(document).ready(function() {



cargarDepartamentos();
cargarProvincias();


	function cargarProvincias()
	{
			$.ajax({						
							type: "POST",
							dataType: "json",
							url: "./data/buscarProvincias.php",
							success: function(data){
										var html='';
										$.each(data, function(entryIndex, entry) {
												html+='<option value='+entry['CodProv']+'>'+entry['Provincia']+'</option>';			
											})
											
										$('#provincia').html(html);
										$('#provincia').change();

										}
						})
	}
	
	function cargarDepartamentos()
	{
			$('#provincia').change(function(){
				
					var sel_prov = $(this).val();
						
						$.ajax({						
							type: "POST",
							dataType: "json",
							url: "./data/buscarDepartamentos.php",
							data: {provincia: sel_prov},
							success: function(data){
										var html='';
										$.each(data, function(entryIndex, entry) {
												html+='<option value='+entry['CodDepart']+'>'+entry['Departamento']+'</option>';			
											})
											
										$('#departamento').html(html);
										$('#departamento').change();

										}
						})
					
				
				
				});
	}

});
