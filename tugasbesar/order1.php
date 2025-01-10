<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laundry Order</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col justify-center items-center min-h-screen">
  <div class="bg-white rounded-lg shadow-lg p-6 w-96">
    <h1 class="text-xl font-bold text-[#00a9ff] text-center mb-4">Laundry Service</h1>
    
    <form action="process_order1.php" method="POST">
      <div class="space-y-4">
        <!-- Reguler Service -->
        <div class="flex items-center justify-between">
          <div>
            <p class="font-medium">Reguler</p>
            <p class="text-gray-500">Rp 30,000</p>
          </div>
          <div class="flex items-center">
            <input type="number" name="reguler" value="0" min="0" class="w-16 text-center border rounded mr-2">
          </div>
        </div>

        <!-- Premium Service -->
        <div class="flex items-center justify-between">
          <div>
            <p class="font-medium">Premium</p>
            <p class="text-gray-500">Rp 50,000</p>
          </div>
          <div class="flex items-center">
            <input type="number" name="premium" value="0" min="0" class="w-16 text-center border rounded mr-2">
          </div>
        </div>

        <!-- Treatment Service -->
        <div class="flex items-center justify-between">
          <div>
            <p class="font-medium">Treatment</p>
            <p class="text-gray-500">Rp 60,000</p>
          </div>
          <div class="flex items-center">
            <input type="number" name="treatment" value="0" min="0" class="w-16 text-center border rounded mr-2">
          </div>
        </div>
      </div>
      
      <button type="submit" class="bg-[#00a9ff] text-white w-full py-2 mt-4 rounded-lg hover:bg-blue-600">
        Submit Order
      </button>
    </form>
  </div>
</body>
</html>