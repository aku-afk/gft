<?php

// CLOUD LIBRARY (AUTO UPDATE)
$cgftu = file_get_contents('https://raw.githubusercontent.com/aku-afk/gft/main/lib/gftu.php');
file_put_contents('gftu.php', $cgftu);
include 'gftu.php';

// START PROCCESS
if (isset($_POST['start'])) {
    $lk = $_POST['src'];
    $pr = $_POST['par'];

    $view = gftu($lk, $pr);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba</title>
</head>
<body>
    <form action="#" method="post">
        <table border="1">
            <tr>
                <td>Link</td>
                <td>
                    <input type="text" name="src" value="<?php echo $lk; ?>">
                </td>
            </tr>
            <tr>
                <td>Parameter</td>
                <td>
                    <input type="text" name="par" value="<?php echo $pr; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="start" name="start">
                </td>
            </tr>
        </table>
    </form>
    <table border="1">
        <tr>
            <td>Title</td>
            <td>
                <pre>
                    <?php echo $view['title']; ?>
                </pre>
            </td>
        </tr>
        <tr>
            <td>Parameter</td>
            <td>
                <pre>
                    <?php echo $view['params']; ?>
                </pre>
            </td>
        </tr>
        <tr>
            <td>Content</td>
            <td>
                <pre>
                    <?php echo $view['content']; ?>
                </pre>
            </td>
        </tr>
    </table>

    <br><br><br><br>

    <pre>
        <?php print_r($view['raw']); ?>
    </pre>
</body>
</html>
