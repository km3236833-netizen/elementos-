<?php
$elemento = $color = '';
if ($_POST) {
    $year = $_POST['year'];
    $residuo = ($year - 4) % 10;
    
    if ($residuo <= 1) {
        $elemento = "Madera";
        $color = "#be7403d2";
    } elseif ($residuo <= 3) {
        $elemento = "Fuego"; 
        $color = "#d83e10ff";
    } elseif ($residuo <= 5) {
        $elemento = "Tierra";
        $color = "#201206ff";
    } elseif ($residuo <= 7) {
        $elemento = "Metal";
        $color = "#595b5cff";
    } else {
        $elemento = "Agua";
        $color = "#1d88d4ff";
    }
}
?>

<html>
<body>
    <h2>Calculadora de Elementos Celestiales</h2>
    
    <form method="POST">
        <label>Año:</label>
        <input type="number" name="year" required 
               value="<?php echo $_POST['year'] ?? ''; ?>">
        <button type="submit">Calcular</button>
    </form>

    <?php if ($_POST): ?>
        <div style="background: <?php echo $color; ?>; padding: 15px; margin: 10px 0;">
            <h3>Año <?php echo $year; ?> → Elemento: <?php echo $elemento; ?></h3>
            <p>Residuo: <?php echo $residuo; ?></p>
        </div>
    <?php endif; ?>
</body>
</html>