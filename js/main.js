$( document ).ready(function() {
  // Handler for .ready() called.
  $('.btnEdit').click(function(){
  	
  	$('#editmodal').modal('show');
  	let data = $(this).closest("tr").children().map(function(){
  		return $(this).text();
  	});
  	$('.editID').val(data[0]);
  	$('.editName').val(data[1]);
  	$('.editEmail').val(data[2]);
    $('.editprofile').val(data[3]);
  	$('.editOldPass').val(data[4]);
    

  })
  $('.btnDelete').click(function(){
  	console.log("hi");
  	$('#deletemodal').modal('show');
  	let dataDel = $(this).closest("tr").children("th").map(
  		function(){
  			return $(this).text();
  	});
  	$('.deleteID').val(dataDel[0]);
  		console.log(dataDel[0]);
  })


});

