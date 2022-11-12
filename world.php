<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

if(isset($_GET['country']) && empty($_GET['lookup'])){
  $country = filter_var($_GET['country']);
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<table>
    <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
    </tr>";
    
    foreach ($results as $row)
    echo"<tr> 
          <td>" . $row['name'] . "</td>
          <td>" . $row['continent'] . "</td>
          <td>" . $row['independence_year'] . "</td>
          <td>" . $row['head_of_state'] . "</td>
        </tr>";
}

if(isset($_GET['lookup']) && !empty($_GET['country'])){
  $country = filter_var($_GET['country']);
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries, cities WHERE countries.name LIKE '%$country%' AND countries.code = cities.country_code");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<table>
    <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
    </tr>";
    
    foreach ($results as $row)
    echo"<tr> 
          <td>" . $row['name'] . "</td>
          <td>" . $row['district'] . "</td>
          <td>" . $row['population'] . "</td>
        </tr>";
}
?>