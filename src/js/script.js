$(document).on("click", ".openDiag", function(){
	$(".modal-title").text($(this).attr("data-title"));
	$(".modal-body").text($(this).attr("data-body"));
	$(".modal-footer > a > .action").text($(this).attr("data-btn-text"));
	$(".modal-footer > a > .action").attr("class", "btn action "+$(this).attr("data-btn-type"));
	$(".modal-footer > a").attr("href", $(this).attr("data-id"));
});

$(document).ready(function(){
	$(document).on("click", ".openDialogHostel", function(){
		var hosteldata = $(this).data('hosteldata');

		$('#hostel_hidden_id').val(hosteldata['hostel_id']);
		$('input[name="edit_hostel_name"]').val(hosteldata['hostel_name']);
		$('select[name="edit_hostel_city"] option[value='+hosteldata['hostel_city']).attr("selected", "selected");
		$('input[name=edit_hostel_address]').val(hosteldata['hostel_address']);
		$('input[name=edit_hostel_rooms]').val(hosteldata['hostel_rooms']);
		$('textarea[name=edit_hostel_extras]').val(hosteldata['hostel_extras']);
		
	});

	$(document).on("click", ".openDialogPendingHostel", function(){
		var hosteldata = $(this).data('hosteldata');

		$('#pending_hostel_hidden_id').val(hosteldata['hostel_id']);
		$('input[name="edit_hostel_name"]').val(hosteldata['hostel_name']);
		$('select[name="edit_hostel_city"] option[value='+hosteldata['hostel_city']).attr("selected", "selected");
		$('input[name=edit_hostel_address]').val(hosteldata['hostel_address']);
		$('input[name=edit_hostel_rooms]').val(hosteldata['hostel_rooms']);
		$('textarea[name=edit_hostel_extras]').val(hosteldata['hostel_extras']);

	});
});