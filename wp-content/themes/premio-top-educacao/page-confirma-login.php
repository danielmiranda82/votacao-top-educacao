<?php
session_start();
if(!$_SESSION['login']) {
	header('Location: https://premiotopeducacao.com.br/login/');
	exit();
}