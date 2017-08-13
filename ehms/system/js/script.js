$(function(){

   

    $('#title').autocomplete('data.php?mode=sql', {
        width: 200,
        max: 5
    });
	
	$('#publisher').autocomplete('dataPub.php?mode=sql', {
        width: 200,
        max: 5
    });
	
	

});