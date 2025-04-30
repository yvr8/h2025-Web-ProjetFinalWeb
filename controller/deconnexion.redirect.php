<?php

require_once __DIR__."/../SessionFinale.controller.php";

$session = new Session();
session_start();

$session->supprimer();

header("Location: ../index.php");