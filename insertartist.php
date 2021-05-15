<?php
include 'db.php';
if (isset($_POST['uj']) and isset($_POST['artistName']) and $_POST['artistAlias'] and $_POST['artistCountry']) {
    $link = opendb();

    $artistName  = $_POST['artistName'];
    $artistAlias = $_POST['artistAlias'];
    $artistCountry = $_POST['artistCountry'];

    $query = sprintf("INSERT INTO artists(artistName, artistAlias, artistCountry) VALUES('%s', '%s', '%s')", mysqli_real_escape_string($link, $artistName), mysqli_real_escape_string($link, $artistAlias), mysqli_real_escape_string($link, $artistCountry));
    mysqli_query($link, $query);

    header("Location: artists.php");

    mysqli_close($link);
}
include('footer.php');
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
        <h1 class="text-center">Előadó felvétele</h1>
        <p>
            Előadó neve: <input class="form-control" type="text" maxlength="45" name="artistName" />
        </p>
        <p>
            Alias (Művésznév): <input class="form-control" type="text" maxlength="45" name="artistAlias" />
        </p>
        <p>
            Származási Ország: <input class="form-control" type="text" maxlength="45" name="artistCountry" />
        </p>
        <p>
            <input class="btn btn-primary" type="submit" value="Elküld" name="uj" />
        </p>
    </form>
</body>
<?php include('footer.php'); ?>

</html>