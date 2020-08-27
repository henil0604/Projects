var red = document.getElementById('red');
var yellow = document.getElementById('yellow')
var green  = document.getElementById('green')
var timem = new Date()
var timeD = timem.getDate()
var timeMo = timem.getMonth()
var timeY = timem.getFullYear()
var timeH = timem.getHours()
var timeM = timem.getMinutes()
var timeS = timem.getSeconds()
var time = timeD + "/" + timeMo + "/" + timeY + " " + timeH + ":" + timeM + ":" + timeS;




function main(){
	setTimeout(function () {
		{
			var timem = new Date()
			var timeD = timem.getDate()
			var timeMo = timem.getMonth()
			var timeY = timem.getFullYear()
			var timeH = timem.getHours()
			var timeM = timem.getMinutes()
			var timeS = timem.getSeconds()
			var time = timeD + "/" + timeMo + "/" + timeY + " " + timeH + ":" + timeM + ":" + timeS;
		}
		green.classList.remove('green')
		green.classList.add('greenhide')
		red.classList.remove('redhide')
		red.classList.add('red')
		console.log('Red Singnal Light at ', time)
	},100)


	setTimeout(function () {
		{
			var timem = new Date()
			var timeD = timem.getDate()
			var timeMo = timem.getMonth()
			var timeY = timem.getFullYear()
			var timeH = timem.getHours()
			var timeM = timem.getMinutes()
			var timeS = timem.getSeconds()
			var time = timeD + "/" + timeMo + "/" + timeY + " " + timeH + ":" + timeM + ":" + timeS;
		}
		var red = document.getElementById('red');
		red.classList.remove('red')
		red.classList.add('redhide')
		console.log('Yellow Singnal Light at ', time)
		yellow.classList.remove('yellowhide')
		yellow.classList.add('yellow')
	},14000)


	setTimeout(function () {
		{
			var timem = new Date()
			var timeD = timem.getDate()
			var timeMo = timem.getMonth()
			var timeY = timem.getFullYear()
			var timeH = timem.getHours()
			var timeM = timem.getMinutes()
			var timeS = timem.getSeconds()
			var time = timeD + "/" + timeMo + "/" + timeY + " " + timeH + ":" + timeM + ":" + timeS;
		}
		var red = document.getElementById('red');
		yellow.classList.remove('yellow')
		yellow.classList.add('yellowhide')
		console.log('Green Singnal Light at ', time)
		green.classList.remove('greenhide')
		green.classList.add('green')
	},18000)


	setTimeout(function (){
		main()
	},33000)
}
main()