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

export function initSelect2(selector, customConfig = null) {
	const $this = $(selector);
	const url = $this.data("url");
	const placeholder = $this.data("placeholder");
  
	let config = {
	  containerCssClass: ":all:",
	  placeholder: placeholder,
	  allowClear: true,
	  disabled: $this.prop("disabled"),
	  maximumSelectionLength: 5,
	};
  
	if (url) {
	  config = Object.assign(config, {
		ajax: {
		  url: url,
		  dataType: "json",
		  delay: 600,
		  processResults: function (data) {
			return {
			  results: data,
			};
		  },
		  cache: true,
		},
	  });
	}
  
	if (customConfig) {
	  config = Object.assign(config, customConfig);
	}
  
	return $this.select2(config);
  }

export function initDatatable(selector, config = {}) {
	const defaultConfig = {
		processing: true,
		serverSide: true,
		ajax: {
			url: $(selector).attr("data-url"),
			type: "POST",
		},
	};

	const mergedConfig = {
		...defaultConfig,
		...config
	};
	return $(selector).DataTable(mergedConfig);
}
