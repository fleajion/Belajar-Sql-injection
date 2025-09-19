<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$age = $resultData['age'];
$email = $resultData['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            animation: slideIn 1s ease-in-out;
        }
        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .btn {
            transition: transform 0.3s;
        }
        .btn:hover {
            transform: scale(1.1);
        }
        input[type="text"], input[type="number"] {
            border-radius: 5px;
            padding: 5px;
            border: none;
            width: 100%;
        }
        .input-group button {
            cursor: pointer;
        }
        .home-btn {
            background-color: green !important;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Ubah Data</h2>
        <p class="text-center">
            <a href="index.php" class="btn home-btn">Home</a>
        </p>
        <form name="edit" method="post" action="editAction.php">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Umur</label>
                <div class="input-group">
                    <button type="button" class="btn btn-secondary" onclick="changeAge(-1)">-</button>
                    <input type="number" name="age" id="age" class="form-control text-center" value="<?php echo $age; ?>" min="0" required>
                    <button type="button" class="btn btn-secondary" onclick="changeAge(1)">+</button>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="text-center">
                <input type="submit" name="update" value="Update" class="btn btn-success">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeAge(amount) {
            let ageInput = document.getElementById('age');
            let currentValue = parseInt(ageInput.value);
            if (!isNaN(currentValue)) {
                let newValue = currentValue + amount;
                if (newValue >= 0) {
                    ageInput.value = newValue;
                }
            }
        }
    </script>
</body>
</html>
