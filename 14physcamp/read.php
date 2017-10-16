<?php

include('connect.php');



 $result = mysqli_query($con,"SELECT *,  COUNT(ID) FROM 2k14_list GROUP BY ID HAVING ( COUNT(ID) >= 1 )");

 echo "<table>";

  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Sex'] . "</td>";
  echo "<td>" . $row['ID'] . "</td>";
  echo "<td>" . $row['Birthday'] . "</td>";
  echo "<td>" . $row['Parent'] . "</td>";
  echo "<td>" . $row['Email'] . "</td>";
  echo "<td>" . $row['Phone'] . "</td>";
  echo "<td>" . $row['CellPhone'] . "</td>";
  echo "<td>" . $row['Address'] . "</td>";
  echo "<td>" . $row['School'] . "</td>";
  echo "<td>" . $row['Grade'] . "</td>";
  echo "<td>" . $row['Introduction'] . "</td>";
  echo "</tr>";
  }

echo "</table>";

mysqli_close($con);

?>