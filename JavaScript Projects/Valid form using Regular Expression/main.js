console.log("This is Validation Form Using Regular Expression In JavaScript...");

const name = document.getElementById('name');
const email = document.getElementById('Email');
const phone = document.getElementById('phoneNumber');
let validEmail = false;
let validPhone = false;
let validUser = false;

// console.log(name, email, phone)

name.addEventListener('blur', () => {
	console.log("Name is blured");
	//validate name
	let regex = /^[a-zA-Z]([0-9a-zA-Z]{2,10}$)/
	let str = name.value
	console.log("Your name is ", str);
	if (regex.test(str)) {
		console.log("Your Name is Valid!!!");
		name.classList.remove('is-invalid');
		validUser = true;
	} else {
		console.log("Your Name is Not Valid!!!");
		name.classList.add('is-invalid');
		validUser = false;
	}
});

email.addEventListener('blur', () => {
	console.log("Email is blured");
	//validate email

	let regex2 = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/
	let str2 = email.value;
	console.log("Your Email Id is ", str2);
	if (regex2.test(str2)) {
		console.log("Your Email is Valid!!!");
		email.classList.remove('is-invalid');
		validEmail = true;
	} else {
		console.log("Your Email is Not Valid!!!");
		email.classList.add('is-invalid');
		validEmail = false;
	}
});

phone.addEventListener('blur', () => {
	console.log("PhoneNumber is blured");
	//validate phone

	let regex3 = /^([0-9]){10}$/
	let str3 = phone.value;
	console.log("Your Phone Number is ", str3);
	if (regex3.test(str3)) {
		console.log("Your Phone Number is Valid!!!");
		phone.classList.remove('is-invalid');
		validPhone = true;
	} else {
		console.log("Your Phone Number is Not Valid!!!");
		phone.classList.add('is-invalid');
		validPhone = false;
	}
});


let submit = document.getElementById("submit");
submit.addEventListener('click', (e) => {
	e.preventDefault()

	console.log("You Clicked On submit Button");

	if (validEmail === true && validPhone === true && validUser === true) {
		console.log("Your Form is Valid")
		let success = document.getElementById('suc');
		let fail = document.getElementById('fa');
		// success.classList.add("show");
		success.innerHTML = `
			<div class="alert alert-success alert-dismissible fade show" id="success" role="alert">
				<strong>Success!</strong> Your form is Sucessfully submited 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		`
		// fail.classList.remove("show");
		fail.innerHTML = ``
	}
	else {
		console.log("Your form is not valid")
		let success = document.getElementById('suc');
		let fail = document.getElementById('fa');
		// fail.classList.add("show");
		fail.innerHTML = `
			<div class="alert alert-danger alert-dismissible fade show" id="fail" role="alert">
				<strong>Failed!</strong> Please Fill The Form Correctly
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		`
		// success.classList.remove("show");
		success.innerHTML = ``
	}


})