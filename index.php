<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Add New User</a><br/><br/>
 
 
    <table width='80%' border=1>
 
    <tr>
        <th>Npm</th> <th>nama</th> <th>notelepon</th> <th>tanggallahir</th> <th>alamat</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['npm']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['no_telepon']."</td>"; 
        echo "<td>".$user_data['tgl_lahir']."</td>";
        echo "<td>".$user_data['alamat']."</td>";
        echo "<td><a href='edit.php?npm=$user_data[npm]'>Edit</a>";
        echo "<a href='delete.php?id=$user_data[npm]'>Delete</a></td></tr>";
              }?>
    </table>
</body>
</html>