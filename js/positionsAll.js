function del(obj) {
		var id = $(obj).data("id");
		var base_url = $("#base_url").data("base-url");
		requestUrl = base_url+"positions/delete/"+id;
		$.ajax({
			dataType: "html",
			url: requestUrl,
			success: function(data) {
				$(obj).parent().parent().remove();
			}
		});
		return true;
}