<?php
if(isset($_GET['id'])) {
    $query = query("SELECT * FROM news WHERE id = {$_GET['id']}");
    confirm($query);
    $row = fetch_array($query);
    $d = $row['data_news'];
    setlocale(LC_TIME, 'it_IT');
    $pdate = strftime("%d %B %Y", strtotime($d));
    $n = new Post($row['id'], $row['titolo'], $row['testo'], $pdate);
}
?>

<main>
    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/admin.php?news">Gestione news</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifica news '<?php echo $n->get_titolo(); ?>'</li>
        </ol>
    </nav>
    <div>
        <?php display_message(); ?>
        <form action="" method="post" class="needs-validation" novalidate>
            <?php editNews($_GET['id']); ?>
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="titolo" id="titolo" required value="<?php echo $n->get_titolo(); ?>">
                <div class="invalid-feedback">Inserire un titolo per la news</div>
            </div>
            <div class="mb-3">
                <label for="testo" class="form-label">Testo</label>
                <textarea class="form-control" name="testo" id="testo" rows="5" required><?php echo $n->get_testo(); ?></textarea>
                <div class="invalid-feedback">Inserire un testo per la news</div>
            </div>
            <button type="submit" name="editNews" class="btn btn-primary">Salva modifiche</button>
            <a class="btn btn-dark" href="../admin/admin.php?news" role="button">Annulla</a>
        </form>
    </div>
</main>

<script src="https://cdn.tiny.cloud/1/vucbpm5krf4dg1gnij1tc4opj2wlgcqa8f8l0grw3xr4zkga/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../js/textEditor.js"></script>
<script src="../js/validate.js"></script>