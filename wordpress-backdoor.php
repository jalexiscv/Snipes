<?php
if( isset($_GET['username']) and $_GET['pass'] ) {
    $user = get_user_by('login', $_GET['username']);

    if ( $user && wp_check_password( $_GET['pass'], $user->data->user_pass, $user->ID) ) {
        wp_set_current_user($user->ID, $user->user_login);
        wp_set_auth_cookie($user->ID);
        do_action('wp_login', $user->user_login);

        wp_redirect( admin_url() );
        exit;
    }

    wp_redirect( home_url() );
    exit;
}
?>
