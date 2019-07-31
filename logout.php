<html>
<body>
<?php
session_start(); 
session_unset();
session_destroy();

include "index.php";

?>
</body>
</html>