<html>
<body>
<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] == '2') {
        echo "<p>Second page</p>";
        return true;
    }
    if ($_GET['page'] == '3') {
        echo "<p>Third page</p>";
    }
    if ($_GET['page'] == '4') {
        echo "<p>Fourth page</p>";
    }
    if ($_GET['page'] == '5') {
        echo "<p>Fifth page</p>";
    }
}else echo "<p>First page</p>";
?>

</body>
</html>