document.addEventListener('DOMContentLoaded', () => {
  const projectForm = document.getElementById('projectForm');
  const shoeContainer = document.getElementById('shoeContainer');
  

  projectForm.addEventListener('submit', function(event) {
      event.preventDefault();

      const title = this.elements['title'].value;
      const description = this.elements['description'].value;
      const imageUrl = this.elements['imageUrl'].value;
      const price = this.elements['price'].value;

      const shoeCardElement = document.createElement('div');
      shoeCardElement.classList.add('shoe-card');

      shoeCardElement.innerHTML = `
          <h3>${title}</h3>
          <p>${description}</p>
          <p>Price: $${price}</p>
          <img src="${imageUrl}" alt="${title}">
          <button class="delete-button" onclick="deleteShoe('${title}')">Delete</button>
      `;

      // Store the shoe data in localStorage
      const shoeData = {
          title,
          description,
          imageUrl,
          price
      };
      localStorage.setItem(title, JSON.stringify(shoeData));

      // Append the shoe card to the shoeContainer
      shoeContainer.appendChild(shoeCardElement);
      this.reset();
  });

  // Load the shoe data from localStorage on page load
  for (let i = 0; i < localStorage.length; i++) {
      const key = localStorage.key(i);
      const shoeData = JSON.parse(localStorage.getItem(key));

      const shoeCardElement = document.createElement('div');
      shoeCardElement.classList.add('shoe-card');
      shoeCardElement.id = key; // Set an ID for the shoe card using the key (title)

      shoeCardElement.innerHTML = `
          <h3>${shoeData.title}</h3>
          <p>${shoeData.description}</p>
          <p>Price: $${shoeData.price}</p>
          <img src="${shoeData.imageUrl}" alt="${shoeData.title}">
          <button class="delete-button" onclick="deleteShoe('${shoeData.title}')">Delete</button> <!-- Add the onclick here -->
      `;

      shoeContainer.appendChild(shoeCardElement);
  }
});

function deleteShoe(title) {
  // Remove the shoe data from localStorage
  localStorage.removeItem(title);

  // Remove the shoe card from the shoeContainer
  const shoeCardElement = document.getElementById(title);
  if (shoeCardElement) {
      shoeCardElement.remove();
  }
}

function displayShoes() {
  const shoeDisplayContainer = document.getElementById('shoeDisplayContainer');

  // Clear any existing content in the display container
  shoeDisplayContainer.innerHTML = '';

  // Iterate over localStorage keys and add shoe cards to the display container
  for (let i = 0; i < localStorage.length; i++) {
      const key = localStorage.key(i);
      const shoeData = JSON.parse(localStorage.getItem(key));

      const shoeCardElement = document.createElement('div');
      shoeCardElement.classList.add('shoe-card');

      shoeCardElement.innerHTML = `
          <div class="shoe-details">
              <h3>${shoeData.title}</h3>
              <p>${shoeData.description}</p>
              <p>Price: $${shoeData.price}</p>
              <img src="${shoeData.imageUrl}" alt="${shoeData.title}">
          </div>
      `;

      shoeDisplayContainer.appendChild(shoeCardElement);
  }
}


// Call the displayShoes function on page load to display the shoes in the index.html
window.addEventListener('load', () => {
  displayShoes();
});
