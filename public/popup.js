document.addEventListener("DOMContentLoaded", function () {
    let openButton = document.getElementById("addMovie");
    let closeButton = document.getElementById("closePopup");
    let popup = document.getElementById("popup");

    openButton.addEventListener("click", function () {
        popup.style.display = "block";
        console.log("This is working");
    });

    closeButton.addEventListener("click", function () {
        popup.style.display = "none";
    });
});
