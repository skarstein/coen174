function logout() {
  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
              location.reload(true);
      }
    };
    xhttp.open("GET", "logout.php");
    xhttp.send();
    window.location.href = "homepage.html";
}
