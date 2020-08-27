fetch();

function fetch() {

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "https://api.covid19api.com/summary", true)

    xhr.onload = function () {
        var test = document.getElementById("test")

        test.innerHTML = this.responseText

    }

}