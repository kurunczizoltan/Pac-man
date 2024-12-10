<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=2.0">

<style> 
canvas {
    border:1px solid black;
    background-color: black;
    position:relative;
    top: 10px;
    left: 400px;
}
body{
    background-color: MidnightBlue;
    overflow-x: hidden;
}

</style>
</head>
<body onload="startGame()">
<script>

var myGamePiece;
var myGhost = [];
var ghost;
var mySound;
var mySound1;
var mySound2;
var mySound3;
var mySound4;
var irany0 = 0;
var irany1 = 0;
var irany2 = 0;
var irany3 = 0;
var mod0 = 0;
var mod1 = 0;
var mod2 = 0;
var mod3 = 0;
var fal = [];
var bogyo = [];
var bogyofigy = 0;
var aktbogyo = 0;
var gyumi = 0;
var gyumifigy = 0;
var aktgyumi = 0;
var vangyumi = 0;
var gyumiposs = 0;
var jatek = 0;
var myScore;
var ate = 0;
var level = 1;
var health = 3;
var healthpoint = [];
var zoldi;
var pinki;
var piros;
var feher;
var levelup;
var vege = 0;

function startGame() {
    ate = 0;
    jatek = 0;
    gyumiposs = 0;
    vangyumi = 0;
    gyumifigy = 0;
    gyumi = 0;
    mod3 = 0;
    mod2 = 0;
    mod1 = 0;
    mod0 = 0;
    irany3 = 0;
    irany2 = 0;
    irany1 = 0;
    irany0 = 0;
    vege = 0;
    myGamePiece = new component(30, 30, "yellow", 220, 120);
    myScore = new component("20px", "Consolas", "white", 0, 15, "text");
    szint = new component("30px", "Consolas", "white", 185, 100, "text");
    myGhost[0] = new component(30, 30, "green", 85, 60);
    myGhost[1] = new component(30, 30, "pink", 365, 60);
    myGhost[2] = new component(30, 30, "red", 365, 180);
    myGhost[3] = new component(30, 30, "white", 85, 180);

    gyumi = new component(20, 20, "transparent", 230, 125);
    //falak

    fal[1] = new component(20, 111, "blue", 0, 0);      //bal felső fal
    fal[2] = new component(20, 111, "blue", 0, 160);    //bal alsó fal

    fal[3] = new component(20, 111, "blue", 460, 0);    //jobb felső fal
    fal[4] = new component(20, 111, "blue", 460, 160);  //jobb alsó fal

    fal[5] = new component(440, 10, "blue", 20, 0);     //map teteje
    fal[6] = new component(440, 10, "blue", 20, 260);   //map alja

    //felső rész
    fal[0] = new component(10, 60, "blue", 70, 45);     //fal bal fent, bal oldala
    fal[8] = new component(50, 10, "blue", 80, 45);     //fal bal fent, teteje
    fal[9] = new component(120, 10, "blue", 180, 45);   //fal középen fent, teteje
    fal[10] = new component(10, 50, "blue", 120, 55);   //fal bal fent, jobb oldala
    fal[11] = new component(90, 10, "blue", 120, 95);  //fal középen, középső lyuk bal oldala
    fal[12] = new component(90, 10, "blue", 270, 95);  //fal középen, középső lyuk jobb oldala
    fal[13] = new component(10, 50, "blue", 350, 55);   //fal jobb fent, bal oldala
    fal[14] = new component(60, 10, "blue", 350, 45);   //fal jobb fent, teteje
    fal[15] = new component(10, 60, "blue", 400, 45);   //fal jobb fent, jobb oldala
    
    //alsó rész
    fal[7] = new component(10, 60, "blue", 70, 165);    //fal bal lent, bal oldala 
    fal[16] = new component(50, 10, "blue", 80, 215);   //fal bal lent, alja
    fal[17] = new component(120, 10, "blue", 180, 215); //fal középen lent, alja
    fal[18] = new component(90, 10, "blue", 120, 165);  //fal középen, középső lyuk bal oldala
    fal[19] = new component(90, 10, "blue", 270, 165);  //fal középen, középső lyuk jobb oldala
    fal[20] = new component(10, 50, "blue", 120, 165);  //fal bal lent, jobb oldala
    fal[21] = new component(10, 50, "blue", 350, 165);  //fal jobb lent, bal oldala
    fal[22] = new component(60, 10, "blue", 350, 215);  //fal jobb lent, alja
    fal[23] = new component(10, 60, "blue", 400, 165);  //fal jobb lent, jobb oldala
    
    //szellemek helyei
    fal[24] = new component(40, 10, "transparent", 80, 95);    //fal bal fent, alja
    fal[25] = new component(40, 10, "transparent", 80, 165);   //fal bal lent, teteje
    fal[26] = new component(40, 10, "transparent", 360, 165);  //fal jobb lent, teteje
    fal[27] = new component(40, 10, "transparent", 360, 95);   //fal jobb fent, alja


    //bogyók
    bogyo[0] = new component(10, 10, "gold", 40, 25);       //bal felső sarok
    bogyo[1] = new component(10, 10, "gold", 40, 77,5);
    bogyo[2] = new component(10, 10, "gold", 40, 130);
    bogyo[3] = new component(10, 10, "gold", 40, 182,5);
    bogyo[4] = new component(10, 10, "gold", 40, 235);      //bal alsó sarok
    bogyo[5] = new component(10, 10, "gold", 92, 235);
    bogyo[6] = new component(10, 10, "gold", 145, 235);
    bogyo[7] = new component(10, 10, "gold", 200, 235);
    bogyo[8] = new component(10, 10, "gold", 265, 235);
    bogyo[9] = new component(10, 10, "gold", 320, 235);
    bogyo[10] = new component(10, 10, "gold", 375, 235);
    bogyo[11] = new component(10, 10, "gold", 430, 25);     //jobb felső sarok
    bogyo[12] = new component(10, 10, "gold", 430, 235);    //jobb alsó sarok
    bogyo[13] = new component(10, 10, "gold", 430, 77,5);
    bogyo[14] = new component(10, 10, "gold", 430, 130);
    bogyo[15] = new component(10, 10, "gold", 430, 182,5);
    bogyo[16] = new component(10, 10, "gold", 92, 25);
    bogyo[17] = new component(10, 10, "gold", 145, 25);
    bogyo[18] = new component(10, 10, "gold", 200, 25);
    bogyo[19] = new component(10, 10, "gold", 265, 25);
    bogyo[20] = new component(10, 10, "gold", 320, 25);
    bogyo[21] = new component(10, 10, "gold", 375, 25);
    bogyo[22] = new component(10, 10, "gold", 145, 65);
    bogyo[23] = new component(10, 10, "gold", 320, 190);
    bogyo[24] = new component(10, 10, "gold", 320, 65);
    bogyo[25] = new component(10, 10, "gold", 145, 190);
    bogyo[26] = new component(10, 10, "gold", 200, 190);
    bogyo[27] = new component(10, 10, "gold", 265, 190);
    bogyo[28] = new component(10, 10, "gold", 200, 65);
    bogyo[29] = new component(10, 10, "gold", 265, 65);

    
    healthpoint[0] = new component(10, 10, "transparent", 10, 260);
    if(health >= 1){
        healthpoint[1] = new component(10, 10, "yellow", 10, 260);
    }
    if(health >= 2){
        healthpoint[2] = new component(10, 10, "yellow", 30, 260);
    }
    if(health == 3){
        healthpoint[3] = new component(10, 10, "yellow", 50, 260);
    }

    mySound = new sound("die.mp3");
    mySound1 = new sound("waka.mp3");
    mySound2 = new sound("fruit.mp3");
    mySound3 = new sound("winsound.mp3");
    mySound4 = new sound("startsound.mp3");

    myGameArea.start();
    
    mySound4.play();

    szint.text = "LEVEL:" + level;
    szint.update();
    
    
    setTimeout(indulas, 5000);
    
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 480;
        this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
    },
    stop : function() {
        clearInterval(this.interval);
    },    
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}


function component(width, height, color, x, y, type) {
        this.type = type;
        this.color = color;
        this.width = width;
        this.height = height;
        if(color == "yellow"){
            this.speedX = 0;
            this.speedY = 0;
        }if((color == "pink") || (color == "green") || (color == "white") || (color == "red")){
            this.speedX = 0;
            this.speedY = 0;
        }
        if((color == "blue") || (color == "gold") || (color == "orange")){
            this.speedX = 0;
            this.speedY = 0;
        }
        this.x = x;
        this.y = y;    
        this.update = function() {
            ctx = myGameArea.context;
            if (this.type == "text") {
                ctx.font = this.width + " " + this.height;
                ctx.fillStyle = color;
                ctx.fillText(this.text, this.x, this.y);
            }else{
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
            }
        }

        this.newPos = function() {
            this.x += this.speedX;
            this.y += this.speedY;        
        }

        this.crashWith = function(otherobj) {
            var myleft = this.x;
            var myright = this.x + (this.width);
            var mytop = this.y;
            var mybottom = this.y + (this.height);
            var otherleft = otherobj.x;
            var otherright = otherobj.x + (otherobj.width);
            var othertop = otherobj.y;
            var otherbottom = otherobj.y + (otherobj.height);
            var crash = true;
            if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
                crash = false;
            }
            return crash;
        }

        this.bumpinto = function(otherobj){
            var myleft = this.x;
            var myright = this.x + (this.width);
            var mytop = this.y;
            var mybottom = this.y + (this.height);
            var myspeedX = this.speedX;
            var myspeedY = this.speedY;
            var othercolor = otherobj.color;
            var otherleft = otherobj.x;
            var otherright = otherobj.x + (otherobj.width);
            var othertop = otherobj.y;
            var otherbottom = otherobj.y + (otherobj.height);
            if((othercolor == "blue") && (mybottom >= othertop) && (mytop <= otherbottom)){
                if (myright == otherleft) {
                    this.speedX = 0;
                    this.x = (otherobj.x - this.width) - level;
                }
                if (myleft == otherright){
                    this.speedX = 0;
                    this.x = (otherobj.x + otherobj.width) + level;
                }
            }
        
            if((othercolor == "blue") && (myright >= otherleft) && (myleft <= otherright)){
                if(mybottom == othertop){
                    this.speedY = 0;
                    this.y = (otherobj.y - this.height) - level;
                }
                if(mytop == otherbottom){
                    this.speedY = 0;
                    this.y = (otherobj.y + otherobj.height) + level;
                }
            }   
        }

        this.eatit = function(otherobj){
            var myleft = this.x;
            var myright = this.x + (this.width);
            var mytop = this.y;
            var mybottom = this.y + (this.height);
            var othercolor = otherobj.color;
            var otherleft = otherobj.x;
            var otherright = otherobj.x + (otherobj.width);
            var othertop = otherobj.y;
            var otherbottom = otherobj.y + (otherobj.height);
            var eaten = false;

            if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
                eaten = false;
            }else{
                eaten = true;
            }
            return eaten;
        }   
        


        this.ghostbumpinto = function(otherobj){
            var myleft = this.x;
            var myright = this.x + (this.width);
            var mytop = this.y;
            var mybottom = this.y + (this.height);
            var myspeedX = this.speedX;
            var myspeedY = this.speedY;
            var othercolor = otherobj.color;
            var otherleft = otherobj.x;
            var otherright = otherobj.x + (otherobj.width);
            var othertop = otherobj.y;
            var otherbottom = otherobj.y + (otherobj.height);
            if((othercolor == "blue") && (mybottom >= othertop) && (mytop <= otherbottom)){
                if (myright == otherleft) {
                    this.speedX = 0;
                    this.x = (otherobj.x - this.width) - 1;
                    return true;
                }

                if (myleft == otherright){
                    this.speedX = 0;
                    this.x = (otherobj.x + otherobj.width) + 1;
                    return true;
                }
            }

            if((othercolor == "blue") && (myright >= otherleft) && (myleft <= otherright)){
                if(mybottom == othertop){
                    this.speedY = 0;
                    this.y = (otherobj.y - this.height) - 1;
                    return true;
                }
            
                if(mytop == otherbottom){
                    this.speedY = 0;
                    this.y = (otherobj.y + otherobj.height) + 1;
                    return true;
                }
            }
            return false;
        }
    }



function updateGameArea() {
    //Waka indítása, ha mozog
    if((myGamePiece.speedX != 0) || (myGamePiece.speedY != 0)){
        mySound1.play();  
    }else{
        mySound1.stop();
    }
    
    if(irany0 > 0){   
        mozgas0();
    }
    if(irany1 > 0){
        mozgas1();
    }
    if(irany2 > 0){
        mozgas2();
    }
    if(irany3 > 0){
        mozgas3();
    }
    
    if(health < 0){
        szint = 0;
        szint = new component("30px", "Consolas", "white", 165, 140, "text");
        szint.text = "GAME OVER"
        szint.update();
    }


    if((myGhost[0].y == 106) && (myGhost[0].x == 85)){
        myGhost[0].y == 107;
        irany0 = (Math.floor(Math.random() * 2)) + 3;
        fal[24] = 0;
        fal[24] = new component(40, 10, "blue", 80, 95);
    }

    if((myGhost[1].y == 106) && (myGhost[1].x == 365)){
        myGhost[1].y == 107;
        irany1 = (Math.floor(Math.random() * 2)) + 3;
        fal[27] = 0;
        fal[27] = new component(40, 10, "blue", 360, 95);
    }

    if((myGhost[3].y == 134) && (myGhost[3].x == 85)){
        myGhost[3].y == 133;
        irany3 = (Math.floor(Math.random() * 2)) + 3;
        fal[25] = 0;
        fal[25] = new component(40, 10, "blue", 80, 165);
    }

    if((myGhost[2].y == 134) && (myGhost[2].x == 365)){
        myGhost[2].y == 133;
        irany2 = (Math.floor(Math.random() * 2)) + 3;
        fal[26] = 0;
        fal[26] = new component(40, 10, "blue", 360, 165);
    }

        //Teleport a szellemre
        if(myGhost[0].x > 431){
        //teleport green
            if((myGhost[0].y > 110) && (myGhost[0].y < 130)){
                if(myGhost[0].x == 451){
                    myGhost[0].x = 0;
                }
            }
        }

        if(myGhost[1].x > 431){
        //teleport pink
            if((myGhost[1].y > 110) && (myGhost[1].y < 130)){
                if(myGhost[1].x == 451){
                    myGhost[1].x = 0;
                }
            }
        }

        if(myGhost[2].x > 431){
        //teleport red
            if((myGhost[2].y > 110) && (myGhost[2].y < 130)){
                if(myGhost[2].x == 451){
                    myGhost[2].x = 0;
                }
            }
        }

        if(myGhost[3].x > 431){
        //teleport white
            if((myGhost[3].y > 110) && (myGhost[3].y < 130)){
                if(myGhost[3].x == 451){
                    myGhost[3].x = 0;
                }
            }
        }

        if(myGhost[0].x < 19){
            //teleport
            if((myGhost[0].y > 110) && (myGhost[0].y < 130)){
                if(myGhost[0].x == -1){
                    myGhost[0].x = 450;
                }
            }
        }

        if(myGhost[1].x < 19){
            //teleport
            if((myGhost[1].y > 110) && (myGhost[1].y < 130)){
                if(myGhost[1].x == -1){
                    myGhost[1].x = 450;
                }
            }
        }

        if(myGhost[2].x < 19){
            //teleport
            if((myGhost[2].y > 110) && (myGhost[2].y < 130)){
                if(myGhost[2].x == -1){
                    myGhost[2].x = 450;
                }
            }
        }

        if(myGhost[3].x < 19){
            //teleport
            if((myGhost[3].y > 110) && (myGhost[3].y < 130)){
                if(myGhost[3].x == -1){
                    myGhost[3].x = 450;
                }
            }
        }
        
    //Teleport a játékosra
    if(myGamePiece.x >= 431){
        //teleport
        if((myGamePiece.y > 110) && (myGamePiece.y < 130)){
            if((myGamePiece.x) == 451){
                myGamePiece.x = 0;
            }
        }      
    }

    if(myGamePiece.x <= 19){
        //teleport
        if((myGamePiece.y > 110) && (myGamePiece.y < 130)){
            if(myGamePiece.x == -1){
                myGamePiece.x = 450;
            }
        }
    }               

    //Eat figyelő
    if(myGamePiece.eatit(bogyo[0])){
        bogyo[0] = 0;
        bogyo[0] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[1])){
        bogyo[1] = 0;
        bogyo[1] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[2])){
        bogyo[2] = 0;
        bogyo[2] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[3])){
        bogyo[3] = 0;
        bogyo[3] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[4])){
        bogyo[4] = 0;
        bogyo[4] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[5])){
        bogyo[5] = 0;
        bogyo[5] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[6])){
        bogyo[6] = 0;
        bogyo[6] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[7])){
        bogyo[7] = 0;
        bogyo[7] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[8])){
        bogyo[8] = 0;
        bogyo[8] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[9])){
        bogyo[9] = 0;
        bogyo[9] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[10])){
        bogyo[10] = 0;
        bogyo[10] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[11])){
        bogyo[11] = 0;
        bogyo[11] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 

    if(myGamePiece.eatit(bogyo[12])){
        bogyo[12] = 0;
        bogyo[12] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }
    
    if(myGamePiece.eatit(bogyo[13])){
        bogyo[13] = 0;
        bogyo[13] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 
  
    if(myGamePiece.eatit(bogyo[14])){
        bogyo[14] = 0;
        bogyo[14] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 
  
    if(myGamePiece.eatit(bogyo[15])){
        bogyo[15] = 0;
        bogyo[15] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 
  
    if(myGamePiece.eatit(bogyo[16])){
        bogyo[16] = 0;
        bogyo[16] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 
  
    if(myGamePiece.eatit(bogyo[17])){
        bogyo[17] = 0;
        bogyo[17] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 
  
    if(myGamePiece.eatit(bogyo[18])){
        bogyo[18] = 0;
        bogyo[18] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 
  
    if(myGamePiece.eatit(bogyo[19])){
        bogyo[19] = 0;
        bogyo[19] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 
  
    if(myGamePiece.eatit(bogyo[20])){
        bogyo[20] = 0;
        bogyo[20] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    } 
  
    if(myGamePiece.eatit(bogyo[21])){
        bogyo[21] = 0;
        bogyo[21] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[22])){
        bogyo[22] = 0;
        bogyo[22] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[23])){
        bogyo[23] = 0;
        bogyo[23] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[24])){
        bogyo[24] = 0;
        bogyo[24] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[25])){
        bogyo[25] = 0;
        bogyo[25] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[26])){
        bogyo[26] = 0;
        bogyo[26] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[27])){
        bogyo[27] = 0;
        bogyo[27] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[28])){
        bogyo[28] = 0;
        bogyo[28] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }

    if(myGamePiece.eatit(bogyo[29])){
        bogyo[29] = 0;
        bogyo[29] = new component(1, 1, "transparent", 0, 0);
        bogyofigy++;
    }


    if(vangyumi == 0){
        if((bogyofigy >= 1) && (bogyofigy < 30) && (gyumifigy < 3)){
            gyumiposs = (Math.floor(Math.random() * 1000));
            if(gyumiposs == 50){
                gyumiappear();
            }
        }
    }

    
    if(jatek == 1){
        endgame();
    }
    
    
    if(vangyumi == 1){
        if(myGamePiece.eatit(gyumi)){
            ate++;
            mySound2.play();
            vangyumi = 0;
            gyumi = 0;
            gyumi = new component(20, 20, "transparent", 230, 125);
        }
    }
    
    myScore.text = "SCORE:" + (aktbogyo + bogyofigy + aktgyumi + ate * 10);

    //Crash figyelő
    if (myGamePiece.crashWith(myGhost[0]) || myGamePiece.crashWith(myGhost[1]) || myGamePiece.crashWith(myGhost[2]) || myGamePiece.crashWith(myGhost[3])) {
        clearTimeout(zoldi);
        clearTimeout(pinki);
        clearTimeout(piros);
        clearTimeout(feher);
        jatek = 0;
        aktgyumi = (aktgyumi + ate * 10);
        aktbogyo = (aktbogyo + bogyofigy);
        ate = 0;
        bogyofigy = 0;
        healthpoint[health] = 0;
        healthpoint[health] = new component(10, 10, "transparent", 0, 0);
        healthpoint[health].update();
        health--;
        mySound1.stop();
        mySound.play();
        
        if(health >= 0){
            myGameArea.stop();
            setTimeout(szintlepes, 3000);
        }
        if(health < 0){
            jatek = 1;
        }
        return;
    }
        
    for(i = 0; i < fal.length; i++){
        myGamePiece.bumpinto(fal[i]);
        ghost = myGhost[0];
        if(ghost.ghostbumpinto(fal[i])){
            irany0 = (Math.floor(Math.random() * 4)) + 1;
        }
        
        ghost = myGhost[1];
        if(ghost.ghostbumpinto(fal[i])){
            irany1 = (Math.floor(Math.random() * 4)) + 1;
        }

        ghost = myGhost[2];
        if(ghost.ghostbumpinto(fal[i])){
            irany2 = (Math.floor(Math.random() * 4)) + 1;
        }

        ghost = myGhost[3];
        if(ghost.ghostbumpinto(fal[i])){
            irany3 = (Math.floor(Math.random() * 4)) + 1;
        }
    }

    //Ez szükséges ahhoz, hogy ne egy színező legyen a pályából
    myGameArea.clear();

        //Szellem0 mozgása
        //fel
        if(irany0 == 1){
            myGhost[0].speedX = 0;
            myGhost[0].speedY = 1;
        }
        
        //le
        if(irany0 == 2){
            myGhost[0].speedX = 0;
            myGhost[0].speedY = -1;
        }
        
        //jobbra
        if(irany0 == 3){
            myGhost[0].speedX = 1;
            myGhost[0].speedY = 0;
        }
        
        //balra
        if(irany0 == 4){
            myGhost[0].speedX = -1;
            myGhost[0].speedY = 0;
        }

        //Szellem1 mozgása
        //fel
        if(irany1 == 1){
            myGhost[1].speedX = 0;
            myGhost[1].speedY = 1;
        }
        
        //le
        if(irany1 == 2){
            myGhost[1].speedX = 0;
            myGhost[1].speedY = -1;
        }
        
        //jobbra
        if(irany1 == 3){
            myGhost[1].speedX = 1;
            myGhost[1].speedY = 0;
        }
        
        //balra
        if(irany1 == 4){
            myGhost[1].speedX = -1;
            myGhost[1].speedY = 0;
        }

        //Szellem2 mozgása
        //fel
        if(irany2 == 1){
            myGhost[2].speedX = 0;
            myGhost[2].speedY = 1;
        }
        
        //le
        if(irany2 == 2){
            myGhost[2].speedX = 0;
            myGhost[2].speedY = -1;
        }
        
        //jobbra
        if(irany2 == 3){
            myGhost[2].speedX = 1;
            myGhost[2].speedY = 0;
        }
        
        //balra
        if(irany2 == 4){
            myGhost[2].speedX = -1;
            myGhost[2].speedY = 0;
        }

        //Szellem3 mozgása
        //fel
        if(irany3 == 1){
            myGhost[3].speedX = 0;
            myGhost[3].speedY = 1;
        }
        
        //le
        if(irany3 == 2){
            myGhost[3].speedX = 0;
            myGhost[3].speedY = -1;
        }
        
        //jobbra
        if(irany3 == 3){
            myGhost[3].speedX = 1;
            myGhost[3].speedY = 0;
        }
        
        //balra
        if(irany3 == 4){
            myGhost[3].speedX = -1;
            myGhost[3].speedY = 0;
        }


    

    //falak létezése
    for(i = 0; i < fal.length; i++){
        fal[i].update();
    }

    //szellemek és játékos létezése
    myGhost[0].newPos();
    myGhost[0].update();
    myGhost[1].newPos();
    myGhost[1].update();
    myGhost[2].newPos();
    myGhost[2].update();
    myGhost[3].newPos();
    myGhost[3].update();

    gyumi.update();
    myScore.update();
    szint.update();
    myGamePiece.newPos();
    myGamePiece.update();

    healthpoint[0].update();
    if(health >= 1){
        healthpoint[1].update();
    }
    if(health >= 2){
        healthpoint[2].update();
    }
    if(health == 3){
        healthpoint[3].update();
    }

    bogyo[0].update();
    bogyo[1].update();
    bogyo[2].update();
    bogyo[3].update();
    bogyo[4].update();
    bogyo[5].update();
    bogyo[6].update();
    bogyo[7].update();
    bogyo[8].update();
    bogyo[9].update();
    bogyo[10].update();
    bogyo[11].update();
    bogyo[12].update();
    bogyo[13].update();
    bogyo[14].update();
    bogyo[15].update();
    bogyo[16].update();
    bogyo[17].update();
    bogyo[18].update();
    bogyo[19].update();
    bogyo[20].update();
    bogyo[21].update();
    bogyo[22].update();
    bogyo[23].update();
    bogyo[24].update();
    bogyo[25].update();
    bogyo[26].update();
    bogyo[27].update();
    bogyo[28].update();
    bogyo[29].update();
}



//zene lejátszó
function sound(src) {
    this.sound = document.createElement("audio");
    this.sound.src = src;
    this.sound.setAttribute("preload", "auto");
    this.sound.setAttribute("controls", "none");
    this.sound.style.display = "none";
    document.body.appendChild(this.sound);
    this.play = function(){
        if(src == "zene.mp3"){
            this.sound.play();
        }
        else{
            this.sound.play();
       }
    }
    this.stop = function(){
        if(src == "zene.mp3"){
            this.sound.pause();
        }else{
            this.sound.pause();
        }
    }    
}




//Billentyűzettel való mozgás    (nyilak és WASD)
document.addEventListener('keydown', function(event) {
    if(jatek == 1){
        if((myGamePiece.x < 431) && (event.keyCode == 37 || event.keyCode == 65)){    //Left
            moveleft();
        }
        if((myGamePiece.x > 18) && (event.keyCode == 39 || event.keyCode == 68)){     //Right
            moveright();
        }
        if((myGamePiece.x > 18) && (myGamePiece.x < 431) && (event.keyCode == 38 || event.keyCode == 87)){     //Up
            moveup();
        }
        if((myGamePiece.x > 18) && (myGamePiece.x < 431) && (event.keyCode == 40 || event.keyCode == 83)){     //Down
            movedown();
        }
        if (event.keyCode == 32) {
            restartGame();
        }
    }
    if (event.key === "Escape" ) {
    window.location.replace("index.php");
    }
})


//szellemek első megmozdulása
function greenstart(){
    irany0 = 1;
}

function pinkstart(){
    irany1 = 1;
}

function redstart(){
    irany2 = 2;
}

function whitestart(){
    irany3 = 2;
}


function indulas(){
    myGamePiece.speedX = 1;
    szint.text = " ";
    jatek = 1;
    zoldi = setTimeout(greenstart, 3000);
    pinki = setTimeout(pinkstart, 6000);
    piros = setTimeout(redstart, 9000);
    feher = setTimeout(whitestart, 12000);

}




function gyumiappear(){
        gyumifigy++;
        vangyumi = 1;
        gyumi = 0;
        gyumi = new component(20, 20, "orange", 230, 125);
}

function endgame(){
    if(health >= 0){
        if(bogyofigy == 30){
        aktgyumi = (aktgyumi + ate * 10);
        aktbogyo = (aktbogyo + bogyofigy);
        ate = 0;
        bogyofigy = 0;
        jatek = 0;
        myGameArea.stop();
        mySound1.stop();
        mySound3.play();
        level++;
        levelup = setTimeout(szintlepes, 12000);
    }
    }else{
        setTimeout(gameover, 2000);
    }
}

function szintlepes(){
    startGame();
}


//szellem mozgásának az irányának a meghatározása
function mozgas0(){
    if(fal[24].color == "blue"){
        irany0 = (Math.floor(Math.random() * 500)) + 1;
    }
}

function mozgas1(){
    if(fal[27].color == "blue"){
        irany1 = (Math.floor(Math.random() * 500)) + 1;
    }
}

function mozgas2(){
    if(fal[26].color == "blue"){
        irany2 = (Math.floor(Math.random() * 500)) + 1;
    }
}

function mozgas3(){
    if(fal[25].color == "blue"){
        irany3 = (Math.floor(Math.random() * 500)) + 1;
    }
}

function moveup() {
    if(jatek == 1){
        myGamePiece.speedX = 0;
        myGamePiece.speedY = -1;
    }
}

function movedown() {
    if(jatek == 1){
        myGamePiece.speedX = 0;
        myGamePiece.speedY = 1;
    }
    
}

function moveleft() {
    if(jatek == 1){
        myGamePiece.speedX = -1;
        myGamePiece.speedY = 0;   
    } 
}

function moveright() {
    if(jatek == 1){
        myGamePiece.speedX = 1;
        myGamePiece.speedY = 0;   
    } 
}

function gameover(){
    if(vege == 0){
        mySound.stop();
        myGameArea.stop();
    }
    vege = 1;
    mySound1.stop();
}

function restartGame(){
    if(jatek == 1){
        clearTimeout(zoldi);
        clearTimeout(pinki);
        clearTimeout(piros);
        clearTimeout(feher);
        clearTimeout(levelup);
        ate = 0;
        bogyofigy = 0;
        level = 1;
        health = 3;
        jatek = 0;
        aktgyumi = 0;
        aktbogyo = 0;
        mySound1.stop();
        myGameArea.stop();
        startGame();
    }
}


//szellem tesztelésére
/*
function moveup() {
    irany = 0;
}

function movedown() {
    irany = 1; 
}

function moveleft() {
    irany = 3; 
}

function moveright() {
    irany = 2; 
}

function kozepre(){
    myGhost.x = 85;
    myGhost.y = 120;
}
*/
//gombok, restart és vissza képek

</script>
<div style="text-align:center;width:480px;position:relative;top:10px;left:400px;">
  <button onmousedown="moveup()">W / &#8593</button><br><br>  
  <button onmousedown="moveleft()">A / &#8592</button>
  <button onmousedown="moveright()">D / &#8594</button><br><br>
  <button onmousedown="movedown()">S / &#8595</button>
</div>
<div style="position:relative;top:30px;left:400px;">
    <a onmousedown="restartGame()">
        <img src="restart.png" alt="restart"></img>
    </a>
    <a href="index.php" style="position:relative;top:0px;left:120px;">
        <img src="vissza1.png" alt="vissza"></img>
    </a>
</div>
</body>
</html>
