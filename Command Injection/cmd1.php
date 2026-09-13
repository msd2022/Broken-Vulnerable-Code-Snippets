<?php     include("../common/header.php");   ?>

<!-- from https://pentesterlab.com/exercises/php_include_and_post_exploitation/course -->
<?php
hint("will exec the arg specified in the GET parameter \"cmd\"");
?>

<form action="/CMD-1/index.php" method="GET">
    <input type="text" name="cmd">
</form>

<?php
    $cmd = isset($_GET["cmd"]) ? $_GET["cmd"] : "";
    $allowlist = ["ls", "whoami", "date", "uptime", "pwd"];
    if (in_array($cmd, $allowlist, true)) {
        system(escapeshellcmd($cmd));
    } else {
        echo htmlspecialchars("Command not allowed. Permitted commands: " . implode(", ", $allowlist));
    }
 ?>