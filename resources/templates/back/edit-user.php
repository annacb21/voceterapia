<?php
if(isset($_GET['id'])) {
    $query = query("SELECT * FROM utenti WHERE id = {$_GET['id']}");
    confirm($query);
    $row = fetch_array($query);
}
?>

<main>
    <!-- BREADCRUMB -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../admin/admin.php?users">Gestione utenti</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifica password utente</li>
        </ol>
    </nav>
    <div>
        <?php display_message(); ?>
        <form action="" method="post" class="needs-validation" novalidate>
            <?php editUser($row); ?>
            <label for="current_psw" class="form-label">Password attuale</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password attuale" name="current_psw" id="current_psw" required>
                <span class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true" id="toggleCurrentPsw" style="cursor: pointer"></i></span>
                <div class="invalid-feedback">Inserire la password attuale</div>
            </div>
            <label for="psw1" class="form-label">Nuova password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Nuova password" name="psw1" id="psw1" required>
                <span class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true" id="togglePsw1" style="cursor: pointer"></i></span>
                <div class="invalid-feedback">Inserire una nuova password</div>
            </div>
            <button type="submit" name="editUser" class="btn btn-primary">Salva modifiche</button>
            <a class="btn btn-dark" href="../admin/admin.php?users" role="button">Annulla</a>
        </form>
    </div>
</main>

<script src="../js/validate.js"></script>
<script>
    var toggleCurrentPsw = document.querySelector("#toggleCurrentPsw");
    var togglePassword1 = document.querySelector("#togglePsw1");
    var currentPsw = document.querySelector("#current_psw");
    var psw1 = document.querySelector("#psw1");

    toggleCurrentPsw.addEventListener("click", function () {
        var type = currentPsw.getAttribute("type") === "password" ? "text" : "password";
        currentPsw.setAttribute("type", type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    togglePassword1.addEventListener("click", function () {
        var type = psw1.getAttribute("type") === "password" ? "text" : "password";
        psw1.setAttribute("type", type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>