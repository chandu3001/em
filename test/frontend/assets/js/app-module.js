/*
 Template Name: Mentric Wap Bootstrap 
 Author: Mentrictech
 File: App Module js
 */

"use strict";
var appModule = {};
const appLogout = "#app-logout";

(function (NioApp, $) {
	window.appModule = {
		cookieOption: {
		},
		loadSwal: {},
		setData: function (data) {
			return new Promise(function (resolve, reject) {
				let baseUrl;
				let authToken;

				if (typeof data == "object" && Object.keys(data).length > 0) {
					for (const prop in data) {
						$.cookie(prop, data[prop], appModule.cookieOption);
					}

					resolve(true);
				} else {
					reject("Invalid data");
				}
			});
		},
		clearData: function (data) {
			return new Promise(function (resolve, reject) {
				var cookies = $.cookie();
				for (var cookie in cookies) {
					$.removeCookie(cookie);
				}

				setTimeout(function () {
					resolve(data);
				}, 1000);
			});
		},
		getToken: function () {
			return parseValue($.cookie("access_token"));
		},
		getUser: function () {
			if (appUser) {
				return appUser;
			} else {
				return "";
			}
		},
		getCookie: function (prop) {
			return parseValue($.cookie(prop));
		},
		checkAuth: async function () {
			const auth = await appModule.getCookie('access_token');
			if(parseValue(auth) != '') {
				return true;
			} else {
				window.location.href = formUrl('school/login');
			}
		},
		setStatus: function (lStatus) {
			if (lStatus == true) {
				processStatus = true;
			} else {
				processStatus = false;
				// window.location.href = formUrl('');
			}
		},
		logout: function () {
			var dfd = jQuery.Deferred();

			$.ajax({
				url: formApiUrl("admin/logout"),
				type: "post",
				dataType: "json",
				headers: {
					Authorization: `Bearer ${this.getToken()}`,
				},
				beforeSend: function () {
					this.loadSwal = Swal.fire({
						
					});
				},
				success: function (res) {
					dfd.resolve(res);
				},
				error: function (error) {
					dfd.reject(error);
				},
				complete: function () {
					this.loadSwal.close();
				},
			});

			return dfd.promise();
		},
	};

	// Logout
	$(document).on('click', appLogout, function(e) {
		e.preventDefault();
		const redirect = $(e.currentTarget).data('redirect');

		if (parseValue(redirect) == '') {
			NioApp.Toast('No redirect url', 'error');
			return false;
		}
		appModule.clearData().then(function () {
			setTimeout(function () {
					window.location.href = formUrl(redirect);
			}, 2000);
		}); // Clear Stored login data
	});
})(NioApp, jQuery);
