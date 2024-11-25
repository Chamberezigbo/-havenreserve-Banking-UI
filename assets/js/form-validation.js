// Wait for the DOM to be ready
$(function () {
	// add the rule here
	$.validator.addMethod(
		"valueNotEquals",
		function (value, element, arg) {
			return arg !== value;
		},
		"Value must not equal arg."
	);
	// Initialize form validation on the registration form.
	// It has the name attribute "registration"
	$("form[name='registration']").validate({
		// Specify validation rules
		rules: {
			// The key name on the left side is the name attribute
			// of an input field. Validation rules are defined
			// on the right side
			surname: "required",
			otherName: "required",
			dateOfBirth: "required",
			gender: { valueNotEquals: "default" },
			phone: {
				required: true,
				minlength: 10,
			},
			email: {
				required: true,
				// Specify that email should be validated
				// by the built-in "email" rule
				email: true,
			},
			address: "required",
			city: "required",
			state: "required",
			zip: "required",
			country: "required",
			image: "required",
			idCard: "required",
			idNumber: "required",
			occupation: "required",
			turnover: "required",
			branch: { valueNotEquals: "default" },
			accountType: { valueNotEquals: "default" },
			deposit: "required",
			currency: { valueNotEquals: "default" },
			username: "required",
			password: {
				required: true,
				minlength: 5,
			},
			confirmPass: {
				required: true,
				equalTo: "#password",
			},
		},
		// Specify validation error messages
		messages: {
			surname: "Please enter your surname",
			otherName: "Please enter your other name",
			dateOfBirth: "Date of birth requires",
			gender: { valueNotEquals: "Please select an gender" },
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
			},
			email: "Please enter a valid email address",
			address: "please enter address",
			city: "please enter city",
			state: "please enter state",
			zip: "please enter Zip Code",
			country: "please enter country",
			image: "please select image",
			idCard: "please enter type of Id card",
			idNumber: "please enter id card number",
			occupation: "please enter occupation",
			turnover: "please enter your annual turnover",
			branch: { valueNotEquals: "Please select an branch" },
			accountType: { valueNotEquals: "Please select an accountType" },
			deposit: "please enter your deposit",
			currency: { valueNotEquals: "Please select an currency" },
			username: "please enter username",
			confirmPass: "password does not match",
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function (form) {
			form.submit();
		},
	});
});


// $("form[name='regForm']").validate({
// 	rules: {
// 		pin: {
// 			required: true,
// 			minlength: 5,
// 		},
// 		confirmPin: {
// 			required: true,
// 			equalTo: "#pin",
// 		},
// 	},
// 	messages: {
// 		pin: {
// 			required: "Please provide a password",
// 			minlength: "Your password must be at least 5 characters long",
// 		},
// 		confirmPin: "password does not match",
// 	},
// 	submitHandler: function (form) {
// 		form.submit();
// 	},
// });

