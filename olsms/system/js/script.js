$(function(){

   

    $('#p_color').autocomplete('data.php?mode=sql', {
        width: 200,
        max: 5
    });
	
	$('#p_name1').autocomplete('data.php?mode=sql', {
        width: 200,
        max: 5
    });
    
    $('#sup_name').autocomplete('datasup.php?mode=sql', {
        width: 200,
        max: 5
    });
	
	

});