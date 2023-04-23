<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
  class="centre";
}
th,td {
  padding: 5px;
}
</style>
<body>

<h5 style=text-allign:"centre;">click here to get product details</h5>
<centre>
<button type="button" onclick="loadDoc()">Get product details</button>
<br><br>
</centre>
<table id="demo"></table>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xhttp.open("GET", "product.xml", true);
  xhttp.send();
}
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>product id</th><th>product name</th><th>product rate</th><th>warranty</th></tr>";
  var x = xmlDoc.getElementsByTagName("p");
  for (i = 0; i <x.length; i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("pid")[0].childNodes[0].nodeValue +
    "</td><td>" + x[i].getElementsByTagName("p_name")[0].childNodes[0].nodeValue +
    "</td><td>" + x[i].getElementsByTagName("p_rate")[0].childNodes[0].nodeValue +
    "</td><td>" + x[i].getElementsByTagName("p_warranty")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("demo").innerHTML = table;
}
</script>

</body>
</html>
