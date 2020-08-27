function timer_start() {
    var btn = document.getElementById('btn')
    btn.innerHTML = `<a class="btn btn-danger btn-outline mx-2 text-white" accesskey="s" id="stop" onclick="timer_stop()">Stop</a>`
    var card_time = document.getElementById('card_time')
    let dt = new Date(new Date().setTime(00))
    let time = dt.getTime()
    let seconds = Math.floor(time % (100 * 60) / 1000)
    let minutes = Math.floor(time % (1000 * 60 * 60) / (1000 * 60))
    var myTime = setInterval(timerInterval, 1000)
    function timerInterval() {
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
        card_time.innerHTML = mainTimer;
    }
}

function timer_stop() {
    var card_time = document.getElementById('card_time')
    sessionStorage.setItem('timer', card_time.innerText)
    timer = sessionStorage.getItem('timer')
    setInterval(() => {
        card_time.innerHTML = timer;
    }, 0.1)
}
