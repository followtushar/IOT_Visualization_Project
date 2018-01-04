<?php 
error_reporting(E_ALL);
/* PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:p313.database.windows.net,1433; Database = p313db", "tushar", "India@2017");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
*/

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "tushar@p313", "pwd" => "India@2017", "Database" => "p313db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:p313.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

$stmt = sqlsrv_query($conn, 'select * from Events_IOT'); 

?><head>
<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" ></script>




<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               <th>Device</th>
		<th>Temprature</th>
		<th>Time </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Device</th>
<th>Temprature</th>
<th>Time </th>
            </tr>
        </tfoot>
        <tbody>
<?php while($row = sqlsrv_fetch_array($stmt)) 
{
echo "<tr><td>". $row['device'] . "</td>";
echo "<td>" . $row['temp'] . "</td>";
echo "<td>" . $row['logdatetime'] . "</td></tr>";

} ?>
        </tbody>
    </table>

