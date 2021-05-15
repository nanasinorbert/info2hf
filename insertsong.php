<?php
include 'db.php';
if (isset($_POST['uj']) and isset($_POST['songName']) and $_POST['releaseYear'] and $_POST['songStyle']) {
    $link = opendb();

    $songName  = $_POST['songName'];
    $releaseYear = $_POST['releaseYear'];
    $songStyle = $_POST['songStyle'];

    if (preg_match("/^[0-9]{4}$/", $releaseYear)) {
        if ($_POST['artist'] !== '') {
            $artist_id = $_POST['artist'];
            $query = sprintf("INSERT INTO songs(Artists_id, songName, releaseYear, songStyle) VALUES('%s','%s','%s','%s')", mysqli_real_escape_string($link, $artist_id), mysqli_real_escape_string($link, $songName), mysqli_real_escape_string($link, $releaseYear), mysqli_real_escape_string($link, $songStyle));
            mysqli_query($link, $query);
        } else {
            $query = sprintf("INSERT INTO songs(songName, releaseYear, songStyle) VALUES('%s','%s','%s')", mysqli_real_escape_string($link, $songName), mysqli_real_escape_string($link, $releaseYear), mysqli_real_escape_string($link, $songStyle));
            mysqli_query($link, $query);
        }
        header("Location:songs.php");
    } else {
        echo "invalid input";
    }
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
    <?php
    $link = opendb();
    $eredmeny = mysqli_query($link, "SELECT id, artistAlias FROM artists ORDER BY artistAlias");
    ?>
    <form method="post">
        <div class="form-group">
        </div>
        <h1 class="text-center">Zeneszám felvétele</h1>
        <p>
            Előadó:
            <select class="form-control" name="artist" id="artist">
                <option value=''>Ismeretlen</option>
                <?php while ($row = mysqli_fetch_array($eredmeny)) : ?>
                    <option value=<?php echo $row['id'] ?>><?php echo $row['artistAlias'] ?></option>
                <?php endwhile; ?>
            </select>
            <?php mysqli_close($link) ?>
        </p>
        <p>
            Szám címe: <input class="form-control" type="text" maxlength="45" name="songName" />
        </p>
        <p>
            Kiadás Éve: <input class="form-control" type="number" name="releaseYear" />
        </p>
        <p>
            Stílus: <input class="form-control" type="text" maxlength="45" name="songStyle" />
        </p>
        <p>
            <input class="btn btn-primary" type="submit" value="Elküld" name="uj" />
        </p>
    </form>
</body>
<?php include('footer.php');?>

</html>