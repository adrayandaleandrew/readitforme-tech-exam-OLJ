<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Table</title>


    <!-- START CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <!-- END CSS -->

</head>
<body>
    <h2>List of Employees and Current </h2>

    <!-- START TABLE -->
    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
            </tr>
        </thead>

        <tbody>

            <?php
            // for connection to db
            $servername = "localhost";  // db servername or hostname
            
            $username = "root";     // db username | this can be change based on the database configuration

            $password = "";     // db password | this can be change based on the database configuration

            $dbname = "testdb";  // name of db, NOTE: I used xampp/phpmyadmin for this 

            
            $conn = new mysqli($servername, $username, $password, $dbname); // create connection

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $sql = "SELECT id, name, position FROM employees";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["position"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>0 results</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>


    </table>
    <!-- END TABLE -->

</body>
</html>
