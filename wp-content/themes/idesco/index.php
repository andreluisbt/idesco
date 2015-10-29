<?php 
	require_once 'security.php';
    get_header(); 
?>

            <section id="specialty" class="container">
                <?php
                    $whoWeArePost = get_post(58);
                    $whoWeArePost->post_title;
                ?>
                <h1><?php echo $whoWeArePost->post_title; ?></h1>
                <?php echo $whoWeArePost->post_content; ?>
                
                <div class="clearfix"></div>
                
                <div class="areas">
                    <?php
                        $args = array('category'=>5, 'order'=>'ASC');
                        $teamPosts = get_posts($args);
                        foreach($teamPosts as $post){
                            echo '<div class="col-md-4">
                                    '.$post->post_content.'
                                </div>';
                        }
                    ?>
                </div>
            </section>

			<section id="whoWeAre" class="container">
				<?php
					$whoWeArePost = get_post(1);
					$whoWeArePost->post_title;
				?>
				<h1><?php echo $whoWeArePost->post_title; ?></h1>
				<?php echo $whoWeArePost->post_content; ?>
				
				<div class="clearfix"></div>
                
                <div class="team">
                    <?php
                        $args = array('category'=>2, 'order'=>'ASC');
                        $teamPosts = get_posts($args);
                        foreach($teamPosts as $post){
                            echo '<div class="col-md-3">
                                    '.$post->post_content.'
                                </div>';
                            
                        }
                    ?>
                </div>
            </section>
           
            <section id="projects">
                <div class="container">
            		<h1>PROJETOS</h1>
                    <?php
                        $projectDescPost = get_post(24);
                        echo $projectDescPost->post_content;
                    ?>
            		<br/>
            		<?php
                        $args = array('category'=>3, 'order'=>'ASC');
                        $projectPosts = get_posts($args);
                        foreach($projectPosts as $post){
                            echo '<div class="col-md-6">
                                    '.$post->post_content.'
                                </div>';
                        }
                    ?>
            	</div>
            </section>
           
           <section id="partners">
                <div class="container">
                    <h1>PARCEIROS</h1>
                    <?php
                        $partnersPost = get_post(48);
                        echo $partnersPost->post_content;
                    ?>
                <div class="container">
            </section>
           
            <section id="contact">
            	<div class="container">
            		<h1>Contato</h1>
            		<div class="col-md-5">
            			<form method="post" action="<?php bloginfo('template_url'); ?>/services/service-contact_form.php">
                            <div class="form-group msgs"></div>
                            <div class="form-group">
            					<label for="email" class="control-label">Email</label>
            					<input type="email" required id="inputEmail" name="inputEmail" class="form-control" placeholder="Email">
            				</div>
            				<div class="form-group">
            					<label for="name" class="control-label">Nome</label>
            					<input type="text" required id="inputName" name="inputName" class="form-control" placeholder="Nome">
            				</div>
            				<div class="form-group">
            					<textarea required id="textMsg" name="textMsg" class="form-control col-md-12" rows="6"></textarea>
            				</div>
            				<button type="submit" class="btn btn-primary">
            					Enviar
            				</button>
        				</form>
				    </div>
            		<div class="col-md-7">
            			<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3981.3442845051422!2d-38.49704732272337!3d-3.7349355783936464!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1431535403588" width="100%" height="325" frameborder="0" style="border:0"></iframe>
            		</div>
            	</div>
            </section>

<?php get_footer(); ?>
