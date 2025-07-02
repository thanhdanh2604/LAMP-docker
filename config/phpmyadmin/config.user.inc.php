<?php
/* phpMyAdmin configuration for large database imports */

// Increase timeout for large imports
$cfg['ExecTimeLimit'] = 600;

// Session configuration
$cfg['LoginCookieValidity'] = 3600;
$cfg['LoginCookieRecall'] = true;

// Memory limit
ini_set('memory_limit', '512M');

// File upload settings
ini_set('upload_max_filesize', '1G');
ini_set('post_max_size', '1G');
ini_set('max_execution_time', '600');
ini_set('max_input_time', '600');

// Session settings
ini_set('session.save_path', '/tmp');
ini_set('session.auto_start', '0');

// Error reporting for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Compression settings
$cfg['GZipDump'] = true;
$cfg['BZipDump'] = true;

// Import settings
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

// Server configuration
$cfg['Servers'][1]['host'] = 'db';
$cfg['Servers'][1]['compress'] = false;
$cfg['Servers'][1]['AllowNoPassword'] = false;
