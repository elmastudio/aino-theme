<?php
/**
 * SVG icons related functions and filters
 *
 * @package Aino
 */

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function aino_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'aino' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'aino' );
	}

	// Set defaults.
	$defaults = array(
		'icon'     => '',
		'title'    => '',
		'desc'     => '',
		'fallback' => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
		* Aino doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
		*
		* However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
		*
		* Example 1 with title: <?php echo aino_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
		*
		* Example 2 with title and description: <?php echo aino_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
		*
		* See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
		*/
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby = "title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	// Display the icon.
	$svg .= ' <use href="' . get_parent_theme_file_uri( '/assets/images/icon-sprite.svg#icon-' ) . esc_html( $args['icon'] ) . '" xlink:href="' . get_parent_theme_file_uri( '/assets/images/icon-sprite.svg#icon-' ) . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function aino_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Get supported social icons.
	$social_icons = aino_social_links_icons();

	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' || 'social-footer' === $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span>' . aino_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'aino_nav_menu_social_icons', 10, 4 );

/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function aino_social_links_icons() {

	$social_links_icons = array(
		'about.me'             => 'aboutme',
		'airbnb.com'           => 'airbnb',
		'amazon.ca'            => 'amazon',
		'amazon.cn'            => 'amazon',
		'amazon.co'            => 'amazon',
		'amazon.com'           => 'amazon',
		'amazon.de'            => 'amazon',
		'amazon.es'            => 'amazon',
		'amazon.fr'            => 'amazon',
		'amazon.in'            => 'amazon',
		'amazon.it'            => 'amazon',
		'amazon.nl'            => 'amazon',
		'americanexpress.com'  => 'americanexpress',
		'apple.com'            => 'apple',
		'apple.com/apple-pay/' => 'applepay',
		'basecamp.com'         => 'basecamp',
		'behance.net'          => 'behance',
		'bitbucket.com'        => 'bitbucket',
		'codepen.io'           => 'codepen',
		'dribbble.com'         => 'dribbble',
		'dropbox.com'          => 'dropbox',
		'ello.co'              => 'ello',
		'etsy.com'             => 'etsy',
		'eventbrite.com'       => 'eventbrite',
		'evernote.com'         => 'evernote',
		'facebook.com'         => 'facebook',
		'feedly.com'           => 'feedly',
		'github.com'           => 'github',
		'gitlab.com'           => 'gitlab',
		'goodreads.com'        => 'goodreads',
		'instagram.com'        => 'instagram',
		'kickstarter.com'      => 'kickstarter',
		'last.fm'              => 'lastfm',
		'line.me'              => 'line',
		'linkedin.com'         => 'linkedin',
		'mailchimp.com'        => 'mailchimp',
		'mailto:'              => 'baseline-mail-24px',
		'mastercard.com'       => 'mastercard',
		'medium.com'           => 'medium',
		'meetup.com'           => 'meetup',
		'messenger.com'        => 'messenger',
		'paypal.com'           => 'paypal',
		'pinterest.'           => 'pinterest',
		'pscp.tv'              => 'periscope',
		'quora.com'            => 'quora',
		'reddit.com'           => 'reddit',
		'runkeeper.com'        => 'runkeeper',
		'shopify.com'          => 'shopify',
		'skype:'               => 'skype',
		'skype.com'            => 'skype',
		'slack.com'            => 'slack',
		'snapchat.com'         => 'snapchat',
		'soundcloud.com'       => 'soundcloud',
		'sourceforge.net'      => 'sourceforge',
		'spotify.com'          => 'spotify',
		'stackoverflow.com'    => 'stackoverflow',
		'stripe.com'           => 'stripe',
		'tiktok.com'            => 'tiktok',
		'trello.com'           => 'trello',
		'tripadvisor.com'      => 'tripadvisor',
		'tumblr.com'           => 'tumblr',
		'twitch.tv'            => 'twitch',
		'twitter.com'          => 'twitter',
		'uber.com'             => 'uber',
		'vimeo.com'            => 'vimeo',
		'visa.com'             => 'visa',
		'vsco.co'              => 'vsco',
		'wechat.com'           => 'wechat',
		'weibo.com'            => 'weibo',
		'whatsapp.com'         => 'whatsapp',
		'wordpress.com'        => 'wordpress',
		'wordpress.org'        => 'wordpress',
		'xero.com'             => 'xero',
		'xing.com'             => 'xing',
		'yelp.com'             => 'yelp',
		'youtube.com'          => 'youtube',
		'/feed'                => 'rss',
		'500px.com'            => '500px',
	);

	/**
	 * Filter Aino social links icons.
	 *
	 * @param array $social_links_icons Array of social links icons.
	 */
	return apply_filters( 'aino_social_links_icons', $social_links_icons );
}
