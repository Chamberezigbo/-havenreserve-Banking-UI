document.addEventListener("DOMContentLoaded", function () {
	//get all tabs
	var tabs = document.getElementsByClassName("tab");

	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab
	document.getElementById("nextBtn").addEventListener("click", function () {
		myForm.validate();
		if (currentTab == 0 && myForm.status() <= 3) {
			tabs[currentTab].style.display = "none";
			currentTab += 1;
			nextPrev(currentTab);
		} else if (currentTab == 1 && myForm.status() <= 1) {
			tabs[currentTab].style.display = "none";
			currentTab += 1;
			nextPrev(currentTab);
		} else if (currentTab == 2) {
			tabs[currentTab].style.display = "none";
			currentTab += 1;
			nextPrev(currentTab);
		} else if (currentTab == 3 || myForm.status() === 0) {
			$("#nextBtn").hide();
			$("#doneBtn").show();
		}
		if (myForm.status()) {
			$("#alert_form_error").show();
		} else {
			$("#alert_form_error").hide();
		}

		setInterval(() => {
			//check and show error alert
			if (myForm.status()) {
				$("#alert_form_error").show();
			} else {
				$("#alert_form_error").hide();
			}
		}, 3000);
	});

	document.querySelector("#regForm").addEventListener("submit", function (e) {
		//invoke the method
		if (myForm.validate() === true) {
			//validation successful, process form data here
			e.currentTarget.submit();
		} else {
			//validation failed
			e.preventDefault();
		}
	});
	document.getElementById("prevBtn").addEventListener("click", function () {
		tabs[currentTab].style.display = "none";
		currentTab -= 1;
		tabs[currentTab].style.display = "block";
		nextPrev(currentTab);
	});
	//create new instance of the function
	const myForm = new octaValidate("regForm");
	//build a custom rule
	myForm.customRule(
		"SWIFT",
		/^[A-Z|a-z|0-9]+$/,
		"Your swift code contains invalid characters"
	);

	function showTab(n) {
		// This function will display the specified tab of the form ...
		// ... and fix the Previous/Next buttons:
		tabs[n].style.display = "block";

		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
			$("#nextBtn").show();
			$("#doneBtn").hide();
			getValue();
		}
		if (n == tabs.length - 1) {
			$("#nextBtn").hide();
			$("#doneBtn").show();

			document
				.querySelector("#regForm")
				.addEventListener("submit", function (e) {
					//invoke the method
					if (myForm.validate() === true) {
						//validation successful, process form data here
						e.currentTarget.submit();
					} else {
						//validation failed
						e.preventDefault();
					}
				});
		} else {
			document.getElementById("nextBtn").innerHTML = "Next";
		}
		// ... and run a function that displays the correct step indicator:
		fixStepIndicator(n);
	}

	function nextPrev(n) {
		myForm.validate();

		/*if (n == 1 && myForm.status() !== 3) return false;

		if (n == -1 && myForm.status() !== 1) return false;
*/
		// Exit the function if any field in the current tab is invalid:
		// Hide the current tab:
		//tabs[currentTab].style.display = "none";
		// if you have reached the end of the form... :
		if (currentTab >= tabs.length) {
			//...the form gets submitted:
			document.getElementById("regForm").submit();
			return false;
		}
		// Otherwise, display the correct tab:
		showTab(currentTab);
	}

	function validateForm() {
		var tabs,
			y,
			i,
			valid = true;
		tabs = document.getElementsByClassName("tab");
		y = tabs[currentTab].getElementsByTagName("input");
		// A loop that checks every input field in the current tab:
		for (i = 0; i < y.length; i++) {
			// If a field is empty...
			if (y[i].value == "") {
				// add an "invalid" class to the field:
				y[i].className += " invalid";
				// and set the current valid status to false:
				valid = false;
			}
		}
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
			document.getElementsByClassName("step")[currentTab].className +=
				" finish";
		}
		return valid; // return the valid status
	}

	function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i,
			x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class to the current step:
		x[n].className += " active";
	}

	function getValue() {
		let accountName = document.getElementById("accountName").value;
		let accountNumber = document.getElementById("accountNumber").value;
		let amount = document.getElementById("amount").value;
		let swiftCode = document.getElementById("swiftCode").value;
		let narration = document.getElementById("narration").value;
		let bankName = document.getElementById("bankName").value;
		let bankAddress = document.getElementById("bankAddress").value;

		document.getElementById("showAccountName").innerHTML = accountName;
		document.getElementById("showAccountNumber").innerHTML = accountNumber;
		document.getElementById("showAmount").innerHTML = amount;
		document.getElementById("showNarration").innerHTML = narration;
		document.getElementById("showBIC").innerHTML = swiftCode;
		document.getElementById("showBankName").innerHTML = bankName;
		document.getElementById("showBankAddress").innerHTML = bankAddress;
	}
});
