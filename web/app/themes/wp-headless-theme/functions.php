<?php

require get_template_directory() . '/includes/settings.php';
require get_template_directory() . '/includes/reset-password-custom.php';
/**
 * Remove admin bar for all except admins
 */

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}

/* ------------------------------
=============================================

	> Ajout des informations de support Fingerprint-Factory dans l'admin WordPress

=============================================
------------------------------ */

function ff_dashboard_widget_function()
{
  echo '
		<ul>
			<li><a href="http://www.fingerprint-factory.com" target="_blank" title="Consulter le site Internet de l\'agence web"><strong>www.fingerprint-factory.com</strong></a></li>
			<li>Bordeaux/ Biarritz<br /></li>
			<li>Tél. : 06 11 08 15 14</li>
			<li>Adresse e-mail : <a href="mailto:contact@fingerprint-factory.com" title="Un problème, une question ? Contactez-nous par email">contact@fingerprint-factory.com</a></li>
		</ul>';
}

function ff_add_dashboard_widgets()
{
  wp_add_dashboard_widget('wf_dashboard_widget', 'Support technique Fingerprint Factory', 'ff_dashboard_widget_function');
}

add_action('wp_dashboard_setup', 'ff_add_dashboard_widgets');


/**
 * Custom admin logo
 */
function custom_admin_login()
{
  echo '<style>#login h1 a {
		background-image:url("' . get_bloginfo('stylesheet_directory') . '/assets/images/logo-login-dashboard.png") !important;
		background-size:350px 200px !important;
		width:350px !important;
		height:200px !important;
	}</style>';
}

add_action('login_head', 'custom_admin_login');


// /**
//  * wpgrapql jwt config
//  */

// function custom_jwt_expiration($expiration)
// {
//   return 1000;
// }

// add_filter('graphql_jwt_auth_expire', 'custom_jwt_expiration', 10);

// password notification disable for admin

// if (!function_exists('wp_password_change_notification')) {
//   function wp_password_change_notification()
//   {
//   }
// }
