<?php
// CONNECT to project_db
$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// INSERT DATA
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO student_db (name, email, department, phone)
            VALUES ('$name', '$email', '$department', '$phone')";

    if (!mysqli_query($conn, $sql)) {
        die("Insert Error: " . mysqli_error($conn));
    }
}

// DELETE DATA
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM student_db WHERE id=$id");
}

// FETCH DATA
$result = mysqli_query($conn, "SELECT * FROM student_db");

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
</head>
<body>

<h2>Student Form</h2>

<form method="POST">
    Name:<br>
    <input type="text" name="name" required><br><br>

    Email:<br>
    <input type="email" name="email" required><br><br>

    Department:<br>
    <input type="text" name="department" required><br><br>

    Phone:<br>
    <input type="text" name="phone"><br><br>

    <button type="submit" name="submit">Add Student</button>
</form>

<hr>

<h3>Student List</h3>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Department</th>
    <th>Phone</th>
    <th>Action</th>
</tr>

<?php if (mysqli_num_rows($result) > 0) { ?>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
                <a href="?delete=<?php echo $row['id']; ?>"
                   onclick="return confirm('Delete this student?')">
                   Delete
                </a>
            </td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr>
        <td colspan="6">No data found yet
            
        </td>
    </tr>
<?php } ?>

</table>

</body>
</html>