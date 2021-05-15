<?php
if (isset($_POST['uj']) and isset($_POST['search'])) {
    $search  = $_POST['search'];
    header("Location:artists.php?search=$search");
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('head.php'); ?>
</head>

<body>
    <?php include('nav-bar.php'); ?>
    <?php
    include 'db.php';
    $link = opendb();
    $eredmeny = mysqli_query($link, "SELECT a.id AS id, a.artistName AS artistName, a.artistAlias AS artistAlias, a.artistCountry AS artistCountry FROM artists a");
    ?>
    <h1 class="text-center">Előadók</h1>
    <div style="display:flex;flex-direction:row;justify-items:space-between;justify-content: space-between;align-items: baseline;flex-wrap: wrap">
        <form method="get" action="searchartists.php" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <p>
            <a class="btn btn-primary" href="insertartist.php">Új elem beszúrása</a>
        </p>
    </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Alias (Művésznév)</th>
            <th>Név</th>
            <th>Származási Ország</th>
            <th>Műveletek</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($eredmeny)) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['artistAlias'] ?></td>
                <td><?= $row['artistName'] ?></td>
                <td><?= $row['artistCountry'] ?></td>
                <td><a href="editartist.php?id=<?= $row['id'] ?>">Szerkesztés</a>, <a href="deleteartists.php?id=<?= $row['id'] ?>">Törlés</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php mysqli_close($link) ?>
</body>
<?php include('footer.php'); ?>

</html>