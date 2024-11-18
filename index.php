<!-- Corpo do site -->
<?php include('layouts/header.php'); ?>
<div class="container">
    <h1>Qual é o seu signo?</h1>

    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Informe sua data de nascimento</label> <br>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
        </div>
        <div class="text-center">
        <button type="submit" class="btn"">Ver meu signo</button>
    </form>
</div>
</div>
<?php include('layouts/footer.php'); ?>