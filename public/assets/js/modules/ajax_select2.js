$(function () {
	$(".select2-ajax-person").select2({
		language: {
			searching: function () {
				return "กำลังโหลดข้อมูล...";
			},
			inputTooShort: function () {
				return "พิมพ์ค้นหาข้อมูล";
			},
			noResults: function () {
				return "ไม่พบข้อมูล";
			},
		},
		minimumInputLength: 0,

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
		language: {
			searching: function () {
				return "กำลังโหลดข้อมูล...";
			},
			inputTooShort: function () {
				return "พิมพ์ค้นหาข้อมูล";
			},
			noResults: function () {
				return "ไม่พบข้อมูล";
			},
		},
		minimumInputLength: 0,

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
						id: value.land_code,
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
		language: {
			searching: function () {
				return "กำลังโหลดข้อมูล...";
			},
			inputTooShort: function () {
				return "พิมพ์ค้นหาข้อมูล";
			},
			noResults: function () {
				return "ไม่พบข้อมูล";
			},
		},
		minimumInputLength: 0,

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
						id: value.emp_id,
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
		language: {
			searching: function () {
				return "กำลังโหลดข้อมูล...";
			},
			inputTooShort: function () {
				return "พิมพ์ค้นหาข้อมูล";
			},
			noResults: function () {
				return "ไม่พบข้อมูล";
			},
		},
		minimumInputLength: 0,

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

	$(".select2-ajax-province").select2({
		language: {
			searching: function () {
				return "กำลังโหลดข้อมูล...";
			},
			inputTooShort: function () {
				return "พิมพ์ค้นหาข้อมูล";
			},
			noResults: function () {
				return "ไม่พบข้อมูล";
			},
		},
		minimumInputLength: 0,

		ajax: {
			url: domain + "common/search-province",
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

	$(".select2-ajax-amphur").select2({
		language: {
			searching: function () {
				return "กำลังโหลดข้อมูล...";
			},
			inputTooShort: function () {
				return "พิมพ์ค้นหาข้อมูล";
			},
			noResults: function () {
				return "ไม่พบข้อมูล";
			},
		},
		minimumInputLength: 0,

		ajax: {
			url: domain + "common/search-amphur",
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
						id: value.AMP_CODE,
						text: value.AMP_T,
					});
				});
				return {
					results: arr,
				};
			},
			cache: true,
		},
	});

	$(".select2-ajax-tambon").select2({
		language: {
			searching: function () {
				return "กำลังโหลดข้อมูล...";
			},
			inputTooShort: function () {
				return "พิมพ์ค้นหาข้อมูล";
			},
			noResults: function () {
				return "ไม่พบข้อมูล";
			},
		},
		minimumInputLength: 0,

		ajax: {
			url: domain + "common/search-tambon",
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
						id: value.TAM_CODE,
						text: value.TAM_T,
					});
				});
				return {
					results: arr,
				};
			},
			cache: true,
		},
	});

	$(".select2-ajax-village").select2({
		language: {
			searching: function () {
				return "กำลังโหลดข้อมูล...";
			},
			inputTooShort: function () {
				return "พิมพ์ค้นหาข้อมูล";
			},
			noResults: function () {
				return "ไม่พบข้อมูล";
			},
		},
		minimumInputLength: 0,

		ajax: {
			url: domain + "common/search-village",
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
						id: value.VILL_CODE,
						text: value.VILL_T,
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
