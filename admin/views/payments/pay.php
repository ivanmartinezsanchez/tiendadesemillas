<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar - Tienda de Semillas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Realizar Pago</h2>
        <form action="PaymentController.php?action=pay" method="POST" id="payment-form">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="amount">Monto</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <label for="card-element">Información de la Tarjeta</label>
                <div id="card-element" class="form-control">
                    <!-- Elemento de tarjeta de Stripe -->
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Pagar</button>
            <div id="card-errors" role="alert" class="text-danger mt-3"></div>
        </form>
    </div>

    <script>
        // Configurar Stripe
        var stripe = Stripe('tu_clave_publica');
        var elements = stripe.elements();

        // Crear un elemento de tarjeta
        var card = elements.create('card');
        card.mount('#card-element');

        // Manejar errores en tiempo real del elemento de tarjeta
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Manejar el envío del formulario
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Informar al usuario si hay un error en la tarjeta
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Enviar el token al servidor
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);

                    // Enviar el formulario
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>