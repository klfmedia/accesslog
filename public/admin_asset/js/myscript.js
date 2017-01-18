 
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });



function confirmDelete(msg){
	if(window.confirm(msg)){
		return true;
	}
	return false;
};





