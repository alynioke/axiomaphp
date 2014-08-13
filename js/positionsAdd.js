	$(document).ready(function() {
		$("#form").on("submit", function() {
			validate();
		});
		$('#form input').each(function(){
			$(this).keypress(function(e) {
				if (e.keyCode == 13)
					validate();
			});
		});
	});

	function set(fieldName) {
		var f = $("#"+fieldName);
		var regex = new RegExp("^[a-zA-Za-яА-Я]+[ ]*[a-zA-Za-яА-Я]*$");
		if (regex.test(f.val())) {
			f.removeClass("error");
			return true;
		}
		f.addClass("error");
		return false;
	}

	function validate() {
		var base_url = $("#base_url").data("base-url");
		if (set("title")) {
			var d = {'title':$("#title").val(), 'description':$("#description").val()};
			var requestUrl = "";
			var type = $("#send").data("type");
			var id = $("#send").data("id");

			if (type == "add") requestUrl = base_url+"positions/create/";
			else if (type == "edit") requestUrl = base_url+"positions/update/?id="+id;
			$.ajax({
				dataType: "html",
				url: requestUrl,
				data: $.param(d),
				contentType: "application/json",
				success: function(data) {
					$(".err").fadeOut("fast");
					$(".success").fadeOut("fast");
					if (type == 'add')	$("#form").fadeOut("fast");
					$(".success").fadeIn("fast");
				}
			});
		} else {
			$(".success").fadeOut("fast");
			$(".err").fadeOut("fast");
			$(".err").fadeIn("fast");
		}
	}