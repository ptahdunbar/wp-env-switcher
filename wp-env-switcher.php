<?php
/*
Plugin Name:  WP Env Switcher
Description:  A WordPress plugin that allows you to switch between different environments from the admin bar.
Version:      1.0.0
Author:       Ptah Dunbar
Author URI:   http://piratedunbar.com
License:      MIT License
GitHub Plugin URI: https://github.com/piratedunbar/wp-env-switcher
*/

namespace PirateLife\WPEnvSwitcher;

/**
 * Add stage/environment switcher to admin bar
 * Inspired by http://37signals.com/svn/posts/3535-beyond-the-default-rails-environments
 *
 * WP_ENVIRONMENTS constant must be a serialized array of 'environment' => 'url' elements:
 *
 *   $envs = array(
 *    'development' => 'http://example.dev',
 *    'staging'     => 'http://staging.example.com',
 *    'production'  => 'http://example.com'
 *   );
 *   define('ENVIRONMENTS', serialize($envs));
 *
 * WP_ENV must be defined as the current environment
 */
function admin_bar_stage_switcher($admin_bar)
{
    if (defined('WP_ENVIRONMENTS') && defined('WP_ENV')) {
        $environments = unserialize(WP_ENVIRONMENTS);
        $current_stage = WP_ENV;
    } else {
        return;
    }

    $admin_bar->add_menu(array(
        'id' => 'env-switcher',
        'parent' => 'top-secondary',
        'title' => $current_stage,
        'href' => '#'
    ));

    foreach ($environments as $environment => $url) {
        if ($environment === $current_stage) {
            continue;
        }

        $admin_bar->add_menu(array(
            'id' => "stage_$environment",
            'parent' => 'env-switcher',
            'title' => $environment,
            'href' => $url
        ));
    }
}

add_action('admin_bar_menu', 'PirateLife\\WPEnvSwitcher\\admin_bar_stage_switcher');

function admin_css()
{ ?>
    <style>
        #wp-admin-bar-env-switcher > a:before {
            content: "\f177";
            top: 2px;
        }
    </style>
<?php }

add_action('wp_before_admin_bar_render', 'PirateLife\\WPEnvSwitcher\\admin_css');
