const btns = document.querySelectorAll(".row .col .btn"),
warp = document.querySelectorAll(".info-wrap"),
menuBar = document.querySelector(".menu-bar"),
account = document.querySelector(".account"),
accountProfile = document.querySelector(".account-info-wrap"),
accountLogOut = document.querySelector(".account-info-wrap .log-out"),
sideBar = document.querySelector(".side-bar"),
darkMode = document.querySelector(".darkmode"),
darkModeIcon = document.querySelector(".darkmode div i"),
logo = document.querySelector(".menu-logo .logo"),
main = document.querySelector(".container"),
body = document.querySelector("body");

const theme = localStorage.getItem("theme") || "light";
applyTheme(theme);

var lastKey;
var check;

btns.forEach( button => {
    button.addEventListener("click", () => {
        var activity = button.classList.toString().indexOf("active");
        if (!(lastKey === undefined)){
            warp[lastKey].classList.remove("enable");
            warp[lastKey].classList.add("disable");
            Delete(lastKey);
            btns.forEach( button => {
                button.classList.remove("active");
            });
        }
        var key = Object.keys(btns).find(key => btns[key] === button);
        if(activity === -1){
            button.classList.add("active");
            warp[key].classList.add("enable");
            lastKey = Object.keys(btns).find(lastKey => btns[lastKey] === button);
        }
        else{
            if (lastKey) {
                lastKey = undefined;
            }
            button.classList.remove("active");
            warp[key].classList.remove("enabled");
            warp[key].classList.add("disable");
            setTimeout(() => {
                warp[key].classList.remove("disable");
            },700);
        }
    });
});

function Delete(lastKey) {
    setTimeout(() => {
        warp[lastKey].classList.remove("disable");
    },700);
}

menuBar.addEventListener("click", () => {
    menuBar.classList.toggle("active");
    sideBar.classList.toggle("active");
});
  
sideBar.addEventListener("mouseleave", () => {
    setTimeout(() => {
      menuBar.classList.remove("active");
      sideBar.classList.remove("active");
    }, 400);
});
  
account.addEventListener("click", () => {
    account.classList.toggle("active");
});
  
accountProfile.addEventListener("mouseleave", () => {
    setTimeout(() => {
      account.classList.remove("active");
    }, 400);
});
  
accountLogOut.addEventListener("click", () => {
    location.replace("login asset/login.html");
});
  
darkMode.addEventListener("click", () => {
    const currentTheme = main.classList.contains("dark") ? "light" : "dark";
    applyTheme(currentTheme);
});
  
function applyTheme(theme) {
    if (theme === "dark") {
    main.classList.add("dark");
    darkMode.classList.add("active");
    sideBar.classList.add("dark");
    menuBar.classList.add("dark");
    account.classList.add("dark");
    src = logo.src;
    logo.src = "../images/RoboceanHeaderWhite.png";
    classList = darkModeIcon.classList;
    if (classList == "fa-sharp fa-solid fa-moon") {
        darkModeIcon.classList = "fa-solid fa-sun";
    } else {
        darkModeIcon.classList = "fa-sharp fa-solid fa-moon";
    }
    }else{
    main.classList.remove("dark");
    darkMode.classList.remove("active");
    sideBar.classList.remove("dark");
    menuBar.classList.remove("dark");
    account.classList.remove("dark");
    src = logo.src;
    logo.src = "../images/RoboceanHeaderDark.png";
    classList = darkModeIcon.classList;
    if (classList == "fa-sharp fa-solid fa-moon") {
        darkModeIcon.classList = "fa-solid fa-sun";
    }else{
        darkModeIcon.classList = "fa-sharp fa-solid fa-moon";
    }
    }
    localStorage.setItem("theme", theme);
}