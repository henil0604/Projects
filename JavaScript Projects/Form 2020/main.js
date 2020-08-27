function load(){
	console.log(`=>  If you Want To Print Your Form Here:
	1.Fill The Form Correctly
	2.Click On the Submit Button`)
}

function btn(){
	nameOutput()
	//Name
	function nameOutput(){
	var firstName = firna.value;
	var fatherName = fatna.value;
	var surName  = surna.value;
	var mainName = firstName + " " + fatherName + " " + surName;
	var regex = /^[a-zA-Z]/
	if (firstName, fatherName, surName==="") {
		console.error("You haven't add NAME")
		ageOutput()
	} else {
		if (regex.test(mainName)) {
			console.log("Your Full Name is :- ", mainName);
			ageOutput()
		} else {
			console.error("Your Name is not sufficient")
			ageOutput()
		}
	}
	}

	//Age
	function ageOutput(){
		var Age = age.value;
		var regex2 = /^[0-9]/
		if (Age == "") {
			console.error("You haven't add your Age");
			birthDateOutput();
		} else {
			// console.log("Your Age is:- ", Age)
			// birthDateOutput();
			if (regex2.test(Age)) {
				console.log("Your Age is:- ", Age)
				birthDateOutput()
			} else {
				console.error("Your Age is Not sufficient")
				birthDateOutput()
			}
		}
	}
	//Birth Date
	function birthDateOutput(){
		var birthDate = birthdate.value;
		if (birthDate=="") {	
			console.error("You haven't Add your Birth Date!!!")
			castOutput()
		} else {
			console.log("Your Birthdate is:- ", birthDate);
			castOutput();
		}
	}
	function castOutput(){
		var Cast = cast.value;
		var regex3 = /^[a-zA-Z]/
		if (Cast=="--SELECT--") {
			console.error("You haven't choose Your Cast!!!");
			locationOutput()
		} else {
			if (regex3.test(Cast)) {
				console.log("Your Cast is:- ", Cast);
				locationOutput()
			} else {
				console.error("Your Cast is not sufficient")
				locationOutput()
			}
		}
	}
	function locationOutput(){
		var Loca = country.value;
		var regex4 = /[a-zA-Z]/
		if (Loca=="") {
			console.error("You haven't add Your Country!!!")
			stateOutput()
		} else {
			if (regex4.test(Loca)) {
				console.log("Your Country IS:- ", Loca);
				stateOutput()
			} else {
				console.error("Your Country's name is not sufficient")
				stateOutput()
			}
		}
	}
	function stateOutput(){
		var State = state.value;
		var regex5 = /[a-zA-Z]/
		if (State=="") {
			console.error("You haven't add Your State!!!");
			phoneNumberOutput1();
		} else {
			if (regex5.test(State)) {
				console.log("Your State is:- ", State)
				phoneNumberOutput1();
			} else {
				console.error("Your State's Name is not sufficient")
				phoneNumber1()
			}
		}
	}
	function phoneNumberOutput1(){
		var PhoneNumber1 = phoneNumber1.value;
		var regex6 = /[0-9]{10}$/
		if (PhoneNumber1=="") {
			console.error("You haven't add your phone number!!!");
			phoneNumberOutput2();
		} else {
			if (regex6.test(PhoneNumber1)) {
				console.log("Your Phone number is:- ", PhoneNumber1)
				phoneNumberOutput2();
			} else {
				console.error("Your Phone Number is not sufficient")
				phoneNumberOutput2()
			}
		}
	}
	function phoneNumberOutput2(){
		var PhoneNumber2 = phoneNumber2.value;
		var regex7 = /[0-9]{10}$/
		if (PhoneNumber2=="") {
			console.error("You Haven't add Your Home Phone Number!!!");
			addressOutput();
		} else {
			if (regex7.test(PhoneNumber2)) {
				console.log("Your Home Phone number is:- ", PhoneNumber2)
				addressOutput();
			} else {
				console.error("Your Home Phone Number is not sufficient")
				addressOutput()
			}
		}
	}
	function addressOutput(){
		var Address = address.value;
		if (Address=="") {
			console.error("You Haven't Add Your Address!!!")
			emailIdOutput();
		} else {
			console.log("Your Address is:- ", Address)
			emailIdOutput();
		}
	}
	function emailIdOutput(){
		var EmailId = emailId.value;
		var regex8 = /^[_\-\.0-9a-zA-Z]/
		var EmailId2 = emailId2.value;
		if (EmailId=="") {
			console.error("You haven't add Your E-mail Id!!!");
			hobbyOutput();
		} else {
			if (EmailId2=="@other(Define in box)") {
				console.log("Your E-mail id is:- ", EmailId);
				hobbyOutput();
			} else {
				if (regex8.test(EmailId)) {
					console.log("Your E-mail Id is:- ", EmailId + EmailId2)
					hobbyOutput()
				} else {
					console.error("Your Email Id is not sufficient")
					hobbyOutput()
				}
			}
		}
	}
	function hobbyOutput(){
		var Hobby = hobby.value;
		var regex9 = /[a-zA-Z]/
		if (Hobby=="") {
			console.error("You haven't add Your Hobby!!!");
		} else {
			if (regex9.test(Hobby)) {
				console.log("Your Hobby is:-", Hobby);	
			} else {
				console.error("Your Hobby is not sufficient")
			}
		}
	}
}