<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'weblab';
    $conn = mysqli_connect($host, $username, $password, $dbname) or die ("Unable to connect
    to database");
    $sql = 'select * from Students';
    $result = $conn->query($sql);
    $std = array();
    if ($result->num_rows > 0) {
        for ($i = 0; $i < $result->num_rows; $i++) {
            if ($row = $result->fetch_assoc()) {
                $std[$i]['Name'] = $row['Name'];
                $std[$i]['USN'] = $row['USN'];
                $std[$i]['Year'] = $row['Year'];
                $std[$i]['College'] = $row['College'];
            }
        }
    }
    if (isset($_GET['sort'])) {
        $key = $_GET['key'];
        for ($i = 0; $i < count($std)-1; $i++) {
            for ($j = $i+1; $j < count($std); $j++) {
                if ($std[$i][$key] < $std[$j][$key]) {
                
                    $temp = $std[$i];
                    $std[$i] = $std[$j];
                    $std[$j] = $temp;
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>10 Student Details</title>
 <style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    table {
        margin-top: 20px;
        border-collapse: collapse;
        border: 1px solid #000000;
    }
    th, td {
        padding: 10px;
        border: 1px solid #000000;
    }
 </style>
</head>
<body>
    <h1>Student Details</h1>
    <form action="" method="GET">
    <label for="keys">Sort By: </label>
    <select name="key" id="keys">
    <option value="name">Name</option>
    <option value="usn">USN</option>
    <option value="year">Year</option>
    <option value="college">College</option>
    </select>
    <input type="submit" name="sort" id="sort" value="SORT">
    </form>
    <table>
    <thead>
    <th>Name</th>
    <th>USN</th>
    <th>Year</th>
    <th>College</th>
    </thead>
    <tbody>
        <?php
            foreach ($std as $std) {
                echo "<tr>";
                echo "<td>".$std['Name']."</td>";
                echo "<td>".$std['USN']."</td>";
                echo "<td>".$std['Year']."</td>";
                echo "<td>".$std['College']."</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</body>
</html>