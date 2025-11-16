<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Web</title>
    <style>
        ul.menu {
            margin: 0;
            padding: 0;
        }

        li.menu {
            display: inline;
            font-size: 20px;
        }

        a.menu {
            color: blue;
            margin-right: 5px;
            padding: 5px;
            text-decoration: none;
            border-style: solid;
            border-width: 1px;
            border-radius: 10px;
        }

        a.menu:hover {
            background-color: blue;
            color: white;
        }

        a.active {
            background-color: red;
            color: yellow;
        }

        #content {
            margin-top: 20px;
            font-size: 18px;
        }

        .action-links {
            margin-top: 20px;
        }

        a.btn {
            display: inline-block;
            margin-right: 10px;
            padding: 8px 12px;
            text-decoration: none;
            background-color: green;
            color: white;
            border-radius: 5px;
            font-weight: bold;
        }

        a.btn:hover {
            background-color: darkgreen;
        }

        a.btn-update {
            background-color: orange;
        }

        a.btn-update:hover {
            background-color: darkorange;
        }

        a.btn-delete {
            background-color: red;
        }

        a.btn-delete:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
require_once("db_config.php");

$sql = "SELECT * FROM pages";
$result = mysqli_query($conn, $sql);

echo "<ul class='menu'>";
while ($row = mysqli_fetch_assoc($result)) {
    $active = ($id == $row['id']) ? "active" : "";
    echo "<li class='menu'><a class='menu $active' href='index.php?id={$row['id']}'>{$row['title']}</a></li>";
}
echo "</ul>";

if ($id) {
    $sql = "SELECT * FROM pages WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo "<div id='content'>{$row['content']}</div>";

    echo "<div class='action-links'>";
    echo "<a href='update.php?id={$row['id']}' class='btn btn-update'>Update</a>";
    echo "<a href='delete.php?id={$row['id']}' class='btn btn-delete' onclick=\"return confirm('Bạn có chắc muốn xóa không?');\">Delete</a>";
    echo "</div>";
} else {
    echo "<div id='content'>Chọn một trang để xem nội dung.</div>";
}


mysqli_close($conn);
?>

<div class="action-links">
    <a href="addnew.php" class="btn">Add New</a>
</div>

</body>
</html>
