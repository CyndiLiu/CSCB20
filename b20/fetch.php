<html>
<head>
</head>
<body>

<?php
    $servername = "mathlab.utsc.utoronto.ca";
    $username = "liuwenyu";
    $password = "liuwenyu";
    $dbname = "cscb20w18_liuwenyu";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";
    $sql = "SELECT UTORid, firstname, lastname FROM Accounts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["UTORid"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>


</body>
</html>