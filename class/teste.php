<?php

	//require_once('usuario.php');
	require_once('email.php');

	/*$u = new usuario;
	$u->setemail('matheusrizza');
	$u->setnome('matheus');
	$u->setsobre('rizza');
	$u->settelefone('+5534996704444');
	$u->settipo('2');
	$u->setsenha('123456');
	$u->setuser_id('1');*/

	$n = new email;
	$n->setuser_id('1');
	var_dump($n->novo_usuario());

	//var_dump($u->cadastro());
	//var_dump($u->validar());
	//var_dump($u->login());
	//var_dump($u->proteger());
	//var_dump($u->dados());
	//var_dump($u->atulizar());
	//var_dump($u->proteger());
	//var_dump($u->sair());