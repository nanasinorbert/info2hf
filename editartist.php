<?php
include 'db.php';
if (isset($_GET['id'])) {
    $link = opendb();
    $id = $_GET['id'];

    $query = "SELECT * FROM artists WHERE id=" . mysqli_real_escape_string($link, $id);
    $res = mysqli_query($link, $query);
    mysqli_close($link);
    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $artistName = $row['artistName'];
        $artistAlias = $row['artistAlias'];
        $artistCountry = $row['artistCountry'];
    }
}
?>

<html>

<head>
    <?php include('head.php'); ?>
</head>

<body>
    <?php include('nav-bar.php'); ?>
    <form method="post">
        <div class="form-group">
        </div>
        <h1 class="text-center">Zeneszám szerkesztése</h1>
        <p>
            ID: <input value="<?php echo $id ?>" class="form-control" type="number" name="id" disabled="true" />
        </p>
        <p>
            Előadó neve: <input value="<?php echo $artistName ?>" class="form-control" type="text" maxlength="45" name="artistName" />
        </p>
        <p>
            Alias (Művésznév): <input value="<?php echo $artistAlias ?>" class="form-control" type="text" maxlength="45" name="artistAlias" />
        </p>
        <p>
            Származási Ország: <input value="<?php echo $artistCountry ?>" class="form-control" type="text" maxlength="45" name="artistCountry" />
        </p>
        <p>
            <input class="btn btn-primary" type="submit" value="Elküld" name="uj" />
        </p>
    </form>
</body>

</html>
<?php
if (isset($_POST['uj']) and isset($_POST['artistName']) and $_POST['artistAlias'] and $_POST['artistCountry']) {
    $link = opendb();
    $id = $_GET['id'];
    $artistName  = $_POST['artistName'];
    $artistAlias = $_POST['artistAlias'];
    $artistCountry = $_POST['artistCountry'];

    $query = sprintf("UPDATE artists SET artistName='%s', artistAlias='%s', artistCountry='%s' WHERE id='%s'", mysqli_real_escape_string($link, $artistName), mysqli_real_escape_string($link, $artistAlias), mysqli_real_escape_string($link, $artistCountry), mysqli_real_escape_string($link, $id));
    mysqli_query($link, $query);
    header("Location: artists.php");

    mysqli_close($link);
}
include('footer.php');
?>