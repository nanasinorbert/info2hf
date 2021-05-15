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

    $eredmeny = mysqli_query($link, sprintf("SELECT s.id AS id, s.songName AS songName, s.releaseYear AS releaseYear, s.songStyle AS songStyle, IFNULL(a.artistAlias, 'Ismeretlen') AS artistAlias FROM songs s LEFT OUTER JOIN artists a ON s.Artists_Id =a.id WHERE false"));

    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $eredmeny = mysqli_query($link, sprintf("SELECT s.id AS id, s.songName AS songName, s.releaseYear AS releaseYear, s.songStyle AS songStyle, IFNULL(a.artistAlias, 'Ismeretlen') AS artistAlias FROM songs s LEFT OUTER JOIN artists a ON s.Artists_Id =a.id WHERE songName LIKE '%%%s%%' OR releaseYear LIKE '%%%s%%' OR songStyle LIKE '%%%s%%' OR IFNULL(artistAlias, 'Ismeretlen') LIKE '%%%s%%'", mysqli_real_escape_string($link, $search), mysqli_real_escape_string($link, $search), mysqli_real_escape_string($link, $search), mysqli_real_escape_string($link, $search)));
    }

    ?>
    <h1 class="text-center">Számok</h1>
    <div style="display:flex;flex-direction:row;justify-items:space-between;justify-content: space-between;align-items: baseline;flex-wrap: wrap">
        <form method="get" action="searchsongs.php" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <p>
            <a class="btn btn-primary" href="insertsong.php">Új elem beszúrása</a>
        </p>
    </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Előadó (Alias)</th>
            <th>Cím</th>
            <th>Kiadás éve</th>
            <th>Stílus</th>
            <th>Műveletek</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($eredmeny)) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['artistAlias'] ?></td>
                <td><?= $row['songName'] ?></td>
                <td><?= $row['releaseYear'] ?></td>
                <td><?= $row['songStyle'] ?></td>
                <td><a href="editsong.php?id=<?= $row['id'] ?>">Szerkesztés</a>, <a href="deletesongs.php?id=<?= $row['id'] ?>">Törlés</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php mysqli_close($link) ?>

</body>
<?php include('footer.php'); ?>

</html>