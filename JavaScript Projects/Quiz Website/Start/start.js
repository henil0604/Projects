
window.onload = function () {
	show(0)
}


var questions = [
	{
		id: 1,
		question: "What is the Full Form of RAM?",
		answer: "Random Access Memory",
		options: [
			"Random All Memory",
			"Read All Memory",
			"Random Access Memory",
			"Random Access Mode"
		]
	},
	{
		id: 2,
		question: "What is the Full Form of CPU?",
		answer: "Central Processing Unit",
		options: [
			"Code Process Unit",
			"Central Processing Unit",
			"Central Pack Unit",
			"Central Processing Use"
		]
	},
	{
		id: 3,
		question: "What is the Full Form of E-mail?",
		answer: "Electronic Mail",
		options: [
			"Elephant Mail",
			"Electric Mail",
			"Electronic Mail",
			"None Of the Above"
		]
	},
	{
		id: 4,
		question: "What is the Full Form of ROM?",
		answer: "Read Only Memory",
		options: [
			"Read Access Memory",
			"Read Only Memory",
			"Read Access Mode",
			"Recover All Memory"
		]
	},
	{
		id: 5,
		question: "What is the full form of EEPROM?",
		answer: "Electrically Erasable Programmable Read-Only Memory",
		options: [
			"Electrically Erasable Programmable Read-Only Memory",
			"Electrically Erasable Processable Read-Only Memory",
			"Electrically Erasable Programmable Random-Only Memory",
			"Electrically Erasable Programmable Read-Only Mode"
		]
	},
	{
		id: 6,
		question: "What is the full Form of BIOS?",
		answer: "Basic Input/Output System",
		options: [
			"Basic Input/Output System",
			"Basic Input of Option System",
			"Basic Interval Oprator System",
			"Basic Idea of Output System"
		]
	},
	{
		id: 7,
		question: `What is the full Form of MIME?`,
		answer: "Multipurpose Internet Mail Extension",
		options: [
			"Multipurpose Internet Mail Extension",
			"Multiple Internet Mail Extension",
			"Multipurpose Internal Mail Extension",
			"Multidimensional Internet Mail Extension"
		]
	},
	{
		id: 8,
		question: "What is the full Form of DVI?",
		answer: "Digital Visual Interface",
		options: [
			"Direct Visual Interface",
			"Digital Visual Interface",
			"Drive Visual Idea",
			"Digital Visulization Interface"
		]
	},
	{
		id: 9,
		question: "What is the full Form of CD?",
		answer: "Compact Disk",
		options: [
			"Compact Drive",
			"Control Disk",
			"Compact Dance",
			"Compact Disk"
		]
	},
	{
		id: 10,
		question: "What is the Full Form of DVD?",
		answer: "Digital Versatile Disk",
		options: [
			"Digital Versatile Drive",
			"Drive Versatile Disk",
			"Digital Versatile Disk",
			"Digital Vertical Disk"
		]
	}
]



function submitForm(e) {
	e.preventDefault()
	let name = document.forms["welcome-form"]["name"].value
	sessionStorage.setItem('userName', name)
	location.href = "file:///D:/Programming%20Languages/JavaScript%20Projects/Quiz%20Website/Main%20Quiz/quiz.html";
}

let question_count = 0;
let point = 0

function next() {
	window.onerror = function () {
		window.alert("One Answer Is must be Choosen")
	}
	//check Answer
	let userAnswer = document.querySelector("li.option.active").innerHTML;
	var user_points = document.getElementById('userPoints')
	if (userAnswer == questions[question_count].answer) {
		point = point + 10;
		user_points.innerHTML = point
		console.log("Points:", point)
		sessionStorage.setItem('Points', point)
	} else {
		point = point - 5;
		if (point < 0) {
			point = 0;
		}
		user_points.innerHTML = point
		console.log("Points:", point)

	}
	if (question_count == questions.length - 1) {
		sessionStorage.setItem('Time', `${minutes} Minutes and ${seconds} Seconds Taken`)
		clearInterval(myTime);
		location.href = "file:///D:/Programming%20Languages/JavaScript%20Projects/Quiz%20Website/Last%20Page/last.html"
		return;
	}


	++question_count
	show(question_count)
}

function show(count) {
	let user_name = document.getElementById('User_name')
	var Suser_name = sessionStorage.getItem('userName')
	user_name.innerHTML = `Welcome! ${Suser_name}`
	let question = document.getElementById('questions')

	// question.innerHTML = "<h2>" + questions[count].question + "</h2>";	

	question.innerHTML = `
		<h2>Q-${question_count + 1}. ${questions[count].question}</h2>
		<ul class="option_group">
			<li class="option">${questions[count].options[0]}</li>
			<li class="option">${questions[count].options[1]}</li>
			<li class="option">${questions[count].options[2]}</li>
			<li class="option">${questions[count].options[3]}</li>
    	</ul>
	`
	toogleActive()
}


function toogleActive() {
	let option = document.querySelectorAll("li.option")

	for (let i = 0; i < option.length; i++) {
		option[i].onclick = function () {
			for (let j = 0; j < option.length; ++j) {
				if (option[j].classList.contains("active")) { }
				option[j].classList.remove("active")
			}
			option[i].classList.add("active")
		}
	}
}




let dt = new Date(new Date().setTime(00))
let time = dt.getTime()
let seconds = Math.floor(time % (100 * 60) / 1000)
let minutes = Math.floor(time % (1000 * 60 * 60) / (1000 * 60))


let myTime = setInterval(function () {
	if (seconds < 59) {
		++seconds;
	}
	else {
		++minutes;
		seconds = 0;
	}
	let formetted_sec = seconds < 10 ? `0${seconds}` : `${seconds}`;
	let formetted_min = minutes < 10 ? `0${minutes}` : `${minutes}`;

	let mainTimer = formetted_min + ":" + formetted_sec;
	document.querySelector(".time").innerHTML = mainTimer;
}, 1000)

