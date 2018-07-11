$(document).ready(function(){
		//$('.sidenav').sidenav();
		//$('.parallax').parallax();
		
		$('#search').on('keyup', function(){
			$.ajax({
				type: 'GET',
				url: 'search-aliment/' + this.value,
				cache: false,
				success: function(msg){
					
					var availableFilms = new Array();
					if(isJSON(msg)){
						var obj = JSON.parse(msg);
					} else {
						obj = '';
					}				

					if(obj.length > 0){
						for(var i=0; i < obj.length; i++){
							availableFilms.push(obj[i]['aliment']);
						}
					}
					
					$('#search').autocomplete({
						source: availableFilms
					});

				},
				error: function(xhr){
					console.log(JSON.parse(xhr.responseText));
				}
			})
		});

		$('#search').autocomplete();
});	

function isJSON(str){
	try {
		JSON.parse(str)
	} catch(e){
		return false;
	}

	return true;
}
