<?

defined( 'ABSPATH' ) or die( 'Hey! What are you doing here? You silly human!' );

if ( ! function_exists( 'theme_activation_function' ) ) {
	function theme_activation_function() {
		/**
		 * Settenigs->Reading
		 * Homepage display as a static page
		 * Homepage is 'Sample Page'
		 */
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', '2' );

		// Change the title from 'Sample Page' to 'Home Page' or 'Главная'
		$home_page = array();
		$home_page[ 'ID' ] = 2;

		$locale = get_locale();
		( $locale == 'ru_RU' ) ? $home_page[ 'post_title' ] = 'Главная' : $home_page[ 'post_title' ] = 'Home Page';
		$home_page[ 'post_content' ] = '';

		wp_update_post( wp_slash( $home_page ) );


		// Clear Tagline (Just another WordPress site)
		update_option( 'blogdescription', '' );


		// Update Discussion Settings
		update_option( 'default_pingback_flag', '' );
		update_option( 'default_ping_status', '' );
		update_option( 'default_comment_status', '' );

		update_option( 'comment_registration', '1' );
		update_option( 'close_comments_for_old_posts', '1' );
		update_option( 'page_comments', '1' );
		update_option( 'comment_moderation', '1' );


		// Update Media Settings
		update_option( 'thumbnail_size_w', '' );
		update_option( 'thumbnail_size_h', '' );
		update_option( 'thumbnail_crop', '' );
		update_option( 'medium_size_w', '' );
		update_option( 'medium_size_h', '' );
		update_option( 'large_size_w', '' );
		update_option( 'large_size_h', '' );


		// Update Permalink Settings
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );


		// Add theme support
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
	}

	add_action( 'after_setup_theme', 'theme_activation_function' );
}



$deeplevel_core_settings = get_option( 'deeplevel_core_settings' );

if ( ! function_exists( 'enqueue' ) ) {
	function enqueue()
	{
		global $deeplevel_core_settings;

		wp_enqueue_script( 'jquery' );

		if( $deeplevel_core_settings[ 'outdatedbrowser' ] ) {
			wp_enqueue_style( 'outdatedbrowser', get_template_directory_uri() . '/assets/css/modules/outdatedbrowser.min.css', array(), null, 'all' );
			wp_enqueue_script( 'outdatedbrowser', get_template_directory_uri() . '/assets/js/modules/outdatedbrowser/outdatedbrowser.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'outdatedbrowser-call', get_template_directory_uri() . '/assets/js/modules/outdatedbrowser/outdatedbrowser_call.min.js', array( 'jquery' ), null, true );
		}

		if( $deeplevel_core_settings[ 'lozad' ] ) {
			wp_enqueue_script( 'lozad', get_template_directory_uri() . '/assets/js/modules/lozad/lozad.min.js', array(), null, true );
			wp_enqueue_script( 'lozad-call', get_template_directory_uri() . '/assets/js/modules/lozad/lozad_call.min.js', array( 'jquery' ), null, true );
		}

		if( $deeplevel_core_settings[ 'swiper_slider' ] ) {
			wp_enqueue_style( 'swiper-slider', get_template_directory_uri() . '/assets/css/modules/swiper.min.css', array(), null, 'all' );
			wp_enqueue_script( 'swiper-slider', get_template_directory_uri() . '/assets/js/modules/swiper/swiper.min.js', array( 'jquery' ), null, true );
		}

		if( $deeplevel_core_settings[ 'typographer' ] ) {
			wp_enqueue_script( 'typographer', get_template_directory_uri() . '/assets/js/modules/typographer/typographer.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'typographer-call', get_template_directory_uri() . '/assets/js/modules/typographer/typographer_call.min.js', array( 'jquery' ), null, true );
		}

		if( $deeplevel_core_settings[ 'mixitup' ] ) wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/assets/js/modules/mixitup/mixitup.min.js', array( 'jquery' ), null, true );
		if( $deeplevel_core_settings[ 'mixitup_multifilter' ] ) wp_enqueue_script( 'mixitup-multifilter', get_template_directory_uri() . '/assets/js/modules/mixitup/mixitup-multifilter.min.js', array( 'jquery' ), null, true );
		if( $deeplevel_core_settings[ 'mixitup_pagination' ] ) wp_enqueue_script( 'mixitup-pagination', get_template_directory_uri() . '/assets/js/modules/mixitup/mixitup-pagination.min.js', array( 'jquery' ), null, true );

		if( $deeplevel_core_settings[ 'maskedinput' ] ) wp_enqueue_script( 'maskedinput', get_template_directory_uri() . '/assets/js/modules/maskedinput/jquery.maskedinput.min.js', array( 'jquery' ), null, true );

		wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'util_js', get_template_directory_uri() . '/assets/js/twbs/util.js', array( 'jquery' ), null, true );

		if( $deeplevel_core_settings[ 'twbs_alert' ] ) wp_enqueue_script( 'twbs-alert', get_template_directory_uri() . '/assets/js/twbs/alert.js', array( 'jquery' ), null, true );
		if( $deeplevel_core_settings[ 'twbs_tab' ] ) wp_enqueue_script( 'twbs-tab', get_template_directory_uri() . '/assets/js/twbs/tab.js', array( 'jquery' ), null, true );
		if( $deeplevel_core_settings[ 'twbs_collapse' ] ) wp_enqueue_script( 'twbs-collapse', get_template_directory_uri() . '/assets/js/twbs/collapse.js', array( 'jquery' ), null, true );
		if( $deeplevel_core_settings[ 'twbs_dropdown' ] ) wp_enqueue_script( 'twbs-dropdown', get_template_directory_uri() . '/assets/js/twbs/dropdown.js', array( 'jquery' ), null, true );
		if( $deeplevel_core_settings[ 'twbs_modal' ] ) wp_enqueue_script( 'twbs-modal', get_template_directory_uri() . '/assets/js/twbs/modal.js', array( 'jquery' ), null, true );
		if( $deeplevel_core_settings[ 'twbs_toast' ] ) wp_enqueue_script( 'twbs-toast', get_template_directory_uri() . '/assets/js/twbs/toast.js', array( 'jquery' ), null, true );

		wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css', array(), null, 'all' );
		wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.min.js', array( 'jquery' ), null, true );
	}

	add_action( 'wp_enqueue_scripts', 'enqueue' );
}



/**
 * Add outdatedbrowser code after body open tag
 */
if( $deeplevel_core_settings[ 'outdatedbrowser' ] ) {
	if ( ! function_exists( 'outdatedbrowser_after_body_open_tag' ) ) {
		function outdatedbrowser_after_body_open_tag()
		{
			$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

			echo '<div id="outdated" class="outdated">';
			echo '<div class="outdated__absolute">';
			echo '<h6>' , ( $lang == 'ru' ) ? 'Ваш браузер устарел!' : 'Your browser is out of date!' , '</h6>';
			echo '<p>' , ( $lang == 'ru' ) ? 'Обновите ваш браузер для правильного отображения этого сайта.' : 'Update your browser to view this website correctly.' , '</p>';
			echo '<a href="https://bestvpn.org/outdatedbrowser/' . $lang . '">' , ( $lang == 'ru' ) ? 'Обновить браузер' : 'Update browser' , '</a>';
			echo '</div>';
			echo '</div>';
		}

		add_action('wp_body_open', 'outdatedbrowser_after_body_open_tag');
	}
}





// Check if the current user is an administrator
if ( ! function_exists( 'isSiteAdmin' ) ) {
	function isSiteAdmin() {
		return in_array( 'administrator',  wp_get_current_user()->roles );
	}
}

// Register menu
register_nav_menus( array(
	'top' => 'Top',
));


/**
 * Register Custom Navigation Walker
 */
if( $deeplevel_core_settings[ 'navwalker' ] ) {
	if ( ! function_exists( 'register_navwalker' ) ) {
		function register_navwalker() {
			require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
		}

		add_action('after_setup_theme', 'register_navwalker');
	}
}


/**
 * Disable the generation of additional images
 */
add_filter( 'intermediate_image_sizes', 'dco_remove_default_image_sizes' );
add_action( 'init', 'remove_all_image_sizes' );

if ( ! function_exists( 'dco_remove_default_image_sizes' ) ) {
	function dco_remove_default_image_sizes( $sizes ) {
		return array_diff( $sizes, array(
			'thumbnail',
			'medium',
			'medium_large',
			'large',
		) );
	}
}

if ( ! function_exists( 'remove_all_image_sizes' ) ) {
	function remove_all_image_sizes() {
		foreach( get_intermediate_image_sizes() as $size ) {
			remove_image_size( $size );
		}
	}
}


// Add logo to wp-admin page
if ( ! function_exists( 'wp_admin_logo' ) ) {
	function wp_admin_logo() {
	?>
		<style type="text/css">
			#login h1 a, .login h1 a{
				background-image: url(<?= get_stylesheet_directory_uri(); ?>/assets/img/logo.svg);
				margin-bottom: 0;
				background-size: 200px;
				height: 70px;
				width: 100%;
			}
		</style>
	<?}

	add_action( 'login_enqueue_scripts', 'wp_admin_logo' );
}



// TGM Class
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

if ( ! function_exists( 'deeplevel_register_required_plugins' ) ) {

	function deeplevel_register_required_plugins() {
		$plugins = array(
			array(
				'name'      => 'Webcraftic Clearfy',
				'slug'      => 'clearfy',
				'required'  => true,
			),
			array(
				'name'      => 'Webcraftic Robin image optimizer',
				'slug'      => 'robin-image-optimizer',
				'required'  => true,
			),
			array(
				'name'      => 'Admin Columns',
				'slug'      => 'codepress-admin-columns',
				'required'  => false,
			),
			array(
				'name'      => 'Better Search Replace',
				'slug'      => 'better-search-replace',
				'required'  => false,
			),
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => false,
			),
			array(
				'name'      => 'Contact Form 7 Database Addon – CFDB7',
				'slug'      => 'contact-form-cfdb7',
				'required'  => false,
			),
			array(
				'name'      => 'Cookie Notice for GDPR & CCPA',
				'slug'      => 'cookie-notice',
				'required'  => false,
			),
		);

		$config = array(
			'id'           => 'deeplevel',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => true,
			'message'      => '',
		);

		tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'deeplevel_register_required_plugins' );
}



if( $deeplevel_core_settings[ 'kama_excerpt' ] ) {
	if ( ! function_exists( 'kama_excerpt' ) ) {
		function kama_excerpt( $args = '' ){
			global $post;

			if( is_string($args) )
				parse_str( $args, $args );

			$rg = (object) array_merge( array(
				'maxchar'     => 350,   // Макс. количество символов.
				'text'        => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
										// Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется
										// все до <!--more--> вместе с HTML.
				'autop'       => true,  // Заменить переносы строк на <p> и <br> или нет?
				'save_tags'   => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
				'more_text'   => 'Читать дальше...', // Текст ссылки `Читать дальше`.
				'ignore_more' => false, // нужно ли игнорировать <!--more--> в контенте
			), $args );

			$rg = apply_filters( 'kama_excerpt_args', $rg );

			if( ! $rg->text )
				$rg->text = $post->post_excerpt ?: $post->post_content;

			$text = $rg->text;
			// убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
			$text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text );
			// убираем шоткоды: [singlepic id=3]. Учитывает markdown
			$text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text );
			$text = trim( $text );

			// <!--more-->
			if( ! $rg->ignore_more  &&  strpos( $text, '<!--more-->') ){
				preg_match('/(.*)<!--more-->/s', $text, $mm );

				$text = trim( $mm[1] );

				$text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
			}
			// text, excerpt, content
			else {
				$text = trim( strip_tags($text, $rg->save_tags) );

				// Обрезаем
				if( mb_strlen($text) > $rg->maxchar ){
					$text = mb_substr( $text, 0, $rg->maxchar );
					$text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1...', $text ); // кил последнее слово, оно 99% неполное
				}
			}

			// сохраняем переносы строк. Упрощенный аналог wpautop()
			if( $rg->autop ){
				$text = preg_replace(
					array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
					array('',     '</p><p>',  '<br />', '</p>'),
					$text
				);
			}

			$text = apply_filters( 'kama_excerpt', $text, $rg );

			if( isset($text_append) )
				$text .= $text_append;

			return ( $rg->autop && $text ) ? "<p>$text</p>" : $text;
		}
	}
}