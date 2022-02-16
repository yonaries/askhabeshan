var settingsmenu = document.querySelector(".settings-menu");
var writepost = document.querySelector(".write-post-container");
var darkbtn = document.getElementById("dark-btn");

function settingMenuToggle() {
    settingsmenu.classList.toggle("settings-menu-height");
}

function writePostToggle() {
    writepost.classList.toggle("write-post-container-height");
}

function darkbtnon() {
    darkbtn.classList.toggle("dark-btn-on");
    document.body.classList.toggle("dark-mode");

    if (localStorage.getItem("theme") == "light") {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
}

if (localStorage.getItem("theme") == "light") {
    darkbtn.classList.remove("dark-btn-on");
    document.body.classList.remove("dark-mode");
} else if (localStorage.getItem("theme", "dark")) {
    darkbtn.classList.add("dark-btn-on");
    document.body.classList.add("dark-mode");
} else {
    localStorage.setItem("theme", "light");
}