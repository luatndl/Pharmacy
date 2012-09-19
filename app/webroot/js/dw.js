/* 
Login Lightbox functions
*/
$(function() {
            function launch() {
                 $('#modalOne').lightbox_me({centered: true, onLoad: function() { $('#modalOne').find('input:first').focus()}});
				 $('#modalTwo').lightbox_me({centered: true, onLoad: function() { $('#modalTwp').find('input:first').focus()}});
				 $('#modalThree').lightbox_me({centered: true, onLoad: function() { $('#modalOne').find('input:first').focus()}});
				 $('#modalFour').lightbox_me({centered: true, onLoad: function() { $('#modalTwp').find('input:first').focus()}});
            }
            
            $('#pharmacyLogin a.register').click(function(e) {
                $("#modalOne").lightbox_me({centered: true, onLoad: function() {
					$.ajax({
						type: 'POST',
						url: 'users/register',
						data: {'type':2},
						dataType: 'html',
						success: function(data){
							 $("#modalOne").html(data);
						},
						error: function(message){
							alert(message);
						}
					});
					$("#modalOne").find("input:first").focus();
				}});
                e.preventDefault();
            });
			
			$('#locumLogin a.register').click(function(e) {
                $("#modalTwo").lightbox_me({centered: true, onLoad: function() {
					$.ajax({
						type: 'POST',
						url: 'users/register',
						data: {'type':1},
						dataType: 'html',
						success: function(data){
							 $("#modalTwo").html(data);
						},
						error: function(message){
							alert(message);
						}
					});
					$("#modalTwo").find("input:first").focus();
				}});
				
				
                e.preventDefault();
            });
			
		$('#pharmacyLogin a.login').click(function(e) {
                $("#modalThree").lightbox_me({centered: true, onLoad: function() {
					$.ajax({
						type: 'POST',
						url: 'users/login',
						dataType: 'html',
						success: function(data){
							 $("#modalThree").html(data);
						},
						error: function(message){
							alert(message);
						}
					});
					$("#modalThree").find("input:first").focus();
				}});
				
				
                e.preventDefault();
            });
		
		$('#locumLogin a.login').click(function(e) {
                $("#modalFour").lightbox_me({centered: true, onLoad: function() {
					$.ajax({
						type: 'POST',
						url: 'users/login',
						dataType: 'html',
						success: function(data){
							 $("#modalFour").html(data);
						},
						error: function(message){
							alert(message);
						}
					});	
					$("#modalFour").find("input:first").focus();
				}});
				
				
                e.preventDefault();
            });
            
            
        });
/* 
Login Lightbox functions
*/