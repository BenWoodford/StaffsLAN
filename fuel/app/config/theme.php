<?php

return array(
    'active' => 'svgs',
    'fallback' => 'master',
    'paths' => array(			// theme files are outside the DOCROOT here
        APPPATH.'themes',
    ),
    'assets_folder' => 'themes',	// so this implies <localpath>/public/themes/<themename>...
    'view_ext' => '.html',
    'info_file_name' => 'theme.info',
    'require_info_file' => false,
    'info_file_type' => 'php',
    'use_modules' => true,
);
?>