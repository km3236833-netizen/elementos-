<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Elementos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #f0f8ff;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, button {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .resultado {
            margin: 20px 0;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Elementos Celestiales</h2>
        
        <form method="POST">
            <label>Año:</label>
            <input type="number" name="year" required 
                   value="<?php echo $_POST['year'] ?? ''; ?>">
            <button type="submit">Calcular</button>
        </form>

        <?php
        if ($_POST) {
            $year = $_POST['year'];
            
            // Cálculo simple
            $residuo = ($year - 4) % 10;
            
            // Determinar elemento
            if ($residuo == 0 || $residuo == 1) {
                $elemento = "Madera";
                $color = "#d4efdf";
            } elseif ($residuo == 2 || $residuo == 3) {
                $elemento = "Fuego";
                $color = "#fdebd0";
            } elseif ($residuo == 4 || $residuo == 5) {
                $elemento = "Tierra";
                $color = "#e8daef";
            } elseif ($residuo == 6 || $residuo == 7) {
                $elemento = "Metal";
                $color = "#d6dbdf";
            } else {
                $elemento = "Agua";
                $color = "#d6eaf8";
            }
            
            echo "<div class='resultado' style='background: $color'>";
            echo "Año $year: Elemento <strong>$elemento</strong>";
            echo "</div>";
            
            // Mostrar cálculo
            echo "<p><small>Cálculo: ($year - 4) = " . ($year-4) . " → ";
            echo ($year-4) . " % 10 = $residuo → $elemento</small></p>";
        }
        ?>

        <hr>
        <h3>Tabla de Elementos</h3>
        <table border="1" style="width:100%; border-collapse:collapse;">
            <tr><th>Residuo</th><th>Elemento</th></tr>
            <tr><td>0-1</td><td>Madera</td></tr>
            <tr><td>2-3</td><td>Fuego</td></tr>
            <tr><td>4-5</td><td>Tierra</td></tr>
            <tr><td>6-7</td><td>Metal</td></tr>
            <tr><td>8-9</td><td>Agua</td></tr>
        </table>
        
        <p><small>Fórmula: (Año - 4) % 10</small></p>
    </div>
</body>
</html>