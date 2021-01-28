<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'form_validation', 'session', 'upload', 'email', 'encryption', 'pagination', 'calendar','bcrypt');


$autoload['drivers'] = array();


$autoload['helper'] = array('html','url', 'form','text', 'string', 'admin', 'assets', 'password', 'download', 'file');


$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array();