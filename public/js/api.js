$.ajax({
	url: '/api/api.php',
	type: 'get',
	dataType: 'json',
	error: function() {
		alert('请求错误');
	},
	success: function(result) {
		if (result.code == 1) {
			var html = '';
			$.each(result.data, function(key, value) {
				html += '<li><a>'+ value.title +'</a></li>';
			});
			$("#list_html").html(html);
		} else {
			alert('请求失败');
		}
	}
});