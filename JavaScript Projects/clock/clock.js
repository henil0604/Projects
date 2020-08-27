console.log(" this is clock")


localStorage.clear()


function updateClock() {
	let time = new Date()
	let curruntHours = time.getHours('');
	let curruntMinutes = time.getMinutes('');
	let	 curruntSeconds = time.getSeconds('')
	let currentDate = time.getDate()
	let currentMonth = time.getMonth()
	let CurrentYear = time.getFullYear()

	curruntMinutes = (curruntMinutes < 10 ? "0": "")+ curruntMinutes;
	curruntSeconds = (curruntSeconds < 10 ? "0": "")+ curruntSeconds;

	let timeOfDay = (curruntHours < 12 ) ? "AM" : "PM";

	curruntHours = (curruntHours>12) ? curruntHours - 12 : curruntHours;
	curruntHours = (curruntHours==0) ? 12 : curruntHours;
	
	let currentTimeStr = "Date:- " + currentDate + "/" + ++currentMonth + '/' + CurrentYear + " " + "Time:- " +  curruntHours + ":" + curruntMinutes + ":" + curruntSeconds + " " + timeOfDay;
	console.log(currentTimeStr)

	document.getElementById('clock').innerHTML = currentTimeStr;
	// console.log("This is the current Time :-", currentTimeStr);
}

function feedBack(){
	window.alert("Note:- You can give feed Back Only One time")
	const FeedBack = feedBackInput.value;
	localStorage.setItem('feed', FeedBack);
	let Main = localStorage.getItem('feed');
	document.getElementById('feedBackOutput').innerHTML = "Your Feed Back is :-"+ " " + Main;
	if (FeedBack==="") {
		window.alert("You Have to Input Something in Input Box")
		document.getElementById('feedBackOutput').innerHTML = 'Sorry First Input Something Input Box!!!'
}}