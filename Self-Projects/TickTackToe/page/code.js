var qutu;
var Xler =["start"];
var Olar =["start"];
var teref = 1;

function Check(qutu){
   
    if(qutu == 1){
        Click("a",qutu);
    }
    else if(qutu == 2 ){
        Click("b",qutu);
    }
    else if(qutu == 3 ){
        Click("c",qutu);
    }
    else if(qutu == 4 ){
        Click("d",qutu);
    }
    else if(qutu == 5 ){
        Click("f",qutu);
    }
    else if(qutu == 6 ){
        Click("g",qutu);
    }
    else if(qutu == 7 ){
        Click("h",qutu);
    }
    else if(qutu == 8 ){
        Click("k",qutu);
    }
    else if(qutu == 9 ){
        Click("m",qutu);
    }
//No Way!
    else{
        console.log("Error Undefined Data!")
    }
}

function Click(id,qutu){
    var yoxla = document.getElementById(id).innerHTML;
    if(teref == 1 && yoxla == ""){
        document.getElementById(id).innerHTML = "X";
        document.getElementById(id).style.color = "blue";
        Xler += qutu;
        teref = 2;
        YoxlamaX();
    }
    else if(teref == 2 && yoxla == ""){
        document.getElementById(id).innerHTML = "O";
        document.getElementById(id).style.color = "green";
        Olar += qutu;
        teref = 1;
        YoxlamaY();
    }
}

function YoxlamaX(){
    if(Xler.indexOf("1")>-1){
        if(Xler.indexOf("2")>-1 && Xler.indexOf("3")>-1){
            YoxlamaXF();
        }
        else if(Xler.indexOf("4")>-1 && Xler.indexOf("7")>-1){
            YoxlamaXF();

        }
        else if(Xler.indexOf("5")>-1 && Xler.indexOf("9")>-1){
            YoxlamaXF();
        }
    }

    if(Xler.indexOf("2")>-1 && Xler.indexOf("5")>-1 && Xler.indexOf("8")>-1){
        YoxlamaXF();
    }

    if(Xler.indexOf("3")>-1){
        if(Xler.indexOf("5")>-1 && Xler.indexOf("7")>-1){
            YoxlamaXF();
        }
        else if(Xler.indexOf("6")>-1 && Xler.indexOf("9")>-1){
            YoxlamaXF();
        }
    }

    if(Xler.indexOf("4")>-1 && Xler.indexOf("5")>-1 && Xler.indexOf("6")>-1){
        YoxlamaXF();
    }

    if(Xler.indexOf("7")>-1 && Xler.indexOf("8")>-1 && Xler.indexOf("9")>-1){
        YoxlamaXF();
    }
}

function YoxlamaXF(){
    document.getElementById("table").style.zIndex = -1;
    document.getElementById("who").innerHTML = "I Player has won!";
    document.getElementById("chara").style.animationPlayState = "running";
}

function YoxlamaY(){
    if(Olar.indexOf("1")>-1){
        if(Olar.indexOf("2")>-1 && Olar.indexOf("3")>-1){
            YoxlamaYF();
        }
        else if(Olar.indexOf("4")>-1 && Olar.indexOf("7")>-1){
            YoxlamaYF();
        }
        else if(Olar.indexOf("5")>-1 && Olar.indexOf("9")>-1){
            YoxlamaYF();
        }
    }

    if(Olar.indexOf("2")>-1 && Olar.indexOf("5")>-1 && Olar.indexOf("8")>-1){
        YoxlamaYF();
    }

    if(Olar.indexOf("3")>-1){
        if(Olar.indexOf("5")>-1 && Olar.indexOf("7")>-1){
            YoxlamaYF();
        }
        else if(Olar.indexOf("6")>-1 && Olar.indexOf("9")>-1){
            YoxlamaYF();
        }
    }

    if(Olar.indexOf("4")>-1 && Olar.indexOf("5")>-1 && Olar.indexOf("6")>-1){
        YoxlamaYF();
    }

    if(Olar.indexOf("7")>-1 && Olar.indexOf("8")>-1 && Olar.indexOf("9")>-1){
        YoxlamaYF();
    }
}
function YoxlamaYF(){
    document.getElementById("table").style.zIndex = -1;
    document.getElementById("who").innerHTML = "II Player has won!";
    document.getElementById("charb").style.animationPlayState = "running";
}