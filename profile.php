<?php
// Sample user data (In real applications, fetch from the database)
$user = [
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'mobile' => '9876543210',
    'address' => '123, Main Street, New York',
    'profile_pic' => 'profile.jpg' // Example profile image
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; text-align: center; padding: 20px; }
        .profile-card { background: white; padding: 20px; border-radius: 10px; width: 300px; margin: auto; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .profile-card img { width: 100px; height: 100px; border-radius: 50%; margin-bottom: 10px; }
        .profile-card h2 { margin: 10px 0; color: #333; }
        .profile-card p { margin: 5px 0; color: #777; }
    </style>
</head>
<body>

    <div class="profile-card">
        <img src="<?= $user['profile_pic']; ?>" alt="Profile Picture">
        <h2><?= $user['name']; ?></h2>
        <p><strong>Email:</strong> <?= $user['email']; ?></p>
        <p><strong>Mobile:</strong> <?= $user['mobile']; ?></p>
        <p><strong>Address:</strong> <?= $user['address']; ?></p>
    </div>

</body>
</html>
