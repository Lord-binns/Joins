<?php
require_once '../Database/database.php';

$db = new Database();
$usersWithProfilesLeftJoin = $db->getUsersWithProfiles(); // Uses LEFT JOIN
$usersWithProfilesInnerJoin = $db->getUsersWithProfilesInnerJoin(); // Uses INNER JOIN

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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

    <div class="container mt-5">
        <h1>User Profiles - LEFT JOIN</h1>
        <p>Showing all users, including those without profile data.</p>
        <!-- Table for LEFT JOIN -->
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Bio</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usersWithProfilesLeftJoin)): ?>
                    <?php foreach ($usersWithProfilesLeftJoin as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['user_id']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['first_name']) ?></td>
                            <td><?= htmlspecialchars($user['last_name']) ?></td>
                            <td><?= htmlspecialchars($user['date_of_birth']) ?></td>
                            <td><?= htmlspecialchars($user['address']) ?></td>
                            <td><?= htmlspecialchars($user['phone_number']) ?></td>
                            <td><?= htmlspecialchars($user['bio']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No profiles found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h1>User Profiles - INNER JOIN</h1>
        <p>Showing only users with complete profile data.</p>
        <!-- Table for INNER JOIN -->
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Bio</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usersWithProfilesInnerJoin)): ?>
                    <?php foreach ($usersWithProfilesInnerJoin as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['user_id']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['first_name']) ?></td>
                            <td><?= htmlspecialchars($user['last_name']) ?></td>
                            <td><?= htmlspecialchars($user['date_of_birth']) ?></td>
                            <td><?= htmlspecialchars($user['address']) ?></td>
                            <td><?= htmlspecialchars($user['phone_number']) ?></td>
                            <td><?= htmlspecialchars($user['bio']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No profiles found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="footer">Made with ♥ by Binns UwU</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>