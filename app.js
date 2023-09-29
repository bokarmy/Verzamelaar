document.getElementById('projectForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Voorkom standaardformuliergedrag

  // Haal de geselecteerde categorie op
  const categorySelect = document.querySelector('.category-select');
  const selectedCategory = categorySelect.value;

  // Haal de projectinformatie op uit het formulier
  const title = this.title.value;
  const description = this.desc.value;
  const date = this.datum.value;
  const url = this.url.value;
  const image = this.image.value;

  // Maak een nieuw projectelement aan
  const projectElement = document.createElement('div');
  projectElement.innerHTML = `<strong>${title}</strong><br>
                              Beschrijving: ${description}<br>
                              Datum: ${date}<br>
                              URL: ${url}<br>
                              Foto URL: ${image}`;

  // Voeg het projectelement toe aan de juiste container op basis van de categorie
  if (selectedCategory === 'Persoonlijk') {
      document.getElementById('personalProjectsContainer').appendChild(projectElement);
  } else if (selectedCategory === 'School') {
      document.getElementById('schoolProjectsContainer').appendChild(projectElement);
  }

  // Reset het formulier
  this.reset();
});