<?php

/* --------------------------------------------------------------------------------
 * Error Reporting
 * -------------------------------------------------------------------------------- */
error_reporting(E_ALL);

/* --------------------------------------------------------------------------------
 * Start Sessions
 * -------------------------------------------------------------------------------- */
session_start();

/* --------------------------------------------------------------------------------
 * Load Variable Configurations
 * -------------------------------------------------------------------------------- */
$config=array();
require_once('config/config.php');

/* --------------------------------------------------------------------------------
 * Load Database Configurations
 * -------------------------------------------------------------------------------- */
$database=array();
require_once('config/database.php');

/* --------------------------------------------------------------------------------
 * Load Brains
 * -------------------------------------------------------------------------------- */
require_once('system/Brains.php');

/* --------------------------------------------------------------------------------
 * Load Database
 * -------------------------------------------------------------------------------- */
require_once('system/ZomDB.php');
$db=new ZomDB();
$db->connect($database);
 
/* --------------------------------------------------------------------------------
 * Start System
 * -------------------------------------------------------------------------------- */
require_once('system/ZomPHP.php');
$sys=new ZomPHP();
$sys->run($config);
