$(function(){
				$("#form-validation").submit(function(){
					message = $(" #multiple-teams ").val();
					token = $(this).find("input[name=_token]").val();
					$.post("http://localhost:8888/fmbb-repository/fmbb/public/admin/multiple",{comm : message, _token:token },function(data){
						if(data!="ok")
						{
							$('.form-horizontal').append('<div class="media-body"><h4 class="alert-title">Message d\'erreur</h4><p class="alert-message">La requête n\'a pas été enregistré</p></div>');
						}
						else
						{
							if ($('.notification').length == 1) {
	                            $('.notification').append('<br><hr><div class="col-md-12"><div class="alert alert-success" role="alert"><strong>Well done!</strong> You successfully read this important alert message.</div></div>');
                        		 $('#multiple-teams').prop('selectedIndex',0);
                        	}
						}
					});
					return false;
				});
				
			});
