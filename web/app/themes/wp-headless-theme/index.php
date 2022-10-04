<?php

$newURL = get_option('headlesswp_setting_name');
$currentUrl = $_SERVER['REQUEST_URI'];
$currentFullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

/**
 * @param $url
 * @param int $statusCode
 * Primary way to redirect front-end visitors away from this URL...but there are backups. -JMS
 */
function redirect($url, $statusCode = 301)
{
  header('Location: ' . $url, true, $statusCode);
  die();
}

get_header();
?>

<main role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <header>
          <h1><?php the_title(); ?></h1>
        </header>

        <?php the_content(); ?>
      </article>
    <?php endwhile;
  else : ?>
    <article>
      <p>Nothing to see.</p>
    </article>
  <?php endif; ?>
</main>
<?php
get_footer();
