document.addEventListener('DOMContentLoaded', () => {
    const addShoeForm = document.getElementById('addShoeForm');
    const shoeContainer = document.getElementById('shoeContainer');
    const searchInput = document.getElementById('searchInput');

    addShoeForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const title = this.elements['title'].value;
        const description = this.elements['description'].value;
        const imageUrl = this.elements['imageUrl'].value;
        const price = this.elements['price'].value;

        // Voeg hier code toe om een nieuwe schoen toe te voegen aan de database

        this.reset();
    });

    shoeContainer.addEventListener('submit', function(event) {
        event.preventDefault();

        if (event.target && event.target.name === 'deleteShoe') {
            const shoeId = event.target.querySelector('input[name="shoe_id"]').value;
            // Voeg hier code toe om een schoen te verwijderen uit de database
        }
    });

    searchInput.addEventListener('keyup', function() {
        const searchText = this.value;
        filterAndDisplayResults(searchText);
    });

    function filterAndDisplayResults(searchText) {
        const shoeCards = document.querySelectorAll('.shoe-card');

        shoeCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('p').textContent.toLowerCase();

            if (title.includes(searchText.toLowerCase()) || description.includes(searchText.toLowerCase())) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
});

$(document).ready(function(){
    $('.slider').slick({
        autoplay: true,
        autoplaySpeed: 1500, // Adjust the speed (in milliseconds) for automatic sliding
        dots: true, // Add navigation dots
    });
});

