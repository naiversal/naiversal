const toggleBtn = document.getElementById("toggle-dark");

document.addEventListener("DOMContentLoaded", function() {
    if (localStorage.getItem("dark-mode") === "enabled") {
        document.body.classList.add("dark-mode");
        toggleBtn.textContent = "☀️ Light Mode";
    } else {
        document.body.classList.remove("dark-mode");
        toggleBtn.textContent = "🌙 Dark Mode";
    }
});

toggleBtn.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("dark-mode", "enabled");
        toggleBtn.textContent = "☀️ Light Mode";
    } else {
        localStorage.setItem("dark-mode", "disabled");
        toggleBtn.textContent = "🌙 Dark Mode";
    }
});