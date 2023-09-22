function projectenAnimation() {
    let projecten = document.querySelectorAll("project");
  
    for (let i = 0; i < projecten.length; i++) {
      projecten[i].style.animation = `slideLoad 0.2s ease ${i * 0.05}s forwards`;
    }
  }
  
  function reload() {
    location.reload();
  }
  