$(document).on("click", ".openDiag", function(){
	$(".modal-title").text($(this).attr("data-title"));
	$(".modal-body").text($(this).attr("data-body"));
	$(".modal-footer > a > .action").text($(this).attr("data-btn-text"));
	$(".modal-footer > a > .action").attr("class", "btn action "+$(this).attr("data-btn-type"));
	$(".modal-footer > a").attr("href", $(this).attr("data-id"));
});

$(document).ready(function(){
	$('[data-hosteldata]').click(function(){
		var hosteldata = $(this).data('hosteldata');

		$('input[name=hostel_name]').val(hosteldata['hostel_name']);
		$('select[name="hostel_city"] option[value='+hosteldata['hostel_city']).attr("selected", "selected");
		$('input[name=hostel_address]').val(hosteldata['hostel_address']);
		$('input[name=hostel_rooms]').val(hosteldata['hostel_rooms']);
		$('#uploadHostel').attr('name', 'editHostel');
		$('#uploadHostel')[0].innerHTML="Edit Hostel";

		
	});

	$('#myModal').on('hidden.bs.modal', function () 
	{
		$('input[name=hostel_name]').val("");
		$('select[name="hostel_city"] option[value="Lahore"]').attr("selected", "selected");
		$('input[name=hostel_address]').val("");
		$('input[name=hostel_rooms]').val("");
		$('#uploadHostel').attr('name', 'uploadHostel');
		$('#uploadHostel')[0].innerHTML="Add Hostel";
	})
});