function btn2(){
	var rm = document.getElementById('responsemain')
	rm.classList.add('rms')
	console.log("=>Your Form detail is At last of this Page")
	alert("Your Form detail is At last of this Page")
{
	var RFirstName = document.getElementById('RFirstName')
	var RFatherName = document.getElementById('RFatherName')
	var RSurname = document.getElementById('RSurname')
	var RFullName = document.getElementById('RFullName')
	var RAge = document.getElementById('RAge')
	var RBirthDate = document.getElementById('RBirthDate')
	var RCast = document.getElementById('RCast')
	var RCounty = document.getElementById('RCounty')
	var RState = document.getElementById('RState')
	var RPhoneNumber = document.getElementById('RPhoneNumber')
	var RHomePhoneNumber = document.getElementById('RHomePhoneNumber')
	var RAddress = document.getElementById('RAddress')
	var REmail = document.getElementById('REmail')
	var RHobby = document.getElementById('RHobby')
}
{
	var VFirstName = document.getElementById('firna').value;
	var VFatherName = document.getElementById('fatna').value;
	var VSurname = document.getElementById('surna').value;
	var VAge = document.getElementById('age').value;
	var VBirthDate = document.getElementById('birthdate').value;
	var VCast = document.getElementById('cast').value;
	var VCounty = document.getElementById('country').value;
	var VState = document.getElementById('state').value;
	var VPhoneNumber = document.getElementById('phoneNumber1').value;
	var VHomePhoneNumber = document.getElementById('phoneNumber2').value;
	var VAddress = document.getElementById('address').value;
	var VEmail = document.getElementById('emailId').value;
	var VEmail2 = document.getElementById('emailId2').value;
	var VHobby = document.getElementById('hobby').value;
}
firstNameR()
function firstNameR(){
	var firstName = firna.value;
		var regex = /^[a-zA-Z]/
	if (VFirstName == "") {
		RFirstName.innerHTML = "You Haven't add Your Age"
		RFirstName.classList.remove('response')
		RFirstName.classList.add('warn')
		fatherNameR()
		} else {
			if (regex.test(firstName)) {
				RFirstName.innerHTML = "Your First Name is " + VFirstName + ".";
				fatherNameR()
			} else {
				RFirstName.innerHTML = "You First Name is not sufficient"
				RFirstName.classList.remove('response')
				RFirstName.classList.add('warn')
				fatherNameR()
			}
		}
}

function fatherNameR(){
		var fatherName = fatna.value;
		var regex2 = /^[a-zA-Z]/
	if (VFatherName == "") {
		RFatherName.innerHTML = "You Haven't add Your father's Name"
		RFatherName.classList.remove('response')
		RFatherName.classList.add('warn')
		surNameR()
		} else {
			if (regex2.test(fatherName)) {
				RFatherName.innerHTML = "Your Father's Name is " + VFatherName;
				surNameR()
			} else {
				RFatherName.innerHTML = "You Father's Name is not sufficient"
				RFatherName.classList.remove('response')
				RFatherName.classList.add('warn')
				surNameR()
			}
		}
}

function surNameR(){
		var surName  = surna.value;
		var regex3 = /^[a-zA-Z]/
	if (VSurname=="") {
		RSurname.innerHTML = "You Haven't add Your Surame"
		RSurname.classList.remove('response')
		RSurname.classList.add('warn')
		ageR()
	} else {
		RSurname.innerHTML = "Your surName is " + VSurname;
		ageR()
	}
}

function ageR(){
	var Age = age.value;
	var regex4 = /^[0-9]/
	if (VAge == "") {
		RAge.innerHTML = "You Haven't add Your Age"
		RAge.classList.remove('response')
		RAge.classList.add('warn')
		birthDateR()
		} else {
			if (regex4.test(Age)) {
				RAge.innerHTML = "Your Age is " + VAge;
				birthDateR()
			} else {
				RAge.innerHTML = "You Age is not sufficient"
				RAge.classList.remove('response')
				RAge.classList.add('warn')
				birthDateR()
			}
		}
}

function birthDateR(){

	if (VBirthDate=="") {
		RBirthDate.innerHTML = "You Haven't add Your birthdate"
		RBirthDate.classList.remove('response')
		RBirthDate.classList.add('warn')
		castR();
	} else {
		RBirthDate.innerHTML = "Your birthdate is " + VBirthDate;
		castR();
	}

}

function castR(){
	var Cast = cast.value;
		if (Cast=="--SELECT--") {
			RCast.innerHTML = "You Haven't add Your Cast"
			RCast.classList.remove('response')
			RCast.classList.add('warn')
			countryR()
		} else {
			RCast.innerHTML = "Your Cast is " + VCast;
			countryR()
		}
}

function countryR(){
	var Loca = country.value;
		var regex5 = /[a-zA-Z]/
		if (Loca=="") {
			RCounty.innerHTML = "You Haven't add Your Country"
			RCounty.classList.remove('response')
			RCounty.classList.add('warn')
			stateR()
		} else {
			if (regex5.test(Loca)) {
				RCounty.innerHTML = "Your Country is " + VCounty;
				stateR()

			} else {
				RCounty.innerHTML = "You Contry's name is not sufficient"
				RCounty.classList.remove('response')
				RCounty.classList.add('warn')
				stateR()		
			}
		}
}

function stateR(){
	var State = state.value;
	var regex6 = /[a-zA-Z]/
	if (State=="") {
		RState.innerHTML = "You havn't add Your State"
		RState.classList.remove('response')
		RState.classList.add('warn')
		phoneNumber1R()
	} else {
		if (regex6.test(State)) {
			RCounty.innerHTML = "Your Contry is " + VState;
			phoneNumber1R()
		} else {
			RState.innerHTML = "Your State Name is not sufficient"
			RState.classList.remove('response')
			RState.classList.add('warn')
			phoneNumber1R()
		}
	}
}

function phoneNumber1R(){
	var PhoneNumber1 = phoneNumber1.value;
		var regex7 = /[0-9]{10}$/
		if (PhoneNumber1=="") {
			RPhoneNumber.innerHTML = "You haven't add your Phone Number"
			RPhoneNumber.classList.remove('response');
			RPhoneNumber.classList.add('warn');
			phoneNumber2R()
		} else {
			if (regex7.test(PhoneNumber1)) {
				RPhoneNumber.innerHTML = "Your Phone Number is +91 " + VPhoneNumber;
				phoneNumber2R()
			} else {
				RPhoneNumber.innerHTML = "Your Phone Number is not sufficient"
				RPhoneNumber.classList.remove('response');
				RPhoneNumber.classList.add('warn');
				phoneNumber2R()
			}
		}	
}

function phoneNumber2R(){
	var PhoneNumber2 = phoneNumber2.value;
		var regex8 = /[0-9]{10}$/
		if (PhoneNumber2=="") {
			RHomePhoneNumber.innerHTML = "You haven't add your Home Phone Number"
			RHomePhoneNumber.classList.remove('response');
			RHomePhoneNumber.classList.add('warn');
			addressR()
		} else {
			if (regex8.test(PhoneNumber2)) {
				RHomePhoneNumber.innerHTML = "Your Home Phone Number is +91 " + VHomePhoneNumber;
				addressR()
			} else {
				RHomePhoneNumber.innerHTML = "Your Home Phone Number is not sufficient"
				RHomePhoneNumber.classList.remove('response');
				RHomePhoneNumber.classList.add('warn');
				addressR()
			}
		}	
}


function addressR(){
	var Address = address.value;
		if (Address=="") {
			RAddress.innerHTML = "You Haven't add Your Address";
			RAddress.classList.remove('response');
			RAddress.classList.add('warn')
			emailR()
		} else {
			RAddress.innerHTML = "Your Address is " + VAddress;
			emailR()
		}
}

function emailR(){
	var EmailId = emailId.value;
		var regex8 = /^[_\-\.0-9a-zA-Z]/
		var EmailId2 = emailId2.value;
		if (EmailId=="") {
			REmail.innerHTML = "You Haven't add Your Email Id";
			REmail.classList.remove('response');
			REmail.classList.add('warn')
			hobbyR()
		} else {
			if (EmailId2=="@other(Define in box)") {
				REmail.innerHTML = "Your Email Id is " + VEmail;
				hobbyR()
			} else {
				if (regex8.test(EmailId)) {
					REmail.innerHTML = "Your Email is " + VEmail + VEmail2;
					hobbyR()
				} else {
					REmail.innerHTML = "Your Email Id is Not sufficient";
					REmail.classList.remove('response');
					REmail.classList.add('warn')
					hobbyR()
				}
			}
		} 
}

function hobbyR(){
	var Hobby = hobby.value;
		var regex9 = /[a-zA-Z]/
		if (Hobby=="") {
			RHobby.innerHTML = "You haven't add Your Hobby";
			RHobby.classList.remove('response');
			RHobby.classList.add('warn')
		} else {
			if (regex9.test(Hobby)) {
				RHobby.innerHTML = "Your Hobby is " + VHobby;
			} else {
				RHobby.innerHTML = "Your Hobby is not sufficient";
				RHobby.classList.remove('response');
				RHobby.classList.add('warn')
			}
		}
}
}