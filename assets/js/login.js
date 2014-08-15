$(function() {

checkUser('#btnlogin','#usuario','#password');

	function checkUser(reflogin,refuser,refpass)
	{
	
		$(reflogin).click(function(){
		
				var user = $(refuser).val();
				var pass = $(refpass).val();
				
					$.ajax({						
									type: "POST",
									dataType: "json",
									url: "http://www.wala.com.ar/data/logIn.php",
									data: {usuario: user, password: pass},
									success: function(data){
														  if(data['success']){
																window.location = "http://www.wala.com.ar";
															}
														   else{
																alert('Verifique los datos');
														   }
									
												}
								});
			
			
			});
	
	}
		
});