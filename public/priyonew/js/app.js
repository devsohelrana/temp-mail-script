// Dark Mode Enables Buttons
const darkModeToggle = document.querySelector("#darkModeToggle");

// Function to toggle dark mode
function toggleDarkMode() {
  const isDarkMode = document.documentElement.classList.contains("dark");
  if (isDarkMode) {
    document.documentElement.classList.remove("dark");
    localStorage.theme = "light";
  } else {
    document.documentElement.classList.add("dark");
    localStorage.theme = "dark";
  }
}

// Set initial mode based on localStorage or system preference
if (
  localStorage.theme === "dark" ||
  (!("theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  document.documentElement.classList.add("dark");
}

// Toggle mode when button is clicked
darkModeToggle.addEventListener("click", toggleDarkMode);


// Navigation Menu
const humIcon = document.querySelector("#humIcon");
const closeIcon = document.querySelector("#closeIcon");
const navMenu = document.querySelector("#sideMenu");

// Select all <li> or <a> elements inside the navMenu
const menuItems = navMenu.querySelectorAll("li, a");

humIcon.addEventListener("click", () => {
  navMenu.classList.add("active");
});
closeIcon.addEventListener("click", () => {
  navMenu.classList.remove("active");
});

// Add event listener to all menu items
menuItems.forEach(item => {
  item.addEventListener("click", () => {
    navMenu.classList.remove("active");
  });
});