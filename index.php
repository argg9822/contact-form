<?php
    require 'config/process-form.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="icon" href="./media/your_brand.png">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body class="flex-center">
    <div class="main-container">
        <div class="form-title text-center">
            <img src="media/your_brand.png" alt="Logo" width="90">
            <h1>¡Contáctanos!</h1>
        </div>
        <form class="text-white" method="POST">
            <div class="flex-column">
                <input type="text" name="name" id="name" placeholder="Nombre" required>
                <input type="email" name="email" id="email" placeholder="Correo" required>
                <input type="text" name="subject" id="subject" placeholder="Asunto" required>
                <textarea name="message" id="message" placeholder="Mensaje"></textarea>
            </div>

            <div class="flex-center mt-5">
                <button type="submit" name="contact_form" class="w-100">Enviar</button>
            </div>
        </form>

        <div class="flex-center">
            <?php if ($status == 'success'): ?>
                <div class="success-message alert">
                    <h2>!Gracias por contactarnos!</h2>
                    <p>Tu mensaje ha sido enviado correctamente</p>
                </div>
            <?php endif; ?>

            <?php if ($status == 'danger'): ?>
                <div class="error-message    alert">
                    <h2>Error al enviar el mensaje</h2>
                    <p>Por favor, verifica que todos los campos estén correctos</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <canvas id="canvas-bg"></canvas>
    <script type="module" src="js/index.js"></script>
</body>
</html>