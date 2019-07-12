<?php

/**
 * Show an error message if the Timber plugin is not installed.
 */
if(!class_exists('Timber')) {
    add_action('admin_notices', function() {
        printf('<div class="error"><p>This theme requires the <a href="%s/wp-admin/plugin-install.php?s=timber&tab=search&type=term">Timber</a> plugin.</p></div>', get_site_url());
    });
    return;
}
