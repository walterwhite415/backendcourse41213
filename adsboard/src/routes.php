<?php

return [
    '~^ads/add$~'          => [\MyProject\Controllers\AdsController::class, 'add'],
    '~^ads/(\d+)/edit$~'   => [\MyProject\Controllers\AdsController::class, 'edit'],
    '~^ads/(\d+)/delete$~' => [\MyProject\Controllers\AdsController::class, 'delete'],
    '~^ads/(\d+)$~'        => [\MyProject\Controllers\AdsController::class, 'view'],
    '~^$~'                 => [\MyProject\Controllers\MainController::class, 'main'],
];