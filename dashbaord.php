<?php
// dashboard.php

// Basic server information functions
function getServerInfo() {
    return [
        'PHP Version' => PHP_VERSION,
        'Server Software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
        'Operating System' => PHP_OS,
        'Server Time' => date('Y-m-d H:i:s'),
        'Server IP' => $_SERVER['SERVER_ADDR'] ?? 'Unknown'
    ];
}

// Get system resource usage
function getSystemResources() {
    $memoryUsage = memory_get_usage(true);
    $memoryLimit = ini_get('memory_limit');
    
    return [
        'Memory Usage' => round($memoryUsage / 1024 / 1024, 2) . ' MB',
        'Memory Limit' => $memoryLimit,
        'CPU Load' => sys_getloadavg()[0] ?? 'N/A'
    ];
}

// Get disk usage
function getDiskUsage() {
    $totalSpace = disk_total_space('/');
    $freeSpace = disk_free_space('/');
    $usedSpace = $totalSpace - $freeSpace;
    
    return [
        'Total Space' => round($totalSpace / 1024 / 1024 / 1024, 2) . ' GB',
        'Used Space' => round($usedSpace / 1024 / 1024 / 1024, 2) . ' GB',
        'Free Space' => round($freeSpace / 1024 / 1024 / 1024, 2) . ' GB'
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f2f5;
        }
        .dashboard-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card h2 {
            margin-top: 0;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .info-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Server Information -->
        <div class="card">
            <h2>Server Information</h2>
            <?php foreach(getServerInfo() as $key => $value): ?>
                <div class="info-item">
                    <span><?php echo htmlspecialchars($key); ?>:</span>
                    <span><?php echo htmlspecialchars($value); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- System Resources -->
        <div class="card">
            <h2>System Resources</h2>
            <?php foreach(getSystemResources() as $key => $value): ?>
                <div class="info-item">
                    <span><?php echo htmlspecialchars($key); ?>:</span>
                    <span><?php echo htmlspecialchars($value); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Disk Usage -->
        <div class="card">
            <h2>Disk Usage</h2>
            <?php foreach(getDiskUsage() as $key => $value): ?>
                <div class="info-item">
                    <span><?php echo htmlspecialchars($key); ?>:</span>
                    <span><?php echo htmlspecialchars($value); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
