<?php
// include bootstrap
include("App/bootstrap.php");

\Package_v1\Router::stick(\Package_v1\Registry::get('config')['pagemap']);
