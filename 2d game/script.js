var runSound = new Audio("run.mp3");
runSound.loop = true;

var jumpSound = new Audio("jump.mp3");
var deadSound = new Audio("dead.mp3");

var runWorkerId = 0;
var jumpWorkerId = 0;
var playerMarginTop = 400;

function keycheck(event){
    if(event.which == 13){
        //alert("enter key")
        if(runWorkerId == 0){
            runWorkerId = setInterval(run, 100);
            runSound.play();

            moveWorkerId = setInterval(moveBackground, 100);
            blockWorkerId = setInterval(createBlock, 100);
            moveBlockWorkerId = setInterval(moveBlocks, 100);
            scoreWorkerId = setInterval(score, 100);
        }
    }
    //space key
    if(event.which == 32){
        
        if(jumpWorkerId == 0){
            clearInterval(runWorkerId);
            runSound.pause();
            runWorkerId = -1;

            jumpWorkerId = setInterval(jump, 100);
            jumpSound.play();
        }
    }
}

var player = document.getElementById("player");
var runImageNumber = 1;

//run function
function run(){
    runImageNumber++;
    if(runImageNumber == 9){
        runImageNumber = 1;
    }
    player.src = "Run ("+runImageNumber+").png";

}

//jump function
var jumpNumber = 1;
function jump(){
    jumpNumber++;
    if(jumpNumber <= 7){
        playerMarginTop = playerMarginTop - 30;
        player.style.marginTop = playerMarginTop + "px";
    }

    if(jumpNumber >= 8){
        playerMarginTop = playerMarginTop + 30;
        player.style.marginTop = playerMarginTop + "px";
    }

    if(jumpNumber == 13){
        jumpNumber = 1;
        clearInterval(jumpWorkerId);
        jumpWorkerId = 0;

        runWorkerId = setInterval(run, 100);
        runSound.play();

        if(scoreWorkerId ==0){
            scoreWorkerId = setInterval(score,100);
        }

        if(moveBlockWorkerId == 0){
            moveBlockWorkerId = setInterval(moveBackground,100);
        }

        if(blockWorkerId == 0){
            blockWorkerId = setInterval(createBlock, 100);
        }

        if(moveWorkerId == 0){
            moveWorkerId = setInterval(moveBlocks,100);
        }
    }
    player.src = "Jump ("+jumpNumber+").png";
}

//background move

var background = document.getElementById("background");
var backgroundx = 0;
var moveWorkerId =0;
function moveBackground(){
    backgroundx = backgroundx - 20;
    background.style.backgroundPositionX = backgroundx + "px";
}

//create Blocks
var blockMarginLeft = 700;
var blockNumber = 1;
var blockWorkerId = 0;


function createBlock(){
    var block = document.createElement("div");
    block.className = "block";
    block.id = "block" + blockNumber;
    blockNumber++;

    var gap = Math.random()*(1000-400)+400;
    blockMarginLeft = blockMarginLeft + gap;
    block.style.marginLeft = blockMarginLeft+"px";

    background.appendChild(block);
}

//move Blocks
var moveBlockWorkerId = 0;
function moveBlocks(){
    for(var i=1; i<=blockNumber; i++){
        var currentBlock = document.getElementById("block" + i);
        var currentMarginLeft = currentBlock.style.marginLeft;
        var newMarginLeft = parseInt(currentMarginLeft) - 20;
        currentBlock.style.marginLeft = newMarginLeft + "px";

        //alert(newMarginLeft);
        //107 - 7
        if(newMarginLeft < 107 & newMarginLeft > 7){
            //alert(playerMarginTop);
            //380
            if(playerMarginTop > 380){
                clearInterval(runWorkerId);
                runSound.pause();

                clearInterval(jumpWorkerId);
                jumpWorkerId = -1;
                clearInterval(scoreWorkerId);
                clearInterval(blockWorkerId);
                clearInterval(moveWorkerId);
                clearInterval(moveBlockWorkerId);

                deadWorkerId = setInterval(dead, 100);
                deadSound.play();
            }

        }
    }

}
//dead

var deadImageNumber = 1;
var deadWorkerId = 0;
function dead(){

    deadImageNumber++;

    if(deadImageNumber == 11){
        deadImageNumber = 10;

        player.style.marginTop = "400px";

        document.getElementById("endScreen").style.visibility = "visible";
        document.getElementById("endScore").innerHTML = newScore;
    }
    player.src = "Dead (" + deadImageNumber + ").png";
}

//scpre
var scoreId = document.getElementById("score");
var scoreWorkerId = 0;
var newScore = 0;

function score(){
    newScore++;
    scoreId.innerHTML = newScore;
}

//page Reload

function reload(){
    location.reload();
}