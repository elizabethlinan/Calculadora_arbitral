<?php
include('conexion.php');
include('calculos.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gastos Arbitrales</title>
    <style>
        /* Estilo general y reinicio */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        line-height: 1.6;
    }

    .container {
        width: 50%;
        margin: 50px auto;
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    p {
        text-align: center;
        font-size: 0.9rem;
        color: #888;
        margin-bottom: 30px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    label {
        font-size: 0.9rem;
        color: #555;
    }

    input[type="number"], select {
        width: 100%;
        padding: 15px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
        transition: border 0.3s;
    }

    input[type="number"]:focus, select:focus {
        border-color: #007bff;
    }

    input[type="submit"], button {
        background-color: #007bff;
        color: white;
        padding: 15px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover, button:hover {
        background-color: #0056b3;
    }

    .results {
        margin-top: 30px;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
    }

    .results h3 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.2rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
        font-size: 0.9rem;
    }

    th {
        background-color: #f2f2f2;
        color: #555;
    }

    .conversion {
        font-size: 0.9rem;
        color: #555;
        text-align: center;
        margin-top: 10px;
    }

    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    button {
        background-color: #28a745;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        font-size: 1rem;
    }

    button:hover {
        background-color: #218838;
    }
</style>
<script>
    function resetForm() {
        document.getElementById("calculo-form").reset();
        document.querySelector('.results').style.display = 'none';
    }
</script>
</head>
<body>
<div class="container">
    <h2>Calculadora de Gastos Arbitrales</h2>
    <p>Tipo de Cambio Preferencial: 1 USD = S/ 3.74</p>
    <form method="post" action="" id="calculo-form">
        <label for="moneda">Moneda</label>
        <select name="moneda" id="moneda">
            <option value="soles">Soles (S/)</option>
            <option value="dolares">Dólares (USD)</option>
        </select>
        <label for="monto">Monto</label>
    <input type="number" name="monto" id="monto" placeholder="Ingrese el monto" required>

    <input type="submit" value="Calcular">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <div class="results">
        <h3>Resultados de los Gastos Arbitrales</h3>
        <table>
            <tr>
                <th>Descripción</th>
                <th>Valor del Servicio (S/)</th>
                <th>IGV (18%)</th>
                <th>Total (S/)</th>
            </tr>
            <?php
                $monto = $_POST['monto'];
                $moneda = $_POST['moneda'];
                $tipo_cambio = 3.74; // Tipo de cambio preferencial

                if ($moneda == 'dolares') {
                    // Si el monto está en dólares, se convierte a soles
                    $monto_convertido = $monto * $tipo_cambio;
                    $conversion_text = "El monto ingresado fue USD " . number_format($monto, 2) . ", convertido a S/ " . number_format($monto_convertido, 2);
                } else {
                    // Si el monto está en soles, se convierte a dólares
                    $monto_convertido = $monto / $tipo_cambio;
                    $conversion_text = "El monto ingresado fue S/ " . number_format($monto, 2) . ", convertido a USD " . number_format($monto_convertido, 2);
                }

                // Cálculos de gastos
                $gastos_administrativos = calcular_gastos_administrativos($monto);
                $arbitro_unico = calcular_arbitro_unico($monto);
                $honorarios_tribunal = calcular_honorarios_tribunal($monto);

                // Calcular IGV (18%)
                $igv_gastos = $gastos_administrativos * 0.18;
                $igv_arbitro = $arbitro_unico * 0.18;
                $igv_tribunal = $honorarios_tribunal * 0.18;

                // Total por categoría
                $total_gastos = $gastos_administrativos + $igv_gastos;
                $total_arbitro = $arbitro_unico + $igv_arbitro;
                $total_tribunal = $honorarios_tribunal + $igv_tribunal;

                // Mostrar resultados
                echo "<tr><td>Gastos Administrativos</td><td>" . number_format($gastos_administrativos, 2) . "</td><td>" . number_format($igv_gastos, 2) . "</td><td>" . number_format($total_gastos, 2) . "</td></tr>";
                echo "<tr><td>Árbitro Único</td><td>" . number_format($arbitro_unico, 2) . "</td><td>" . number_format($igv_arbitro, 2) . "</td><td>" . number_format($total_arbitro, 2) . "</td></tr>";
                echo "<tr><td>Honorarios del Tribunal</td><td>" . number_format($honorarios_tribunal, 2) . "</td><td>" . number_format($igv_tribunal, 2) . "</td><td>" . number_format($total_tribunal, 2) . "</td></tr>";
            ?>
        </table>

        <div class="conversion">
            <p><?php echo $conversion_text; ?></p>
        </div>
    </div>

    <div class="button-container">
        <button onclick="resetForm()">Nuevo Cálculo</button>
    </div>
<?php endif; ?>
</div>
</body>
</html>


