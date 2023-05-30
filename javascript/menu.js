document.addEventListener("DOMContentLoaded", function() {
    const signInAlertButton = document.querySelector(".sign-in-alert");
    const addToFavouritesButton = document.querySelector(".add-to-favourites");

    signInAlertButton.addEventListener("click", function(e) {
        e.preventDefault();
        alert("Please sign in to continue.");
    });

    addToFavouritesButton.addEventListener("click", function(e) {
        e.preventDefault();
        alert("Item added to favourites.");
    });

    // Check if the addition to favorites was successful
    const successFlag = "{{ add_to_favourites_success }}";
    if (successFlag === "true") {
        alert("Item added to favourites.");
    } else if (successFlag === "false") {
        alert("This item is already in your favourites.");
    }
});
