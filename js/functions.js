//Validates necessary info
function validateForm(e) {
	var filledOut = true;
	var requiredFields = document.querySelectorAll(".field_required");
	console.log(requiredFields);

	for(var j = 0; j < requiredFields.length; j++) {
		if(requiredFields[j].value == "") {
			requiredFields[j].classList.add("error");
			filledOut = false;
		}
		else if(requiredFields[j].value != "" && requiredFields[j].classList.contains("error")) {
			requiredFields[j].classList.remove("error");
		}
	}

	if(!filledOut) {
		e.preventDefault();
	}
}

//Hilights fields on focus
function setBackground(e) {
	if (e.type == "focus") {
		this.classList.toggle("highlight");
	}
	else if (e.type == "blur") {
		this.classList.toggle("highlight");
	}
}

window.addEventListener("load", function() {
	//Hilights 
	var fields = document.querySelectorAll(".form");
	console.log(fields);
	for(var i = 0; i < fields.length; i++) {
		fields[i].addEventListener("focus", setBackground);
		fields[i].addEventListener("blur", setBackground);
	}

	//REQUIRED 
	var submit = document.querySelector("input[type=submit]");
	submit.addEventListener("click", validateForm);
});