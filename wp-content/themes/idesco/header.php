<?php 
	require_once 'security.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>IDESCO</title>
		<?php wp_head(); ?>
	</head>

	<body>
        <div id="wrapPage">
            <div id="wrapHeader">
                <header class="container">
                    <img src="imgs/logo.png" />
                    <nav class="pull-right">
                        <ul>
                            <li>
                                <a href="#whoWeAre">Quem somos</a>
                            </li>
                            <li>
                                <a href="#projects">Projetos</a>
                            </li>
                            <li>
                                <a href="#partners">Parceiros</a>
                            </li>
                            <li>
                                <a href="#contact">Contato</a>
                            </li>
                        </ul>
                    </nav>
                </header>
            </div>
			
            <section id="banner" class="container">
            	<img src="<?php bloginfo('template_url'); ?>/imgs/banner.png" class="img-responsive" />
            </section>