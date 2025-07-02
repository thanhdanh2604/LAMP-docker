<?php
// Demo page for php08.test domain
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP08 Application - Custom Domain Demo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 600px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .domain-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        .success {
            color: #28a745;
            font-weight: bold;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin: 20px 0;
        }
        .info-item {
            background: #e9ecef;
            padding: 15px;
            border-radius: 6px;
        }
        .info-item strong {
            display: block;
            color: #495057;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 PHP08 Application</h1>
        <div class="domain-info">
            <p class="success">✅ Custom Domain Working Successfully!</p>
            <p>You are accessing: <strong>php08.test</strong></p>
        </div>
        
        <div class="info-grid">
            <div class="info-item">
                <strong>PHP Version</strong>
                <?php echo PHP_VERSION; ?>
            </div>
            <div class="info-item">
                <strong>Server</strong>
                <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?>
            </div>
            <div class="info-item">
                <strong>Document Root</strong>
                <?php echo $_SERVER['DOCUMENT_ROOT']; ?>
            </div>
            <div class="info-item">
                <strong>Server Name</strong>
                <?php echo $_SERVER['SERVER_NAME']; ?>
            </div>
        </div>
        
        <div class="domain-info">
            <h3>🌍 Available Domains</h3>
            <p><a href="http://nhatansteel-src.test" target="_blank">http://nhatansteel-src.test</a> - Backend App</p>
            <p><a href="http://nhatansteel-fe.test" target="_blank">http://nhatansteel-fe.test</a> - Frontend App</p>
            <p><a href="http://php08.test" target="_blank">http://php08.test</a> - PHP08 App (Current)</p>
            <p><a href="http://localhost:8081" target="_blank">http://localhost:8081</a> - phpMyAdmin</p>
        </div>
        
        <div class="domain-info">
            <h3>📝 Development Info</h3>
            <p><strong>Current Time:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
            <p><strong>Request URI:</strong> <?php echo $_SERVER['REQUEST_URI']; ?></p>
            <p><strong>HTTP Host:</strong> <?php echo $_SERVER['HTTP_HOST']; ?></p>
        </div>
    </div>
</body>
</html>