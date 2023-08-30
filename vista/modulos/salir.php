<?php
setcookie(session_name(), session_id(), 1); 
$_SESSION = ["validarSesiontoken"];
?>
<script>
window.location="ingreso";
</script>