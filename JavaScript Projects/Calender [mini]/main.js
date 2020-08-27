var date = document.getElementById('date');
var day = document.getElementById('day');
var month = document.getElementById('month');
var year = document.getElementById('year');
var now = new Date();
var nowS = now.toString()
var nowMonth = nowS.substring(4,7)
var nowDate = now.getDate();
var nowDay = nowS.substring(0,3)
var nowYear = nowS.substring(11,15)


date.innerHTML = nowDate;

day.innerHTML = nowDay;

if (nowMonth == "Feb") {
	var nowMonthN = "February"
}else{
	if (nowMonth=="Jan") {
		nowMonthN = "January"
	}else{
		if (nowMonth=="Mar") {
			nowMonthN = "March"
		} else {
			if (nowMonth=="Apr") {
				nowMonthN = "April"
			} else {
				if (nowMonth=="May") {
					nowMonthN = "May"
				} else {
					if (nowMonth=="Jul") {
						nowMonthN = "July"
					} else {
						if (nowMonth=="Aug") {
							nowMonthN = "August"
						}
					}
				}
			}
		}
	}
}

month.innerHTML = nowMonthN;

year.innerHTML = nowYear;

console.log(nowS);
// console.log(nowDay);

Clock()
function Clock() {
	let time = new Date()
	let timeP = document.getElementById('time')
	let curruntHours = time.getHours();
	let curruntMinutes = time.getMinutes();
	let	curruntSeconds = time.getSeconds();

	curruntMinutes = (curruntMinutes < 10 ? "0": "") + curruntMinutes;
	curruntSeconds = (curruntSeconds < 10 ? "0": "") + curruntSeconds;

	let timeOfDay = (curruntHours < 12 ) ? "AM" : "PM";

	let currentTimeStr = curruntHours + ":" + curruntMinutes + ":" + curruntSeconds + " " + timeOfDay;

	timeP.innerHTML = currentTimeStr;
}
