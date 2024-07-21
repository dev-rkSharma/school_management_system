document.addEventListener("DOMContentLoaded", function () {
  // Hide preloader once the content is fully loaded
  window.addEventListener("load", function () {
    document.getElementById("preloader").style.display = "none";
    document.getElementById("bodyContent").style.display = "block";
  });
});
