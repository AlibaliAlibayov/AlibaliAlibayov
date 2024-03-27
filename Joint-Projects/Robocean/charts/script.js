const LineChart = document.querySelector('#daily-chart').getContext("2d");
const menuBar = document.querySelector(".menu-bar");
const account = document.querySelector(".account");
const accountProfile = document.querySelector(".account-info-wrap");
const accountLogOut = document.querySelector(".account-info-wrap .log-out");
const sideBar = document.querySelector(".side-bar");
const darkMode = document.querySelector(".darkmode");
const darkModeIcon = document.querySelector(".darkmode div i");
const logo = document.querySelector(".menu-logo .logo");
const main = document.querySelector(".container");
const body = document.querySelector("body"),
AllFinishedTasks = document.querySelector("#AllFinishedTasks"),
dailyAccept = document.querySelector("#dailyAccept"),
dailyWork = document.querySelector("#dailyWork"),
dailyFinish = document.querySelector("#dailyFinish");

// Retrieve theme preference from localStorage or default to "light"
const theme = localStorage.getItem("theme") || "light";
applyTheme(theme);

var src, classList;
var day = new Date().getDay();
const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

var dailyDataNAR, dailyDataWOR, dailyDataFR = new Array();
var allFinishedTasks;

function getDays(now) {
  if (now === 7) {
    day = 1;
    return days[day - 1];
  } else {
    day++;
    return days[day - 1];
  }
}

// Make an AJAX request to retrieve the data
var xhr = new XMLHttpRequest();
xhr.open("GET", "chart.php", true);
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4 && xhr.status === 200) {
    var response = JSON.parse(xhr.responseText);
    response = JSON.parse(response);
    dailyDataNAR = response.not;
    dailyDataWOR = response.work;
    dailyDataFR = response.finish;
    allFinishedTasks = response.allcomplete;
    AllFinishedTasks.innerHTML = allFinishedTasks;
    dailyDataAccepter(dailyDataNAR);
    dailyDataWorker(dailyDataWOR);
    dailyDataFinisher(dailyDataFR);
    renderChart();
  }
};
xhr.send();

function dailyDataAccepter(array){
  now = array[6];
  ystday = array[5];
  console.log(now);
  console.log(ystday);
  percent = ((now / ystday) * 100) - 100;
  if (percent >= 0){
    dailyAccept.classList.add("positive");
    dailyAccept.innerHTML = "+" + percent + "%";
  }
  else{
    dailyAccept.classList.add("negative");
    dailyAccept.innerHTML = percent + "%";
  }
}

function dailyDataWorker(array){
  now = array[6];
  ystday = array[5];
  console.log(now);
  console.log(ystday);
  percent = ((now / ystday) * 100) - 100;
  if (percent >= 0){
    dailyWork.classList.add("positive");
    dailyWork.innerHTML = "+" + percent + "%";
  }
  else{
    dailyWork.classList.add("negative");
    dailyWork.innerHTML = percent + "%";
  }
}

function dailyDataFinisher(array){
  now = array[6];
  ystday = array[5];
  console.log(now);
  console.log(ystday);
  percent = ((now / ystday) * 100) - 100;
  if (percent >= 0){
    dailyFinish.classList.add("positive");
    dailyFinish.innerHTML = "+" + percent + "%";
  }
  else{
    dailyFinish.classList.add("negative");
    dailyFinish.innerHTML = percent + "%";
  }
}

function countMaxValue() {
  var NARmax = Math.max(...dailyDataNAR);
  var WORmax = Math.max(...dailyDataWOR);
  var FRmax = Math.max(...dailyDataFR);
  var width = Math.max(NARmax, WORmax, FRmax);
  width = Math.floor(width *= 1.1);
  if (width <= 10) {
    width *= 2;
  }
  return width;
}

function renderChart() {
  var Request = new Chart(LineChart, {
    type: 'line',
    data: {
      labels: [getDays(day), getDays(day), getDays(day), getDays(day), getDays(day), getDays(day), getDays(day)],
      datasets: [
        {
          label: 'Coming Requests',
          data: dailyDataNAR,
          borderWidth: 3,
          borderColor: "red",
          pointBorderWidth: 7,
          pointHoverBorderWidth: 2,
          fill: true,
          backgroundColor: '#ff000023',
          tension: 0.5
        },
        {
          label: 'Accepted Requests',
          data: dailyDataWOR,
          borderWidth: 3,
          borderColor: "blue",
          pointBorderWidth: 7,
          pointHoverBorderWidth: 2,
          fill: true,
          backgroundColor: '#0000ff3b',
          tension: 0.2
        },
        {
          label: 'Finished Requests',
          data: dailyDataFR,
          borderWidth: 3,
          borderColor: "green",
          pointBorderWidth: 7,
          pointHoverBorderWidth: 2,
          fill: true,
          backgroundColor: '#00800043',
          tension: 0.5
        }
      ]
    },
    options: {
      scales: {
        x: {
          ticks: {
            font: {
              size: 14
            }
          }
        },
        y: {
          beginAtZero: true,
          max: countMaxValue(),
          ticks: {
            font: {
              size: 14
            }
          }
        }
      },
      plugins: {
        legend: {
          labels: {
            font: {
              size: 14
            }
          }
        }
      }
    }
  });
}

// Dark Mode System

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
  } else {
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
    } else {
      darkModeIcon.classList = "fa-sharp fa-solid fa-moon";
    }
  }
  localStorage.setItem("theme", theme);
}