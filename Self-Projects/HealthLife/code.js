var menu = false;
var links = document.getElementById("links");
var system = false;

function Menu(){
    if(system == false){
        document.getElementById("button").style.animationPlayState = "running";
        document.getElementById("button").style.cursor = "none";
        system = true;
        if(menu<1){
            document.getElementById("links").style.zIndex = "1";
            menu = true;
        }
        else{
            document.getElementById("links").style.zIndex = "-1";
            menu = false;
        }
        setTimeout(Stop,3000);
    }
}
function Stop(){
    document.getElementById("button").style.animationPlayState = "paused";
    document.getElementById("button").style.cursor = "pointer";
    system = false;
}

function Sub(){
    var input = document.getElementById("mail").value;
    document.getElementById("mail").value = "";
    var uzanti = input.indexOf("@gmail.com");
    var error = input.indexOf(" ");

    if(error > -1){
        alert("Mail adında boşluq ola bilməz!");
    }
    else{
        if(uzanti > 0){
            alert("Təbriklər! Qeydiyyatdan uğurla keçdiniz.");
        }
        else if(uzanti == 0){
            alert("xahiş edirik bir mail adı daxil edin!");
        }
        else{
            alert("Xahiş edirik '@gmail.com' uzantısını daxil edin!");
        }
    }
   
}