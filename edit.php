<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$npm= $_POST['npm'];

	$npm=$_POST['npm'];
	$nama=$_POST['nama'];
	$no_telepon=$_POST['no_telepon'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$alamat=$_POST['alamat'];	
	// update user data
	$result = mysqli_query($koneksi, "UPDATE tbl_mahasiswa SET npm='$npm',nama='$nama',no_telepon='$no_telepon',tgl_lahir='$tgl_lahir',alamat='$alamat' WHERE npm=$npm");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$npm = $_GET['npm'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE npm=$npm");
 
while($user_data = mysqli_fetch_array($result))
{
	$npm = $user_data['npm'];
	$nama = $user_data['nama'];
	$no_telepon = $user_data['no_telepon'];
	$tgl_lahir = $user_data['tgl_lahir'];
	$alamat = $user_data['alamat'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>npm</td>
				<td><input type="text" name="npm" value=<?php echo $npm;?>></td>
			</tr>
			<tr> 
				<td>nama</td>
				<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
			</tr>
			<tr> 
				<td>no_telepon</td>
				<td><input type="text" name="no_telepon" value=<?php echo $no_telepon;?>></td>
			</tr>
			<tr>
				<td>tgl_lahir</td>
				<td><input type="text" name="tgl_lahir" value=<?php echo $tgl_lahir;?>></td>
			</tr>
			<tr>
				<td>alamat</td>
				<td><input type="text" name="alamat" value=<? echo $ alamat;?>></td>
 				<td><input type="hidden" name="id" value=<?php echo $_GET['npm'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>