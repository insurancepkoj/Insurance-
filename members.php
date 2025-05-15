<?php
include('includes/db.php');
include('includes/header.php');

// Fetch all members
$members = $conn->query("SELECT * FROM members ORDER BY id DESC");
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Membership Data Record (MDR)</h2>
        <a href="add_member.php" class="btn btn-primary">+ Add Member</a>
    </div>

    <a href="dashboard.php" class="btn btn-secondary mb-3">← Back to Dashboard</a>

    <?php if ($members->num_rows > 0): ?>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Policy #</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Join Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $members->fetch_assoc()): ?>
            <tr>
                <td><?= $row['full_name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['policy_number'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['join_date'] ?></td>
                <td>
                    <a href="edit_member.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete_member.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this member?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No members found.</p>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
