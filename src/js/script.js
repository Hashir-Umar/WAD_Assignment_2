$(document).on("click", ".openDiag", function(){
	$(".modal-title").text($(this).attr("data-title"));
	$(".modal-body").text($(this).attr("data-body"));
	$(".modal-footer > a > .action").text($(this).attr("data-btn-text"));
	$(".modal-footer > a > .action").attr("class", "btn action "+$(this).attr("data-btn-type"));
	$(".modal-footer > a").attr("href", $(this).attr("data-id"));
});