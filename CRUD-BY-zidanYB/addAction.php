<html>
<head>
	<title>Add Data</title>
	<style>
	.success-message {
		background: linear-gradient(135deg, #7b2ff7, #0ebeff);
		color: white;
		padding: 20px;
		border-radius: 15px;
		text-align: center;
		font-family: Arial, sans-serif;
		max-width: 400px;
		margin: 50px auto;
		box-shadow: 0 8px 20px rgba(0,0,0,0.2);
		animation: fadeIn 1.2s ease-in-out;
	}

	.success-message h2 {
		margin: 0 0 10px;
		font-size: 24px;
		animation: bounce 1s infinite alternate;
	}

	.success-message p {
		font-size: 16px;
		margin-bottom: 20px;
	}

	.btn-view {
		display: inline-block;
		padding: 10px 20px;
		background: white;
		color: #7b2ff7;
		font-weight: bold;
		text-decoration: none;
		border-radius: 25px;
		transition: 0.3s;
	}

	.btn-view:hover {
		background: #0ebeff;
		color: white;
		transform: scale(1.1);
	}

	/* Animations */
	@keyframes fadeIn {
		from { opacity: 0; transform: translateY(-20px); }
		to { opacity: 1; transform: translateY(0); }
	}

	@keyframes bounce {
		from { transform: translateY(0); }
		to { transform: translateY(-5px); }
	}
	</style>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// Check for empty fields
	if (empty($name) || empty($age) || empty($email)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if (empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO users (`name`, `age`, `email`) VALUES ('$name', '$age', '$email')");

		if ($result) {
			// Display success message
			echo '
			<div class="success-message">
				<h2>✅ Selamat!</h2>
				<p>Data Anda sudah berhasil dibuat 🎉</p>
				<a href="index.php" class="btn-view">Lihat Hasil</a>
			</div>';
		} else {
			echo "<font color='red'>Gagal menyimpan data: " . mysqli_error($mysqli) . "</font>";
		}
	}
}
?>
</body>
</html>
