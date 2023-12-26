document.addEventListener("DOMContentLoaded", function () {
    let addMovieButton = document.getElementById("addMovie");
    let closeButton = document.getElementById("closePopup");
    let addMovieDiv = document.getElementById("addMovieDiv");

    addMovieButton.addEventListener("click", function () {
        addMovieDiv.style.display = "block";
        console.log("popup is working");
    });

    closeButton.addEventListener("click", function () {
        addMovieDiv.style.display = "none";
    });
});
