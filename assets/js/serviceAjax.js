function makeServiceAjax() {
	var api = "https://geo.api.gouv.fr/";
	var service = {
		"getDept": getDepartments
	};

	var method = "GET";
	var header = "X-Auth-Token";
	var token = "";

	function getDepartments() {
		var url = api+"departements";
		
		return new Promise(function(resolve, reject) {
			http = new XMLHttpRequest();

			http.open(method, url);
			http.setRequestHeader(header, token);
			http.responseType = "json";

			http.onload = function() {
				if (http.status == 500)
					reject("Internal Server Error "+http.statusText);
				else if (http.status == 404)
					reject("Not Found Error "+http.statusText);
				else if (http.status == 200)
					resolve(this.response);
				else
					reject("Error "+http.statusText);
			};

			http.onerror = function() {
				reject("Network Error");
			};

			http.send();
		});
	};

	return service;
}