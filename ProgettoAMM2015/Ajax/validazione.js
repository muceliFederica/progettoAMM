
$("document").ready(function() {
			
			
                $(".check2").bind("click",function(){
				var username = $("#username").val();
        		var password1 = $("#password1").val();
        		var password2 = $("#password2").val();
				if ((username == "") || (username == "undefined"))
				{
					$("#submit").attr("disabled",true);
        			window.alert("Il campo Username è obbligatorio.");
					$("#submit").attr("disabled",false);
        			return false;
    			}
				else if ((password1 == "") || (password1 == "undefined")) {
					$("#submit").attr("disabled",true);
					window.alert("Il campo Password è obbligatorio.");
					$("#submit").attr("disabled",false);
					return false;
				}
				//Effettua il controllo sul campo CONFERMA PASSWORD
				else if ((password2 == "") || (password2 == "undefined")) {
					$("#submit").attr("disabled",true);
					window.alert("Il campo Reinserisci password è obbligatorio.");
					$("#submit").attr("disabled",false);
					return false;
				}
				//Verifica l'uguaglianza tra i campi PASSWORD e CONFERMA PASSWORD
				else if (password1 != password2) {
					$("#submit").attr("disabled",true);
					window.alert("La password confermata è diversa da quella scelta, controllare.");
					$("#submit").attr("disabled",false);
					return false;
				}
				else {
					$("#submit").attr("disabled",false);
				}
					
                   
                });
                
                $(".check").focus(function(){                
                    switch($(this).attr("name")) {
						case "username":
							var info="Inserisci username"
							break;
						case"password1":
							var info="Inserisci password";
							break;
                        case "password2":
                            var info = "Ripetere password"; 
                            break;
                    }
                    $("#info").html(info);
                });
}); 
