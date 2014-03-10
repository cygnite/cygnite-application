
$(function() {
	/*
	* Sort your columns. You can also change settings here.
	*/
	$("#dataTable").tablesorter({
		cssHeader : 'table-header'
	});

    $('#dataTable tr').hover(function() {
            $(this).css('background-color', '#000 !important');
        },
        function() {
            $(this).css('background-color', '#39B3D7 !important');
        });
});