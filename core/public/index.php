<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

try {
    $envFilePath = base_path('.env');

    $envContent = file_get_contents($envFilePath);

    if (preg_match('/^APP_KEY=(.*)$/m', $envContent, $matches)) {
        $appKey = $matches[1];

        if ($appKey == null) {
            require_once __DIR__ . '/../../setup/setupview.php';
            exit;
        }
    } else {
        echo "APP_KEY not found in .env file";
    }


    $response = $kernel->handle(
        $request = Request::capture()
    );

    $response->send();

    $kernel->terminate($request, $response);
} catch (\Exception $e) {
    require_once __DIR__ . '/../../setup/setupview.php';
    exit;
}
