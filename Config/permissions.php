<?php

return [
    'suscriptions.products' => [
        'manage' => 'suscriptions::products.manage resource',
        'index' => 'suscriptions::products.list resource',
        'create' => 'suscriptions::products.create resource',
        'edit' => 'suscriptions::products.edit resource',
        'destroy' => 'suscriptions::products.destroy resource',
    ],
    'suscriptions.plans' => [
      'manage' => 'suscriptions::plans.manage resource',
        'index' => 'suscriptions::plans.list resource',
        'create' => 'suscriptions::plans.create resource',
        'edit' => 'suscriptions::plans.edit resource',
        'destroy' => 'suscriptions::plans.destroy resource',
    ],
    'suscriptions.features' => [
      'manage' => 'suscriptions::features.manage resource',
        'index' => 'suscriptions::features.list resource',
        'create' => 'suscriptions::features.create resource',
        'edit' => 'suscriptions::features.edit resource',
        'destroy' => 'suscriptions::features.destroy resource',
    ],
    'suscriptions.suscriptions' => [
      'index' => 'suscriptions::suscriptions.manage resource',
        'index' => 'suscriptions::suscriptions.list resource',
        'create' => 'suscriptions::suscriptions.create resource',
        'edit' => 'suscriptions::suscriptions.edit resource',
        'destroy' => 'suscriptions::suscriptions.destroy resource',
    ],
    'suscriptions.planfeatures' => [
      'index' => 'suscriptions::planfeatures.manage resource',
        'index' => 'suscriptions::planfeatures.list resource',
        'create' => 'suscriptions::planfeatures.create resource',
        'edit' => 'suscriptions::planfeatures.edit resource',
        'destroy' => 'suscriptions::planfeatures.destroy resource',
    ],
// append





];
