<?php
    require 'config/contact-form.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body class="flex-center h-100">
    <div class="flex-between w-50">
        <div class="w-100">
            <form class="text-white" method="POST">
                <div class="form-title text-center">
                    <h1>¡Contáctanos!</h1>
                </div>
                
                <div class="container-inputs">
                    <div class="flex-column">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="flex-column">
                        <label for="email">Correo</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="flex-column">
                        <label for="subject">Asunto</label>
                        <input type="text" name="subject" id="subject" required>
                    </div>
                    <div class="flex-column">
                        <label for="message">Mensaje</label>
                        <textarea name="message" id="message"></textarea>
                    </div>
                </div>

                <div class="flex-center mt-5">
                    <button type="submit" name="contact_form" class="w-100">Enviar</button>
                </div>
            </form>
        </div>

        <div class="w-100 flex-center">
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

            <img src="media/your_brand.png" alt="Logo" width="390">
        </div>
    </div>

    <script src="js/index.js"></script>

</body>
</html>