

  function redirectTouserprofile() {
    window.location.href = '/dashboard_staff/Userprofile_staff.php'; // Todo actual file path
  }

  function redirectToproducts() {
    window.location.href = ''; // Todo actual file path
  }


  function redirectviewtransacrtion() {
      window.location.href = ''; // Todo actual file path
    }

  function redirectTosuppliers() {
    window.location.href = ''; // Todo actual file path
  }


  // This is Btn Logout 


  function confirmLogout() {
    // Display a confirmation dialog
    var result = window.confirm("Are you sure you want to logout?");

    // Check the user's choice
    if (result) {
      // User clicked "OK" (Yes), redirect to a specific URL
      alert("You have been logged out!");
      window.location.href = "/Login/login.html";  
    } else {
      // User clicked "Cancel", do nothing or handle accordingly
    }
  }

