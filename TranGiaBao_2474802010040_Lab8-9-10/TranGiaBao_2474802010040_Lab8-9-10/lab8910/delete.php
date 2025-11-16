<?php
require_once("db_config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM pages WHERE id = $id";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);

header("Location: index.php");
exit;
?>
