$(function() {

    // put all your jQuery goodness in here.
	var idpregunta;
	var pregunta;
	var tipos = new Array();
	var indexarraytipos=0;
	var i=0;

	var buscadorregalostemplate = 	"<div class='title'>Buscador de Regalos</div><form method='post' id='form'>"+
									"<input type='hidden' name='idpregunta' id='idpregunta'>"+
									"<input type='hidden' name='sigpreg' id='sigpreg'>"+
									"<div id='pregunta'></div><div id='optionswrapper'>";
									
									
	
	
	
	$('#btn_buscar').click(function(){
		initialize();
	});
	
	$(".parent i").click(function() {
		var ul = $(this).next().next();
		if($(this).hasClass('fa-chevron-down')){
			$(this).removeClass('fa-chevron-down');
			$(this).addClass('fa-chevron-up');
		}else{
			$(this).removeClass('fa-chevron-up');
			$(this).addClass('fa-chevron-down');
		}
		$(ul).slideToggle("normal");
	});
	
	$('.buscar_regalo').click(function(){
		$('#content').html(buscadorregalostemplate);
		loadPreguntas();
		controlform('#form');

	});
	
	function initialize()
	{
		$('#content').html(buscadorregalostemplate);
		loadPreguntas();
		controlform('#form');
	}
	
	function loadPreguntas(idpregunta){
	
						$.ajax({						
								type: "POST",
								dataType: "json",
								url: "./data/buscarPregunta.php",
								data: {idpregunta: idpregunta},
								success: function(data){
								
											var texto='';
											$.each(data, function(entryIndex, entry) {
											
													idpregunta=entry['id_pregunta'];
													pregunta=entry['pregunta'];			
												})
												loadOpciones(idpregunta);

											}
							})
	
	}
	
	function loadOpciones(idpregunta){
	
						$.ajax({						
								type: "POST",
								dataType: "json",
								url: "./data/buscarOpcion.php",
								data: {idpregunta: idpregunta},
								success: function(data){
											var texto='';
											$('#idpregunta').val(idpregunta);
											//$('#pregunta').html(pregunta);
											
											
													
											$.each(data, function(entryIndex, entry) {
													texto+='<div class="optionfull">';
													texto+='<input type="image" class="opcionimage" ';
													texto+='id="opcionimage" src="./assets/img/types/'+entry["imagen"]+'"';
													texto+='value="'+entry["id_opcion"]+'"></input><br><class="s-desc">'+entry["texto"]+'</div>';
													
													$('#sigpreg').val(entry['p_sig']);	
																			
												})
												texto+='<input type="hidden" id="opcion" name="opcion"/>';
												$('#optionswrapper').html(texto);
												doSubmit();
												if($('#sigpreg').val()=='')
												{
													if(i>0)
													loadProductos(tipos);
													else
													i++;
												}
												


											}
							})
	
	}
	
	function doSubmit(){
	
	$('.opcionimage').click(
			function(){
			$(this).toggleClass('flipped');
			$('#opcion').val($(this).val());
			setTimeout(function(){$('#form').submit()},800);
			//setInterval($('#form').submit(),2300);
			return false;
			}
		);
	
	}
	
	//sleep function
	function sleep(delay) {
        var start = new Date().getTime();
        while (new Date().getTime() < start + delay);
      }
	  
	function loadTipoPersonalidad(tipos){
		$.ajax({						
								type: "POST",
								dataType: "json",
								url: "./data/buscarTipoPersonalidad.php",
								data: {tipos: tipos},
								success: function(data){
									
									var texto='<div class="banner row"><h3 id="personalidad">La personalidad del agasajado es '+data['tipo_personalidad']+'</h3>'+data['tipo_descripcion']+'<h4>W!: Grado de coincidencia (1-5)<br> A mayor coincidencia mayor probabilidad de sorpresa y que tu agasajado se sienta a gusto!!!</h4>';
									loadProductos(tipos,texto)
									
								}
				})
	}
	
	function loadProductos(tipos,texto){
				$.ajax({						
								type: "POST",
								dataType: "json",
								url: "./data/buscarProductos.php",
								data: {tipos: tipos},
								success: function(data){
									
									
									$.each(data, function(entryIndex, entry) {
									
													var match = Math.ceil(5*((entry['match_producto']/4)));
													var stars='';
													for(var i=0;i<match;i++){
													stars+='W!';
													}
													
													var esperfecto='';
													if(match==5){
													//var esperfecto='style="color:red;font-size: '+(20+(match*2))+'px;font-weight: '+((match*200)-100)+'"';
													}
													//else
													//var esperfecto='style="color:red;font-size: '+(20+(match*1.5))+'px;font-weight: '+((match*200)-100)+'"';
												
													
													
													texto+='<div class="col-sm-3 producto">'+
															'<a href="../../admin/pagos/pagar?idproducto='+entry["info_producto"]["id_producto"]+'">'+
																'<img class="col-md-3" src="assets/img/products/'+entry["info_producto"]["imagen"]+'" alt="banner-1" title="banner-1">'+
																
																'<div class="s-desc">'+
																	entry["info_producto"]["nombre"]+
																	'<br>'+entry['info_producto']['precio']+
																	'<br>'+esperfecto+stars+ //preference="'+entry["mercadopago_preference"]+'
																	
																'</div>'+
															'</a>'+
														'</div>';
																			
												})
									texto+='</div>';
									$('#content').html(texto);
									
									
								
								}
						})
	}
	
	function controlform(formreference)
	{
		// this is the id of the form
		$(formreference).submit(function() {

			
			
			var url = "./data/buscarPregunta.php"; // the script where you handle the form input.

			$.ajax({
				   type: "POST",
				   dataType: "json",
				   url: url,
				   data: $(formreference).serialize(), // serializes the form's elements.
				   success: function(data)
				   {
							if(data['id_pregunta']!=undefined)
							{
							idpregunta=data['id_pregunta'];
							pregunta=data['pregunta'];
							//en este array guardamos el tipo y su cantidad, luego deberiamos, una vez que termina las preguntas.
							//ir a buscar los productos con estos tipos
							if(tipos[data['id_tipo']]===undefined)
								tipos[data['id_tipo']]=1;
							else
								tipos[data['id_tipo']]+=1;	
							

							loadOpciones(idpregunta);
									/*
										for(var key in tipos)
										{
										}
									*/
							}
							else{
							
							if(tipos[data['id_tipo']]===undefined)
								tipos[data['id_tipo']]=1;
							else
								tipos[data['id_tipo']]+=1;	

							loadTipoPersonalidad(tipos);
							
							
							}
							
								//alert(key + ' - ' + tipos[key]);
							
				   }
				 });
			
			$('#optionswrapper').html('Loading...');
			
			return false; // avoid to execute the actual submit of the form.
		});
	}
	
});
