<!DOCTYPE html>
  
<head>
    <script>
        function loadXMLDoc() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
  
                // Request finished and response 
                // is ready and Status is "OK"
                if (this.readyState == 4 && this.status == 200) {
                    Details(this);
                }
            };
  
            // employee.xml is the external xml file
            xmlhttp.open("GET", "product.xml", true);
            xmlhttp.send();
        }
  
        function Details(xml) {
            var i;
            var xmlDoc = xml.responseXML;
            var table =
                `<tr><th>p_name</th>
                    <th>p_rate</th>
                    <th>p_warranty</th></tr>`;
            var x = xmlDoc.getElementsByTagName("product");
  
            // Start to fetch the data by using TagName 
            for (i = 0; i < x.length; i++) {
                table += "<tr><td>" +
                    x[i].getElementsByTagName("p_name")[0]
                    .childNodes[0].nodeValue + "</td><td>" +
                    x[i].getElementsByTagName("p_rate")[0]
                    .childNodes[0].nodeValue + "</td><td>" +
                    x[i].getElementsByTagName("p_warranty")[0]
                    .childNodes[0].nodeValue + "</td><td>" ;
            }
  
            // Print the xml data in table form
            document.getElementById("id").innerHTML = table;
        }
    </script>
</head>
  
<body>
<label for="product">Choose a product:</label>

<select id="products" name="products">
    <option value="Computer">Computer</option>
  <option value="Speaker<">Speaker<</option>
  <option value="Headset">Headset</option>
  <option value="Mobile">Mobile</option>
</select>
        <button style="darkgoldenrod " type="button" class="button" onclick="loadXMLDoc()">
            Get details
        </button>
    
      
    <br><br>
    <table id="id"></table>
</body>
  
</html>