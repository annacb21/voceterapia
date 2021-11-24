<?php
$query = query("SELECT * FROM news ORDER BY data_news DESC");
confirm($query);
$news = array();
$i = 0;
while($row = fetch_array($query)) {
    $pd = $row['data_news'];
    setlocale(LC_TIME, 'it_IT');
    $pdate = strftime("%d %B %Y", strtotime($pd));
    $news[$i] = new Post($row['id'], $row['titolo'], $row['testo'], $pdate);
    $i++;
}
?>

<main class="post-main">
    <div>
        <?php display_message(); ?>
        <button type="button" class="btn btn-lg action-button" onclick="toggle_news_form();"><i class="fas fa-plus"></i>Pubblica nuova news</button>
        <form action="" method="post" class="needs-validation mt-4" id="add-news-form" novalidate>
            <?php addNews(); ?>
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" placeholder="Titolo news" name="titolo" id="titolo" required>
                <div class="invalid-feedback">Inserire un titolo per la news</div>
            </div>
            <div class="mb-3">
                <label for="testo" class="form-label">Testo</label>
                <textarea class="form-control" name="testo" id="testo" rows="5" required></textarea>
                <div class="invalid-feedback">Inserire un testo per la news</div>
            </div>
            <button type="submit" name="addNews" class="btn btn-primary">Pubblica</button>
        </form>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="mb-0">News pubblicate</h3>
        </div>
        <div class="card-body">
            <table id="post-table-mobile">
                <thead>
                    <tr>
                        <td>Titolo post</td>
                        <td>Data post</td>
                        <td>Azioni</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($news as $n): ?>
                    <tr>
                        <td><?php echo $n->get_title_ant(); ?></td>
                        <td><?php echo $n->get_data(); ?></td>
                        <td class="d-flex justify-content-between"><a class="btn btn-primary" href="../admin/admin.php?edit-news&id=<?php echo $n->get_id(); ?>" role="button">Modifica</a><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteNewsModal<?php echo $n->get_id(); ?>">Elimina</button></td>
                        <div class="modal fade" role="dialog" id="deleteNewsModal<?php echo $n->get_id(); ?>" tabindex="-1" aria-labelledby="deleteNewsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title fw-bold fs-5" id="deleteNewsModalLabel">Elimina news</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Sei sicuro di voler eliminare questa news? L'azione è irreversibile</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                        <a href="../admin/admin.php?delete-news&id=<?php echo $n->get_id(); ?>" role="button" class="btn btn-danger">Conferma eliminazione</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row" id="post-card-mobile">
                <?php foreach($news as $n): ?>
                    <div class="card shadow rounded mb-2">
                        <div class="card-body">
                            <p class="card-title fw-bolder"><?php echo $n->get_titolo(); ?></p>
                            <p class="card-subtitle mb-2 text-muted"><?php echo $n->get_data(); ?></p>
                            <a class="btn btn-primary" href="../admin/admin.php?edit-news&id=<?php echo $n->get_id(); ?>" role="button">Modifica</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteNewsModal<?php echo $n->get_id(); ?>">Elimina</button>
                        </div>
                    </div>
                    <div class="modal fade" role="dialog" id="deleteNewsModal<?php echo $n->get_id(); ?>" tabindex="-1" aria-labelledby="deleteNewsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title fw-bold fs-5" id="deleteNewsModalLabel">Elimina news</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Sei sicuro di voler eliminare questa news? L'azione è irreversibile</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <a href="../admin/admin.php?delete-news&id=<?php echo $n->get_id(); ?>" role="button" class="btn btn-danger">Conferma eliminazione</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>   
            </div>
    </div>
</main>

<script src="https://cdn.tiny.cloud/1/vucbpm5krf4dg1gnij1tc4opj2wlgcqa8f8l0grw3xr4zkga/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../js/validate.js"></script>
<script>
    function toggle_news_form() {
        var form = document.getElementById("add-news-form");
        if(form.style.display == 'block')
            form.style.display = 'none';
        else
            form.style.display = 'block';
    }

    tinymce.init({
        selector: 'textarea',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor paste",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste",
            "autoresize"
        ],
        toolbar: "insertfile undo redo paste | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        entities: "160,nbsp",
        entity_encoding: "named",
        entity_encoding: "raw"
    });
</script>