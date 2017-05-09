<?php
session_start();
if (!isset($_SESSION['user'])) {
    if (isset($_COOKIE['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
    }
}
if (empty($_SESSION['user'])) {
    header("Location: login.php?s=-1");
    exit();
}
include('./sql.php');
$uuid = mysqli_fetch_array(mysqli_query($link, 'SELECT id FROM userlist WHERE user ="' . $_SESSION['user'] . '"'));
?>
<?php include('./header.php') ?>
<div class="container">
    <div class="row">
        <input id="userinfo" value="<?php echo $uuid['id']; ?>" style="display: none;">
        <div class="col-md-3">
            <div id="nav">
                <?php include('./nav.php') ?>
            </div>
        </div>

        <div class="col-md-9" role="main">
            <div id="content">
            </div>
        </div>
    </div>
</div>
<?php include('./footer.php'); ?>
