<?php
$query = query("SELECT * FROM utenti");
confirm($query);
?>

<main class="users-main">
    <div>
        <?php display_message(); ?>
        <button type="button" class="btn btn-lg action-button" onclick="toggle_user_form();"><i class="fas fa-plus"></i>Aggiungi nuovo utente</button>
        <form action="" method="post" class="needs-validation mt-4" id="add-user-form" novalidate>
            <?php addUser(); ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                <div class="invalid-feedback">Inserire uno username</div>
            </div>
            <label for="psw1" class="form-label">Password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="psw1" id="psw1" required>
                <span class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true" id="togglePsw1" style="cursor: pointer"></i></span>
                <div class="invalid-feedback">Inserire una password</div>
            </div>
            <label for="psw2" class="form-label">Conferma password</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Conferma password" name="psw2" id="psw2" required>
                <span class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true" id="togglePsw2" style="cursor: pointer"></i></span>
                <div class="invalid-feedback">Le password non corrispondono</div>
            </div>
            <button type="submit" name="addUser" class="btn btn-primary">Aggiungi</button>
        </form>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="mb-0">Utenti amministratori</h3>
        </div>
        <div class="card-body">
            <table id="user-table-mobile">
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>Azioni</td>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = fetch_array($query)) : ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td class="d-flex justify-content-start"><a class="btn btn-primary" href="../admin/admin.php?edit-user&id=<?php echo $row['id']; ?>" role="button">Modifica password</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="row" id="user-card-mobile">
                <?php while($row = fetch_array($query)) : ?>
                    <div class="card shadow rounded mb-2">
                        <div class="card-body">
                            <p class="card-title"><?php echo $row['username']; ?></p>
                            <a class="btn btn-primary" href="../admin/admin.php?edit-user&id=<?php echo $row['id']; ?>" role="button">Modifica password</a>
                        </div>
                    </div>
                <?php endwhile; ?>   
            </div>
    </div>
</main>

<script src="../js/validate.js"></script>
<script>
    function toggle_user_form() {
        var form = document.getElementById("add-user-form");
        if(form.style.display == 'block')
            form.style.display = 'none';
        else
            form.style.display = 'block';
    }

    var togglePassword1 = document.querySelector("#togglePsw1");
    var togglePassword2 = document.querySelector("#togglePsw2");
    var psw1 = document.querySelector("#psw1");
    var psw2 = document.querySelector("#psw2");

    togglePassword1.addEventListener("click", function () {
        var type = psw1.getAttribute("type") === "password" ? "text" : "password";
        psw1.setAttribute("type", type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    togglePassword2.addEventListener("click", function () {
        var type = psw2.getAttribute("type") === "password" ? "text" : "password";
        psw2.setAttribute("type", type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>