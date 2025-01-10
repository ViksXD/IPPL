<?php
session_start();
require_once 'db_connection.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    
    // Insert rating into database
    $sql = "INSERT INTO rating (rating) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rating);
    
    if ($stmt->execute()) {
        header("Location: MenuCustomer.php?rating_success=1");
        exit();
    } else {
        $error = "Failed to submit rating. Please try again.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Our Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .star-rating {
            font-size: 2em;
            cursor: pointer;
            color: #ddd;
        }
        .star-rating .fa-star.active {
            color: #ffd700;
        }
        .star-rating .fa-star:hover,
        .star-rating .fa-star:hover ~ .fa-star {
            color: #ffd700;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="w-full mx-auto p-6 mb-8 bg-[#d5ecfa]">
        <div class="flex items-center justify-between">
            <img src="logo.png" alt="Logo" class="w-1/4 md:w-1/12" />
            
            <div class="hidden font-bold md:flex space-x-12 text-[#21B7E2]">
                <a href="MenuCustomer.php" class="hover:text-indigo-500">Home</a>
                <a href="Receipt.php" class="hover:text-indigo-500">Receipt</a>
                <a href="proses.html" class="hover:text-indigo-500">Process</a>
                <a href="katalog.php" class="hover:text-indigo-500">Catalog</a>
            </div>

            <div class="flex items-center space-x-4">
                <div class="profile-info hidden sm:block">
                    <span class="font-bold"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Guest'); ?></span><br>
                    <span class="text-sm">Customer</span>
                </div>
                <img src="image/profilelogo.png" alt="Profile" class="w-12 h-12 rounded-full">
            </div>
        </div>
    </nav>

    <!-- Rating Form -->
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8 mb-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Rate Our Service</h1>

        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="rating.php" method="POST" class="space-y-6">
            <!-- Star Rating -->
            <div class="text-center mb-8">
                <p class="text-lg font-medium mb-4">How would you rate our service?</p>
                <div class="star-rating flex justify-center gap-4">
                    <i class="fas fa-star" data-rating="1"></i>
                    <i class="fas fa-star" data-rating="2"></i>
                    <i class="fas fa-star" data-rating="3"></i>
                    <i class="fas fa-star" data-rating="4"></i>
                    <i class="fas fa-star" data-rating="5"></i>
                </div>
                <input type="hidden" name="rating" id="selected-rating" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="bg-[#21B7E2] text-white px-8 py-3 rounded-lg hover:bg-[#1a92b4] transition-colors">
                    Submit Rating
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-rating .fa-star');
            const ratingInput = document.getElementById('selected-rating');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    ratingInput.value = rating;
                    
                    // Reset all stars
                    stars.forEach(s => s.classList.remove('active'));
                    
                    // Activate clicked star and all before it
                    stars.forEach(s => {
                        if (s.getAttribute('data-rating') <= rating) {
                            s.classList.add('active');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>