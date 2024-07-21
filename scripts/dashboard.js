document.getElementById("menu_btn").addEventListener("click", function () {
  const bodyContent = document
    .getElementsByClassName("bodyContent")[0]
    .classList.toggle("collapsed");
  
});

// Highlight the active link
var links = document.querySelectorAll("#list li a");
links.forEach(function (link) {
  link.addEventListener("click", function (e) {
    // Remove active class from all links
    links.forEach(function (link) {
      link.classList.remove("active");
    });
    // Add active class to the clicked link
    this.classList.add("active");
  });
});

// Dropdown functionality
var dropdowns = document.querySelectorAll(".dropdown-btn");
dropdowns.forEach(function (dropdown) {
  dropdown.addEventListener("click", function () {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
});

// drop-down-icon in side bar on location
var downArrow = document.getElementById("down_arrow");
var upArrow = document.getElementById("up_arrow");
var dropbtn = document.getElementsByClassName("dropdown-btn");
dropbtn[0].addEventListener("click", function (e) {
  if (upArrow.style.display == "block") {
    upArrow.style.display = "none";
    downArrow.style.display = "block";
  } else {
    upArrow.style.display = "block";
    downArrow.style.display = "none";
  }
});
