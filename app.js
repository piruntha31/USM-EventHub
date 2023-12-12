

document.addEventListener("DOMContentLoaded", function () {
    // Wait for the DOM content to be fully loaded
  
    // Get the login form and add a submit event listener
    const loginForm = document.getElementById("login-form");
    loginForm.addEventListener("submit", function (event) {
      event.preventDefault(); // Prevent the default form submission
  
      // Get the selected role from the dropdown
      const selectedRole = document.getElementById("login-role").value;
  
      // Redirect to the corresponding dashboard based on the selected role
      switch (selectedRole) {
        case "admin":
          window.location.href = "admin_dashboard.html";
          break;
        case "organizer":
          window.location.href = "organizer_dashboard.html";
          break;
        case "student":
          window.location.href = "student_dashboard.html";
          break;
        default:
          // Handle other cases or display an error message
          console.error("Invalid role selected");
      }
    });
  });
  

