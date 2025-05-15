<?php
include('includes/db.php');
include('includes/header.php');

// Get total members
$totalMembers = $conn->query("SELECT COUNT(*) as count FROM members")->fetch_assoc()['count'];

// Get recent members
$recentQuery = "SELECT * FROM members ORDER BY id DESC LIMIT 5";
$recentResult = $conn->query($recentQuery);
?>

<div class="container mt-5">
    <h2 class="mb-4">Admin Dashboard Overview</h2>

    <!-- MDR Link Button -->
    <a href="members.php" class="btn btn-success mb-4">Go to Membership Data Record (MDR)</a>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Members</h5>
                    <p class="card-text display-6"><?= $totalMembers ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Members Table -->
    <div class="card">
        <div class="card-header">
            Recent Members
        </div>
        <div class="card-body">
            <?php if ($recentResult->num_rows > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Policy #</th>
                        <th>Join Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $recentResult->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['full_name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['policy_number'] ?></td>
                        <td><?= $row['join_date'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
                <p>No members found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
