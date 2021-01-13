
  function szukaj(str) {
    if (str.length == 0) {
      document.getElementById("odp").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("odp").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "search_res?q=" + str, true);
      xmlhttp.send();
    }
  }
