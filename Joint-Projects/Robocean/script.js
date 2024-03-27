const alert = document.querySelector(".alert"),
deleteBtn = document.querySelector(".delete-btn");

let classList;

deleteBtn.addEventListener("click", () => {
    classList = alert.classList.toString();
    if(classList.indexOf("active") >= -1) alert.classList.remove("active");
});