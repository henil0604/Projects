const form = document.querySelector(".quiz-form");
const label = document.querySelectorAll(".quiz-form__ans");
const result = document.querySelector(".quiz__heading");
var score;

form.addEventListener("submit", (e) => {
    e.preventDefault();

    let score = 0;
    const userAns = [];

    for (let i = 0; i < form.getElementsByClassName("quiz-form__quiz").length; i++) {
        a = form.getElementsByClassName("quiz-form__quiz")[i]
        for (let j = 0; j < a.getElementsByClassName("quiz-form__ans").length; j++) {
            b = a.getElementsByClassName("quiz-form__ans")
            for (let k = 0; k < b[j].getElementsByClassName("quiz-input").length; k++) {
                c = b[j].getElementsByClassName("quiz-input")
                if (c[k].checked) {
                    userAns.push(c[k])
                }
            }
        }
    }

    outof = ""
    for (let i = 0; i < que_mark.length; i++) {
        outof += que_mark[i] + "+"
    }


    outof = eval(outof + 0)

    //check ans
    userAns.forEach((ans, i) => {
        if (ans.value == correctAns[i]) {
            score += parseInt(que_mark[i]);
            for (let i = 0; i < 4; i++) {
                const isChecked = ans.checked;
                if (isChecked) {
                    ans.parentElement.classList.add("correct");
                }
            }
        } else {
            for (let i = 0; i < 4; i++) {
                const isChecked = ans.checked;
                if (isChecked) {
                    ans.parentElement.classList.add("wrong");
                }
            }
        }
    });

    scrollTo(0, 0);
    result.style.display = "block";
    let output = 0;
    if (outof < 40) {
        interval = 60;
    } else {
        interval = 30
    }
    const timer = setInterval(() => {
        result.querySelector(".result").textContent = `${output}`;
        result.querySelector("#outof").textContent = `${outof}`;
        result.querySelector("#resultHide").value = `${output}`;
        if (output === score) {
            clearInterval(timer);
        } else {
            output++;
        }
    }, interval);
    document.getElementById('submit').innerHTML = ""
    form.innerHTML = ""

    function disableF5(e) {
        if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
            e.preventDefault();
            console.log("You Can Not Refresh Page")

        }
    };

    $(document).ready(function () {
        $(document).on("keydown", disableF5);
    });

});



