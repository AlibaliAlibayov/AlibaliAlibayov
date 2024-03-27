window.addEventListener('scroll', () => {
    if(Math.floor( window.scrollY) < 180){
        var top = 675 - Math.floor( window.scrollY) * 3;
        document.getElementById("section").style.top = top + "px";
    }
});

function Comment(){
    document.getElementById("addcomment").style.zIndex = 10;
    var btn = document.getElementById("Sub");
    btn.onclick = function Submit(){
        document.getElementById("addcomment").style.zIndex = -5;
        var text = document.getElementById("comment").value;
        document.getElementById("comment").value = "";
    
        if(!(text === "")){
            var comments = document.getElementById("comments");
            comments.innerHTML += "<div id='question'>" + text + "</div>";
    
            getId();
    
            while(ids.indexOf(id) > -1){
                getId();
            }
                
            var uzun =  -1;
            while(uzun < ids.length){
                uzun++;
            }
            ids[uzun] = id;
    
    
            comments.innerHTML += " <button onclick='Answer(" + id + ")'> " +"Answer"+ "</button>";
            comments.innerHTML += " <div id='" + id + "'></div>";
            var div  = document.getElementById(id);
            div.style.width = "100%";
            div.style.display = "flex";
            div.style.flexDirection = "column";
            div.style.alignItems = "flex-end";
    
            id = "";
        }
    }
}

function Answer(commentId){
    document.getElementById("addcomment").style.zIndex = 10;
    sade = false;
    var btn = document.getElementById("Sub");
    btn.onclick = function Answer1(){
        document.getElementById("addcomment").style.zIndex = -5;
        var text = document.getElementById("comment").value;
        document.getElementById("comment").value = "";

        commentId.innerHTML += "<div id='answer'>" + text + "</div>";
    };
}

function Cancel(){
    document.getElementById("addcomment").style.zIndex = -5;
    document.getElementById("comment").value = "";
}

var ids = [];
var herfler = ["a","b","c","d","f","g"];
var id = "";

function getId(){
    i = 0;
    while(i<3){
        var h = Math.floor(Math.random()* 6);
        id += herfler[h];
        i++;
    }
}
