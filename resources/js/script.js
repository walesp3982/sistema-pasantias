function toggleMenu() {
  const sidebar = document.getElementById("sidebar");
  sidebar.classList.toggle("active");
}


document.addEventListener("DOMContentLoaded", function () {
  const dropdownButtons = document.querySelectorAll(".toggle-sub");

  dropdownButtons.forEach(btn => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();

      const parentLi = this.parentElement;

      // Cerrar otros
      document.querySelectorAll(".menu li").forEach(li => {
        if (li !== parentLi) li.classList.remove("open");
      });

      // Alternar este
      parentLi.classList.toggle("active");
    });
  });

});

window.toggleMenu = toggleMenu;

