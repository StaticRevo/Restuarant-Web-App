// JavaScript code to handle the "Add to Favorites" functionality
const addToFavouritesButtons = document.querySelectorAll('.addToFavourites');

addToFavouritesButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();

        const menuId = button.dataset.menuId; // Retrieve the menu ID from the button's dataset

        // Send an AJAX request to add the menu item to favorites
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'favourites.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Display a success message
                    alert('Successfully Added to Favorites');
                } else {
                    // Display an error message
                    alert('Error: Failed to add to Favorites');
                }
            }
        };
        xhr.send('id=' + encodeURIComponent(menuId));
    });
});