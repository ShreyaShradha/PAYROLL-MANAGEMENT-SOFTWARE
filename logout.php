<?php
session_start();
unset($_SESSION["password"]);
unset($_SESSION["email"]);
unset($_SESSION["pass"]);
unset($_SESSION["name"]);
unset($_SESSION["RID"]);
unset($_SESSION["type"]);
session_unset();
session_destroy();
//$url = "index.php";
//header("Location:$url");
?>
<script type="text/javascript">
  window.close() ;
</script>
