// form ajax submit helper
export function initFormAjax(selector, ajaxConfig = {}) {
	const showValidation = $(selector).attr("show-validation") !== undefined;

	if (showValidation) {
		$(document).on("focus, change", ".is-invalid", function (e) {
			$(e.target)
				.parent()
				.children("div.invalid-feedback")
				.remove();
			$(e.target).removeClass("is-invalid");
		});
	}

	$(document).on("submit", selector, function (e) {
		const defaultConfig = {
			url: $(selector).attr("action"),
			type: "POST",
			data: $(selector).serialize(),
			beforeSend: function () {
				$('.invalid-feedback').remove()
			},
			error: function (xhr) {
				const response = xhr.responseJSON;

				if (showValidation && response.errors) {
					for (const err in response.errors) {
						const $parent = $(`#${err.replace("[]", "")}`).parent();
						$(`#${err.replace("[]", "")}`).addClass("is-invalid");
						if ($parent.find("invalid-feeedback").length == 0) {
							$parent.append(
								`<div class="invalid-feedback">${response.errors[err]}</div>`
							);
						}
					}
				}

				showToast('Gagal', response.message, 'danger')
			},
			success: function (data) {
				showToast('Sukses', data.message, 'success')

				if (data.formReset) {
					$(selector).trigger("reset");
				}
			},
		};

		const mergedConfig = {
			...defaultConfig,
			...ajaxConfig
		};

		e.preventDefault();
		$.ajax(mergedConfig);
	});
}


export function initDatatable(selector, config = {}) {
	const defaultConfig = {
		processing: true,
		serverSide: true,
		ajax: {
			url: $(selector).attr("data-url"),
			type: "POST",
		},
		language: {
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ entri",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
			sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			searchPlaceholder: "masukkan kata kunci",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "Sebelumnya",
				sNext: "Selanjutnya",
				sLast: "Terakhir",
			},
		},
	};

	const mergedConfig = {
		...defaultConfig,
		...config
	};
	return $(selector).DataTable(mergedConfig);
}
