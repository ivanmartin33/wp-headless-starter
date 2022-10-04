<?php

add_filter(
  'retrieve_password_message',
  function ($message, $key, $user_login, $user_data) {
    $site_name = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
    $message   = __('Quelqu\'un a demandé la réinitialisation de votre mot de passe :') . "\r\n\r\n";
    /* translators: %s: Site name. */
    $message .= sprintf(__('Site: %s'), $site_name) . "\r\n\r\n";
    /* translators: %s: User login. */
    $message .= sprintf(__('Nom d\'utilisateur: %s'), $user_login) . "\r\n\r\n";
    $message .= __('Si c\'est une erreur, vous pouvez ignorer ce message. ') . "\r\n\r\n";
    $message .= __('Pour réinitialiser votre mot de passe, rendez vous à cette adresse:') . "\r\n\r\n";
    $message .= get_option('headlesswp_setting_name') . '/mon-compte/reset/?user=' . rawurlencode($user_login) . "&reset_key=" . $key . "\r\n\r\n";
    $requester_ip = $_SERVER['REMOTE_ADDR'];
    if ($requester_ip) {
      $message .= sprintf(
        /* translators: %s: IP address of password reset requester. */
        __('Cette demande de réinitialisation du mote de passe vient de l\'adresse IP: %s.'),
        $requester_ip
      ) . "\r\n";
    }
    return $message;
  },
  10,
  4
);
