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
					$("#modalOne").find("input:first").focus();
				}});
				
				
                e.preventDefault();
            });
			
			$('#locumLogin a.register').click(function(e) {
                $("#modalTwo").lightbox_me({centered: true, onLoad: function() {
					$("#modalTwo").find("input:first").focus();
				}});
				
				
                e.preventDefault();
            });
			
		$('#pharmacyLogin a.login').click(function(e) {
                $("#modalThree").lightbox_me({centered: true, onLoad: function() {
					$("#modalThree").find("input:first").focus();
				}});
				
				
                e.preventDefault();
            });
		
		$('#locumLogin a.login').click(function(e) {
                $("#modalFour").lightbox_me({centered: true, onLoad: function() {
					$("#modalFour").find("input:first").focus();
				}});
				
				
                e.preventDefault();
            });
            
            
        });
/* 
Login Lightbox functions
*/