<?php

return [
    '~^articles/(\d+)$~'      => [\MyProject\Controllers\ArticlesController::class, 'show'],
    '~^article/(\d+)/edit$~'  => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^hello/(.*)$~'          => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^bye/(.*)$~'            => [\MyProject\Controllers\MainController::class, 'sayBye'],
    '~^$~'                    => [\MyProject\Controllers\MainController::class, 'main'],
];