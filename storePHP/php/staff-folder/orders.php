<?php
require_once('../config.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['order_id']) && isset($_POST['status'])) {
        $order_id = $_POST['order_id'];
        $new_status = $_POST['status'];
        try { 
            $stmt = $db->prepare("UPDATE pendings SET status = :status WHERE order_id = :order_id");
            $stmt->bindParam(':status', $new_status);
            $stmt->bindParam(':order_id', $order_id);
           
            $stmt->execute();
        } catch (PDOException $e) { 
            echo "Error: " . $e->getMessage();
        }
    }
}
$sql = "SELECT * FROM pendings";
$stmt = $db->prepare($sql);
$stmt->execute();
$pendings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pendings as $pending) : ?>
            <tr>
                <td><?php echo htmlspecialchars($pending['order_id']); ?></td>
                <td><?php echo htmlspecialchars($pending['name']); ?></td>
                <td><?php echo htmlspecialchars($pending['date']); ?></td>
                <td>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($pending['order_id']); ?>">
                        <select name="status">
                            <option value="Pending" <?php echo ($pending['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="Processing" <?php echo ($pending['status'] == 'Processing') ? 'selected' : ''; ?>>Processing</option>
                            <option value="Delivered" <?php echo ($pending['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                            <option value="Completed" <?php echo ($pending['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        <td colspan="4" style="text-align: center;"><a href="../staff.php">Go back</a></td>
    </tbody>
</table>

<style>
    </style>
