$(function () {
	$(".select2-ajax-person").select2({
		// data: [{id:1,text:'qwew'}],
		minimumInputLength: 2,
		tags: [],
		ajax: {
			url: domain + "common/search-person",
			dataType: "json",
			type: "GET",
			quietMillis: 50,
			data: function (params) {
				return {
					q: params.term, // search term
				};
			},
			processResults: function (data) {
				var arr = [];
				$.each(data, function (index, value) {
					arr.push({
						id: value.person_id,
						text: value.name + value.person_name + " " + value.person_lastname,
					});
				});
				return {
					results: arr,
				};
			},
			cache: true,
		},
	});

	$(".select2-ajax-land").select2({
		// data: [{id:1,text:'qwew'}],
		minimumInputLength: 2,
		tags: [],
		ajax: {
			url: domain + "common/search-land",
			dataType: "json",
			type: "GET",
			quietMillis: 50,
			data: function (params) {
				return {
					q: params.term, // search term
				};
			},
			processResults: function (data) {
				var arr = [];
				$.each(data, function (index, value) {
					arr.push({
						id: value.land_id,
						text: value.land_code,
					});
				});
				return {
					results: arr,
				};
			},
			cache: true,
		},
	});

	$(".select2-ajax-user").select2({
		// data: [{id:1,text:'qwew'}],
		minimumInputLength: 2,
		tags: [],
		ajax: {
			url: domain + "common/search-user",
			dataType: "json",
			type: "GET",
			quietMillis: 50,
			data: function (params) {
				return {
					q: params.term, // search term
				};
			},
			processResults: function (data) {
				var arr = [];
				$.each(data, function (index, value) {
					arr.push({
						id: value.prs_id,
						text: value.fullname,
					});
				});
				return {
					results: arr,
				};
			},
			cache: true,
		},
	});

	$(".select2-ajax-house").select2({
		// data: [{id:1,text:'qwew'}],
		minimumInputLength: 2,
		tags: [],
		ajax: {
			url: domain + "common/search-house",
			dataType: "json",
			type: "GET",
			quietMillis: 50,
			data: function (params) {
				return {
					q: params.term, // search term
				};
			},
			processResults: function (data) {
				var arr = [];
				$.each(data, function (index, value) {
					arr.push({
						id: value.Code,
						text: value.Name,
					});
				});
				return {
					results: arr,
				};
			},
			cache: true,
		},
	});
});
