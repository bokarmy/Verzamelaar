document.getElementById('projectForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent default form behavior

  // Get the project information from the form
  const title = this.elements['title'].value;
  const description = this.elements['desc'].value;
  const imageUrl = this.elements['image'].value;
  const price = this.elements['price'].value;

  // Create a unique identifier for the shoe card
  const shoeCardId = `shoe_${Date.now()}`;

  // Create an object to represent the shoe card
  const shoeCard = {
    title,
    description,
    imageUrl,
    price
  };

  // Store the shoe card data in localStorage
  localStorage.setItem(shoeCardId, JSON.stringify(shoeCard));

  // Reset the form
  this.reset();

  // Call a function to update the shoe cards on the index page
  updateShoeCards();
});

function deleteProject(button) {
  // Extract the project ID from the button's ID attribute
  const projectId = button.id;

  // Remove the project from localStorage using its ID
  localStorage.removeItem(`shoe_${projectId}`);

  // Remove the project from the DOM
  const projectElement = document.getElementById(projectId);
  if (projectElement) {
    projectElement.remove();
  } else {
    console.error(`Project with ID ${projectId} not found.`);
  }
  // Optionally, update the shoe cards after deletion
  updateShoeCards();
}

function updateShoeCards() {
  const adminPersonalProjectsContainer = document.getElementById('personalProjectsContainer');
  const adminSchoolProjectsContainer = document.getElementById('schoolProjectsContainer');

  // Clear any existing shoe cards
  adminPersonalProjectsContainer.innerHTML = '';
  adminSchoolProjectsContainer.innerHTML = '';

  // Iterate over localStorage keys and add shoe cards to the respective containers
  for (let i = 0; i < localStorage.length; i++) {
    const key = localStorage.key(i);
    const data = JSON.parse(localStorage.getItem(key));

    const shoeCardElement = document.createElement('div');
    shoeCardElement.classList.add('shoe-card');
    shoeCardElement.dataset.title = data.title;  // Set the title as a data attribute
    shoeCardElement.innerHTML = `
      <img src="${data.imageUrl}" alt="${data.title}">
      <h2>${data.title}</h2>
      <p>Prijs: $${data.price}</p>
      <button class="delete-button" onclick="deleteProject(this)">Verwijder</button>
    `;

    // Append the shoe card to the appropriate container based on the key prefix
    if (key.startsWith('shoe_')) {
      adminPersonalProjectsContainer.appendChild(shoeCardElement);
    } else if (key.startsWith('school_')) {
      adminSchoolProjectsContainer.appendChild(shoeCardElement);
    }
  }
}

// Call the updateShoeCards function on page load to display any existing shoe cards
window.addEventListener('load', () => {
  console.log("Page loaded."); // Check if the page is loading

  // Check if the personal and school containers exist
  console.log(document.getElementById('personalProjectsContainer'));
  console.log(document.getElementById('schoolProjectsContainer'));

  // Ensure the updateShoeCards function is being called
  updateShoeCards();
});
