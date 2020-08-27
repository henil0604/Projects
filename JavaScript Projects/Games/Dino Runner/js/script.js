document.querySelector(".gameOver").innerHTML = "Loading...";
// Variables
var secofanimationduration = 5
var scoreCont = document.getElementById("scoreCont")
var gameover = false
var idArray = []
var cactusTypes = ["single", "three"]
var dino = document.querySelector('.dino');
var gameOver = document.querySelector('.gameOver');
var lastCactusId;
var cross = true;
var score = 0

class Cactus {

    constructor(globaltype) {
        this.type = globaltype;
        this.id = "";
        this.temp = ``;
    }

    generateId(n) {
        var chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        var token = '';
        for(var i = 0; i < n; i++) {
            token += chars[Math.floor(Math.random() * chars.length)];
        }
        return token;
    }

    display(element) {

        this.id = this.generateId(20);
        idArray.push(this.id)

        if(this.type == "single"){
            this.temp = `
                <div class="cactus1" id="${this.id}"></div>
            `;
        } else if (this.type == "three") {
            this.temp = `
                <div class="cactus2" id="${this.id}">
                    <div class="cactus2child1"></div>
                    <div class="cactus2child2"></div>
                    <div class="cactus2child3"></div>
                </div>
            `;
        }

        document.querySelector(element).innerHTML += this.temp
    }

    getLastId() {
        return idArray[idArray.length - 1]
    }

    getid() {
        return this.id;
    }

    getallid() {
        return idArray;
    }

    animate(element, sec) {
        document.getElementById(element).classList.add("obstacleAni")
        document.getElementById(element).style.animationDuration = parseFloat(sec) + "s";
    }

    delete(element) {
        var cactus = document.getElementById(element);
        cactus.parentNode.removeChild(cactus)
    }

}


function createObsLoop() {      
    setTimeout(function() {  
        document.querySelector(".gameOver").innerHTML = "";
        cactus = new Cactus(cactusTypes[Math.floor(Math.random()*cactusTypes.length)])
        cactus.display("#obses")
        lastCactusId = cactus.getLastId()  
        cactus.animate(cactus.getid(), secofanimationduration)
        setTimeout(() => {
            cactus.delete(cactus.getid())
            lastCactusId = undefined;
            if(score < 200){
                decreaceAnimationDuration(0.1)
            } else if (score > 200 && score < 1000) {
                decreaceAnimationDuration(0.2)
            } else if (score > 1000 && score < 2000) {
                decreaceAnimationDuration(0.25)
            } else if (score > 2000 && score < 5000) {
                decreaceAnimationDuration(0.4)
            }
        }, (secofanimationduration * 1000));

        // condition
        if (gameover != true) {
            createObsLoop();         
        }
    }, (secofanimationduration * 1000))
}


createObsLoop()

function decreaceAnimationDuration(ds) {
    if(secofanimationduration > 2){
        secofanimationduration -= ds
    }
}


document.onkeydown = function (e) {
    if (e.keyCode == 38 || e.keyCode == 32) {
        dinoUp()
    }
    if (e.keyCode == 39) {
        dinoRight()
    }
    if (e.keyCode == 37) {
        dinoLeft()
    }
}

function dinoUp() {
    dino = document.querySelector('.dino');
    dino.classList.add('animateDino');
    setTimeout(() => {
        dino.classList.remove('animateDino')
    }, 700);
}


function dinoRight() {
    dino = document.querySelector('.dino');
    dinoX = parseInt(window.getComputedStyle(dino, null).getPropertyValue('left'));
    if(dinoX < 830){
        dino.style.left = dinoX + 200 + "px";
    }
}

function dinoLeft() {
    dino = document.querySelector('.dino');
    dinoX = parseInt(window.getComputedStyle(dino, null).getPropertyValue('left'));
    if (dinoX > 30) {
        dino.style.left = (dinoX - 200) + "px";
    }
}

setInterval(() => {
    if(lastCactusId != undefined && gameover != true){

        dx = parseInt(window.getComputedStyle(dino, null).getPropertyValue('left'));
        dy = parseInt(window.getComputedStyle(dino, null).getPropertyValue('top'));

        obstacle = document.getElementById(lastCactusId)

        ox = parseInt(window.getComputedStyle(obstacle, null).getPropertyValue('left'));
        oy = parseInt(window.getComputedStyle(obstacle, null).getPropertyValue('top'));

        offsetX = Math.abs(dx - ox);
        offsetY = Math.abs(dy - oy);

        if (offsetX < 140) {
            dinoUp()
            setTimeout(() => {
                dinoRight()
            }, 500);
            setTimeout(() => {
                dinoLeft()
            }, 1000);
        }

        if (offsetX < 73 && offsetY < 52) {
            gameOver.innerHTML = "Game Over - Reload to Play Again"
            gameover = true          
            // document.querySelector("#obses").innerHTML = ""
        }
        else if (offsetX < 145 && cross) {
            score += 100;
            updateScore(score);
            cross = false;
            setTimeout(() => {
                cross = true;
            }, 1000);
        }
    
    }

    if (gameover == true) {
        gameOver.innerHTML = "Game Over - Reload to Play Again"
        gameover = true          
        document.querySelector("#obses").innerHTML = ""
    }

}, 100);

function updateScore(score) {
    scoreCont.innerHTML = "Your Score: " + score
}




