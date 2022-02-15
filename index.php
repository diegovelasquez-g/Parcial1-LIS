<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Calculadora de Prestamos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="row justify-content-center">
    <div class="text-center mt-2"><h1>Calculadora de tabla de Amortización</h1></div>
    <div class="container text-center mt-4">
        <form action="cal.php" method="post">
            <div>Sistema de amortización:
                <select name="sistema" id="sistema">
                    <option value="simple">Sistema simple: Cuota, amortización e interés fijo</option>
                    <option value="compuesto">Sistema compuesto: Cuota, amortización e interés fijo</option>
                </select>
            </div><br>
            <div>
                Fecha de desembolso (d/m/a):
                <input type="date" name="fecha" id="fecha" required>
            </div><br>
            <div>
                Importe del préstamo:
                <input type="number" name="dinero" id="dinero" required>
            </div><br>
            <div>
                Periodo:
                <select name="periodo" id="periodo">
                    <option value="diario">Diario</option>
                    <option value="semanal">Semanal</option>
                    <option value="quincenal">Quincenal</option>
                    <option value="mensual">Mensual</option>
                    <option value="anual">Anual</option>
                </select>
            </div><br>
            <div>
                Interés:
                <input type="number" name="i" id="i" required>
            </div><br>
            <div>
                Plazo:
                <input type="number" name="n" id="n" required> días
            </div><br>
            <div>
                <button class="btn btn-success" type="submit">Calcular</button>
            </div>
        </form>
    </div>
</body>
</html>