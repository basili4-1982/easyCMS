<?php
/**
 * Created by PhpStorm.
 * User: basili4
 * Date: 31.03.2016
 * Time: 16:38
 */

return [
    "database"=>[
                    'dsn'=>'mysql:host=localhost;dbname=site',
                    'user'=>'root',
                    'passwd'=>'',
                    'options'=>[
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                ],
    "debug"=>[],
];