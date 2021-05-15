<?php
include 'db.php';

if (isset($_GET['id'])) {
    $link = opendb();
    $id = $_GET['id'];

    $query = "SELECT * FROM songs WHERE id=" . mysqli_real_escape_string($link, $id);
    $eredmeny = mysqli_query($link, "SELECT id, artistAlias FROM artists ORDER BY artistAlias");
    $res = mysqli_query($link, $query);

    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $Artist_id = $row['Artists_id'];
        $songName = $row['songName'];
        $releaseYear = $row['releaseYear'];
        $songStyle = $row['songStyle'];
    }
}

if (isset($_POST['uj']) and isset($_POST['songName']) and $_POST['releaseYear'] and $_POST['songStyle']) {
    $link = opendb();
    $id = $_GET['id'];
    $songName  = $_POST['songName'];
    $releaseYear = $_POST['releaseYear'];
    $songStyle = $_POST['songStyle'];
    if (preg_match("/^[0-9]{4}$/", $releaseYear)) {
        if ($_POST['artist'] !== '') {
            $artist_id = $_POST['artist'];
            $query = sprintf("UPDATE songs SET Artists_id='%s', songName='%s', releaseYear='%s', songStyle='%s' WHERE id='%s'", mysqli_real_escape_string($link, $artist_id), mysqli_real_escape_string($link, $songName), mysqli_real_escape_string($link, $releaseYear), mysqli_real_escape_string($link, $songStyle), mysqli_real_escape_string($link, $id));
            mysqli_query($link, $query);
        } else {
            $query = sprintf("UPDATE songs SET songName='%s', releaseYear='%s', songStyle='%s', Artists_id=NULL WHERE id='%s'", mysqli_real_escape_string($link, $songName), mysqli_real_escape_string($link, $releaseYear), mysqli_real_escape_string($link, $songStyle), mysqli_real_escape_string($link, $id));
            mysqli_query($link, $query);
        }
        header("Location:songs.php");
    } else {
        echo "invalid input";
    }
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
        <h1 class="text-center">Zeneszám szerkesztése</h1>
        <p>
            ID: <input value="<?php echo $id ?>" class="form-control" type="number" name="id" disabled="true" />
        </p>
        <p>
            Előadó:
            <select class="form-control" name="artist" id="artist">
                <option value=''>Ismeretlen</option>
                <?php while ($row = mysqli_fetch_array($eredmeny)) : ?>
                    <option <?php if ($row['id'] === $Artist_id) echo "selected" ?> value=<?php echo $row['id'] ?>><?php echo $row['artistAlias'] ?></option>
                <?php endwhile; ?>
            </select>
            <?php mysqli_close($link) ?>
        </p>
        <p>
            Zene címe: <input value="<?php echo $songName ?>" class="form-control" type="text" maxlength="45" name="songName" />
        </p>
        <p>
            Kiadás éve: <input value="<?php echo $releaseYear ?>" class="form-control" type="number" name="releaseYear" />
        </p>
        <p>
            Stílus: <input value="<?php echo $songStyle ?>" class="form-control" type="text" maxlength="45" name="songStyle" />
        </p>
        <p>
            <input class="btn btn-primary" type="submit" value="Elküld" name="uj" />
        </p>
    </form>
</body>

</html>