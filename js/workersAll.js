	function del(obj) {
		var id = $(obj).data("id");
		var base_url = $("#base_url").data("base-url");
		requestUrl = base_url+"workers/delete/"+id;
		$.ajax({
			dataType: "html",
			url: requestUrl,
			data: "",
			contentType: "application/json",
			success: function(data) {
				$(obj).parent().parent().remove();
			}
		});
		return true;
	}