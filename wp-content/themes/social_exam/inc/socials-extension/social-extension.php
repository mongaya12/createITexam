<?php

/**
* I know I can use autoload for this but since this is just an exam and has limited class only so I intended to add like this.
*/
include get_template_directory() . '/inc/socials-extension/abstract-shortCodeExtension.php';
include get_template_directory() . '/inc/socials-extension/class-socialExtensionShortCodes.php';


new socialExtensionShortCodes();
// new shortCodeExtension();