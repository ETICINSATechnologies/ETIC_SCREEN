<?php
/**
 * Changelog
 */

$bloog_lite = wp_get_theme( 'wp-corporate' );
?>
<div class="featured-section changelog">
<?php
	WP_Filesystem();
	global $wp_filesystem;
	$wp_corporate_changelog       = $wp_filesystem->get_contents( get_template_directory() . '/readme.txt' );
	$changelog_start = strpos($wp_corporate_changelog,'== Changelog ==');
	$wp_corporate_changelog_before = substr($wp_corporate_changelog,0,($changelog_start+15));
	$wp_corporate_changelog = str_replace($wp_corporate_changelog_before,'',$wp_corporate_changelog);
	$wp_corporate_changelog = str_replace('**','<br/>**',$wp_corporate_changelog);
	$wp_corporate_changelog = str_replace('= 1.0','<br/><br/>= 1.0',$wp_corporate_changelog);
	echo $wp_corporate_changelog;
	echo '<hr />';
	?>
</div>