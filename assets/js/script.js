function develop(anchor) {
    anchor.parentNode.style.display = "none";
    document.getElementsByClassName('form-inline')[0].style.visibility = "visible";
    return false;
}

function toggle(name) {
	let input = document.getElementsByName(name)[0];
	input.focus();
	input.type = input.type === "text" ? "password" : "text";
}

window.onload = () => {
	makeServiceAjax().getDept().then((rep) => {
        rep = rep.filter(dept => (dept.code+'').length < 3);
        rep.sort(function(a, b) { return a.code - b.code; });
        let cookie_json = JSON.parse(decodeURIComponent(getCookie('depts_cookie')));
        let select = document.getElementById("depts");
        for (dept of rep) {
			let opt = document.createElement("option");
            let [code, nom] = [dept.code, dept.nom];
			opt.value = code;
			opt.innerText = code+" - "+nom;
			select.appendChild(opt);
            delete dept.codeRegion; delete dept.nom;
            dept.weight = cookie_json.hasOwnProperty(code) ? cookie_json[code] : 0; 
        }
        map_initialize(rep);
	}, (err) => {});
}

//INSERT INTO USER VALUES(email, hash, dept);