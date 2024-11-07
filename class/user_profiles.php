<?php
require '../Database/database.php';

$db = new Database();
$usersWithProfiles = $db->getUsersWithProfiles(); // Fetch all users with their profiles

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/user_profiles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">User Profiles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../modules/dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../class/user_profiles.php"><i class="fas fa-users"></i> Profiles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../modules/login.php" onclick="return confirmLogout()">
                            <i class="fas fa-power-off"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
    </script>
    
    <h1 style="text-align: center;">User Profiles</h1>

    <div class="cards-container">
        <?php if (!empty($usersWithProfiles)): ?>
            <?php foreach ($usersWithProfiles as $user): ?>
                <div class="card">
                    <form action="../process/update_profile.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                        <div class="card-header">
                            <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>
                            <p style="font-size: 0.9rem; color: #666;">User ID: <?php echo $user['user_id']; ?></p> <!-- Displaying the user ID -->
                        </div>
                        <table class="table">
                            <tbody>
                                <?php foreach ($user as $key => $value): ?>
                                    <?php if ($key !== 'user_id' && $key !== 'first_name' && $key !== 'last_name' && $key !== 'username'): ?>
                                        <tr>
                                            <td><?php echo ucfirst(str_replace('_', ' ', $key)); ?></td>
                                            <td>
                                                <input type="text" class="form-control" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($value); ?>">
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center;">No user profiles found.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
