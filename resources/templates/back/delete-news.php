<?php
    if(isset($_GET['id'])) {
        $query = query("DELETE FROM news WHERE id = '{$_GET['id']}' ");
        confirm($query);

        set_message("News eliminata con successo", "alert-success");
        redirect("../admin/admin.php?news");
    }
?>
