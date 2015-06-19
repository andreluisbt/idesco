<?php
	require_once dirname(__FILE__) . '/security.php';
    require_once dirname(__FILE__) . '/controllers/controller-index.php';

if(!is_admin()){
	add_action('init', 'idesco_init');
	add_filter('style_loader_tag', 'idesco_proccess_less');
}
function idesco_init(){
		
	wp_deregister_script('jquery');
	wp_deregister_script('dashicons');
	wp_deregister_style('admin-bar');
	
	wp_enqueue_script('jquery', get_template_directory_uri() . '/lib/jquery-2.1.3/jquery-2.1.3.min.js', array(), null, false );
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/lib/bootstrap-3.3.4/dist/js/bootstrap.min.js', array(), null, false );
	
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/lib/font-awesome-4.3.0/css/font-awesome.min.css', array(), null, false );
	
	wp_enqueue_script('jquery-mask', get_template_directory_uri() . '/lib/jquery-form/jquery.form.min.js', array(), null, false );
	
	//wp_enqueue_script('jquery-mask', get_template_directory_uri() . '/lib/jquery-mask/dist/jquery.mask.min.js', array(), null, false );
	
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), null, false );
	wp_enqueue_style('main-less', get_template_directory_uri() . '/style/less/main.less', array(), null, false );
	
	//wp_enqueue_script('less', get_template_directory_uri() . '/lib/less-2.5.0/less.min.js', array(), null);
		
	remove_action('wp_head', 'print_emoji_detection_script', 7 );
	remove_action('wp_head', 'print_emoji_styles' );
	remove_action('wp_print_styles', 'print_emoji_styles' );
	
}

function idesco_proccess_less($tag) {
    
    $lessDir = get_template_directory().'/style/less';
    $cssDir = get_template_directory().'/style/css'; 
    
    $lessDirUri = get_template_directory_uri().'/style/less';
    $cssDirUri = get_template_directory_uri().'/style/css'; 
    
    $lessUrl = null;
    $css = null;
    
    $lessFile = null;
    $cssFile = null;
    
    if(preg_match("/id='.*-less-css'/", $tag)){
        require_once dirname(__FILE__) . '/lib/less-php/lessc.inc.php';
        
        $tag = preg_replace('/-less-css/', '-css', $tag);
        preg_match('/(http:\/\/[\w\.\/-]+)/', $tag, $urlMatches);
        $lessUrl = $urlMatches[0];
        $cssUrl = str_replace($lessDirUri, $cssDirUri, $lessUrl);
        $cssUrl = str_replace('.less', '.css', $cssUrl);
        
        $tag = str_replace($lessUrl, $cssUrl, $tag);
        
        $lessFile = str_replace($lessDirUri.'/', '', $lessUrl);
        $cssFile = str_replace($cssDirUri.'/', '', $cssUrl);
        
        $cacheFile = $lessDir.'/'.$lessFile.'.cache';
        if (file_exists($cacheFile)) {
            $cache = unserialize(file_get_contents($cacheFile));
        } else {
            //$cache = $lessDir.'/'.$cssFile;
        	$cache = $lessDir.'/'.$lessFile;
		}
    
        $less = new lessc;
        $newCache = $less->cachedCompile($cache);
    
        if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            file_put_contents($cacheFile, serialize($newCache));
            file_put_contents($cssDir.'/main.css', $newCache['compiled']);
        }
    }
    return $tag;
}
?>