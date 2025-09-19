<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
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
        <h2 class="text-center">Tambah data</h2>
        <p class="text-center">
            <a href="index.php" class="btn home-btn">Home</a>
        </p>
        <form action="addAction.php" method="post" name="add">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Umur</label>
                <div class="input-group">
                    <button type="button" class="btn btn-secondary" onclick="changeAge(-1)">-</button>
                    <input type="number" name="age" id="age" class="form-control text-center" value="0" min="0" required>
                    <button type="button" class="btn btn-secondary" onclick="changeAge(1)">+</button>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" value="tambah" class="btn btn-success">
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
