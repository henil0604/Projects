function btnClick(val) {
    let screen = document.getElementById('screen');
    let buttons = document.getElementsByClassName('button');
    let value = screen.value + val;
    screen.value = value;
    console.log(value);

}


function equal() {
    let screen = document.getElementById('screen');
    let evalVal = eval(screen.value);
    if (evalVal == undefined) {
        screen.value = "0"
    }
    else {
        let evalVal = eval(screen.value);
        screen.value = evalVal;
    }
    console.log("Ans is:", screen.value);
}

function Del() {
    let screen = document.getElementById('screen');
    let screenString = screen.value.substring(0, screen.value.length - 1);
    console.log(screenString)
    screen.value = screenString;
}

function C() {
    let screen = document.getElementById('screen');
    screen.value = ""
    console.log("Screen Cleared");
}