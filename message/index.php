<?php

require $_SERVER['DOCUMENT_ROOT'] . '/includes/init.php';

require 'GET.php';
require 'POST.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $output = METHOD_GET($_GET['token']);
        break;

    case 'POST':
        response(false, 'request_method', ['get' => $_GET['access_token'], 'post' => $_POST['access_token'], 'request' => $_REQUEST['access_token']]);
        $output = METHOD_POST($_POST['access_token'], $_POST['message'], $_POST['expires']);
        break;

    default:
        response(false, 'incorrect_http_method');
        break;
}

response(true, '', $output);
