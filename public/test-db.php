<!DOCTYPE html>
<html>

<head>
    <title>Test DB Connection</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background: #f5f5f5;
        }

        .success {
            color: green;
            background: #d4edda;
            padding: 10px;
            border-radius: 5px;
        }

        .error {
            color: red;
            background: #f8d7da;
            padding: 10px;
            border-radius: 5px;
        }

        pre {
            background: white;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>🔍 Test de Conexión a MySQL</h1>

    <?php
    $host = '127.0.0.1';
    $port = '3306';
    $database = 'pyme360_pos';
    $username = 'root';
    $password = '';

    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '<div class="success">';
        echo '<h2>✅ Conexión Exitosa!</h2>';
        echo "<p><strong>Base de datos:</strong> $database</p>";
        echo "<p><strong>Host:</strong> $host:$port</p>";
        echo '</div>';

        // Verificar tablas
        echo '<h2>📋 Tablas en la Base de Datos:</h2>';
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

        echo '<pre>';
        foreach ($tables as $table) {
            echo "✅ $table\n";
        }
        echo '</pre>';

        // Contar productos
        echo '<h2>🛒 Productos en BD:</h2>';
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM products");
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '<div class="success">';
        echo '<p>Total de productos: ' . $count['total'] . '</p>';
        echo '</div>';

        if ($count['total'] > 0) {
            echo '<h3>Primeros 5 productos:</h3>';
            $stmt = $pdo->query("SELECT name, sku, price_sale FROM products LIMIT 5");
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo '<pre>';
            foreach ($products as $product) {
                echo "- {$product['name']} (SKU: {$product['sku']}) - \${$product['price_sale']}\n";
            }
            echo '</pre>';
        }
    } catch (PDOException $e) {
        echo '<div class="error">';
        echo '<h2>❌ Error de Conexión</h2>';
        echo '<p><strong>Mensaje:</strong> ' . $e->getMessage() . '</p>';
        echo '<p><strong>Código:</strong> ' . $e->getCode() . '</p>';
        echo '</div>';

        echo '<h3>💡 Verifica:</h3>';
        echo '<ul>';
        echo '<li>MySQL esté corriendo en XAMPP</li>';
        echo '<li>La base de datos "pyme360_pos" exista en phpMyAdmin</li>';
        echo '<li>El usuario "root" tenga acceso</li>';
        echo '</ul>';
    }
    ?>

    <hr>
    <p><a href="http://127.0.0.1:8000">← Volver a la aplicación</a></p>
</body>

</html>