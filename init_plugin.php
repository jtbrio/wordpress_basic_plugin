<?php
function set_toscho_defaults()
{
    global $wpdb;

    $o = array(
        'avatar_default'            => 'blank',
        'avatar_rating'             => 'G',
        'category_base'             => '/thema',
        'comment_max_links'         => 0,
        'comments_per_page'         => 0,
        'date_format'               => 'd.m.Y',
        'default_ping_status'       => 'closed',
        'default_post_edit_rows'    => 30,
        'links_updated_date_format' => 'j. F Y, H:i',
        'permalink_structure'       => '/%year%/%postname%/',
        'rss_language'              => 'de',
        'start_of_week'             => 1,
        'timezone_string'           => 'Etc/GMT-1',
        'use_smilies'               => 0
    );

    foreach ( $o as $k => $v )
    {
        update_option($k, $v);
    }

    wp_delete_post(1, TRUE);
    wp_delete_comment(1);

    $wpdb->query("DELETE FROM $wpdb->links WHERE link_id != ''");

    return;
}
register_activation_hook(__FILE__, 'set_toscho_defaults');