
let name = sessionStorage.getItem('userName')
let points = sessionStorage.getItem('Points')
var greet = ""
if (points <= 10) {
	greet = "Prectise More! "
}
else if (points <= 40) {
	greet = "Well Tried! ";
}
else if (points <= 80) {
	greet = "So Close! ";
}
else {
	greet = "Well Done! "
}
let lasttime = sessionStorage.getItem('Time')

document.querySelector('.user_name').textContent = `${greet}` + name
document.querySelector('.points').textContent = points
document.querySelector('.timer').textContent = lasttime;

// console.clear()

function playAgain() {
	location.href = "file:///D:/Programming%20Languages/JavaScript%20Projects/Quiz%20Website/Start/start.html"
}
