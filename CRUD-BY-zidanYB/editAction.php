<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
    // Escape special characters
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $age = mysqli_real_escape_string($mysqli, $_POST['age']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);    
    
    // Check for empty fields
    if (empty($name) || empty($age) || empty($email)) {
        echo '<div class="error-message">';
        if (empty($name)) {
            echo "<p>⚠️ Name field is empty.</p>";
        }
        if (empty($age)) {
            echo "<p>⚠️ Age field is empty.</p>";
        }
        if (empty($email)) {
            echo "<p>⚠️ Email field is empty.</p>";
        }
        echo '<a href="javascript:history.back()" class="btn-view">🔙 Kembali</a>';
        echo '</div>';
    } else {
        // Update database
        $result = mysqli_query($mysqli, "UPDATE users 
            SET `name` = '$name', `age` = '$age', `email` = '$email' 
            WHERE `id` = $id");

        // Display success message
        echo '
        <div class="success-message">
            <h2>✅ Data Berhasil Diupdate!</h2>
            <p>Perubahan sudah tersimpan di database.</p>
            <a href="index.php" class="btn-view">📂 Lihat Hasil</a>
        </div>
        ';
    }
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f6fa;
    }

    .success-message, .error-message {
        background: linear-gradient(135deg, #7b2ff7, #0ebeff);
        color: white;
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        max-width: 400px;
        margin: 60px auto;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        animation: fadeIn 1.2s ease-in-out;
    }

    .success-message h2 {
        margin: 0 0 10px;
        font-size: 24px;
        animation: bounce 1s infinite alternate;
    }

    .error-message {
        background: linear-gradient(135deg, #ff4e50, #f9d423);
    }

    .error-message p {
        margin: 5px 0;
    }

    /* Button Style */
    .btn-view {
        display: inline-block;
        margin-top: 15px;
        padding: 12px 25px;
        background: white;
        color: #7b2ff7;
        font-weight: bold;
        text-decoration: none;
        border-radius: 25px;
        transition: 0.3s;
        box-shadow: 0 0 10px rgba(123,47,247,0.5);
        animation: pulse 1.5s infinite;
    }

    .btn-view:hover {
        background: #0ebeff;
        color: white;
        transform: scale(1.15) rotate(1deg);
        box-shadow: 0 0 20px rgba(14,190,255,0.8);
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

    @keyframes pulse {
        0% { box-shadow: 0 0 5px rgba(123,47,247,0.6); }
        50% { box-shadow: 0 0 20px rgba(14,190,255,0.8); }
        100% { box-shadow: 0 0 5px rgba(123,47,247,0.6); }
    }
</style>
