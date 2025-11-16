<?php
require_once("db_config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE pages SET title = '$title', content = '$content' WHERE id = $id";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    header("Location: index.php?id=$id");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pages WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Page</title>
    <style>
        * {
            font-family: Verdana, Tahoma, sans-serif;
            font-size: 16px;
            margin: 5px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
        }

        .button {
            text-align: right;
        }

        #title, #content {
            width: 100%;
            padding: 5px;
        }

        #content {
            height: 350px;
        }
    </style>
</head>
<body>

<form method="post" id="form">
    <h1>Update Page</h1>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <p>
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
    </p>
    <p>
        <label for="content">Content</label><br>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($row['content']); ?></textarea>
    </p>

    <p class="button">
        <input type="submit" name="update" value="Update">
        <a href="index.php"><input type="button" value="Cancel"></a>
    </p>
</form>

</body>
</html>
