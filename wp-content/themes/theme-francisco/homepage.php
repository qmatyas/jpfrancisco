<?php /* Template Name: homepage*/ ?>
<?php get_header(); ?>
<?php the_post(); ?>
<!-- <section class="section-slider">
	<div class="container-fluid">
		<div class="row">

		</div>
	</div>
</section> -->
<section class="section-about" id="about">
	<div class="container">
		<div class="row">
			<h1 class="title-section col-md-offset-1 col-sm-offset-1 col-md-3">Mon parcours</h1>
		</div>
		<div class="row container-about">	
			<div class="col-sm-offset-1 col-sm-3">
				<img class="photo-about" src="<?php echo get_template_directory_uri(); ?>/assets/img/jp_profile.png">
			</div>
			<div class="text-about col-sm-7 col-sm-offset-1 col-md-offset-0">
				<?php echo nl2br(get_post_meta(get_the_ID(),'jp_about', true)); ?>

				<!-- <div class="btn-groupe"><button type="button" class="btn btn-download btn-primary col-md-3" data-toggle="modal" data-target="#myCv">Aperçu du CV</button></div> -->
				<div class="btn-groupe"><a type="button" href="<?php echo get_template_directory_uri(); ?>/assets/img/cv_jp.pdf" class="btn btn-download btn-primary col-md-2">Voir mon cv</a></div>
				<!-- Modal -->
				<!--<div class="modal fade" id="myCv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Aperçu CV</h4>
				      </div>
				      <div class="modal-body">
				      	<div class="row">
				      		<img class="img-cv col-md-12" src="<?php echo get_template_directory_uri(); ?>/assets/img/cv_apercu.png">
				      	</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-download btn-primary" data-dismiss="modal">Fermer</button>
				      </div>
				    </div>
				  </div>
				</div>-->
			</div>
		</div>
	</div>
</section>

<div class="triangle"></div>
<section class="section-project" id="project">
	<div class="container">
		<div class="row">
			<h1 class="title-section col-md-offset-1 col-sm-offset-1 col-md-3">Mes projets</h1>
		</div>
		<div class="row container-project">
			<?php $myprojects = jpProjet::getAllProjects(); ?>
        	<?php foreach ($myprojects as $project): ?>
				<h2 class="title-project col-md-offset-1 col-sm-offset-1 col-md-12"><?php echo $project->post_title; ?></h2>
				<div class="col-md-4 col-md-offset-1 project-video">
					<?php $urlvideo =  get_post_meta($project->ID,'jp_projet_url', true); ?>			
					<iframe width="420" height="215"
					src="<?php echo $urlvideo ; ?>">
					</iframe>
				</div>
				<div class="col-md-6 col-md-offset-1 text-project">
					<p class="project-paragraphe"> 
						<?php echo nl2br(get_post_meta($project->ID,'jp_projet_text', true)); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>
		<!-- <button type="button" class="btn-more">Voir plus</button> -->
	</div>
</section>
<section class="section-diplome" id="diplome">
	<div class="container">
		<div class="row">
			<h1 class="title-section col-md-offset-1 col-sm-offset-1 col-md-3">Diplôme</h1>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-1">
				<div class="diplome-filter"></div>
				<img class="img-diplome" src="<?php echo get_template_directory_uri(); ?>/assets/img/jp_diplome.png">
			</div>
			<div class="col-md-4 col-md-offset-1">
				<h2 class="title-diplome">Diplôme d'etat</h2>
					<!-- <div class="col-md-3 btn-diplome diplome-left"><a href="<?php echo get_template_directory_uri(); ?>/assets/img/jp_diplome.png">voir</a></div> -->
					<div class="btn-groupe"><a type="button" href="<?php echo get_template_directory_uri(); ?>/assets/img/cv_jp.pdf" class="btn btn-download btn-primary col-md-2">Voir</a></div>
					<!-- <button type="button" class="col-md-4 btn-diplome diplome-right">Télécharger</button> -->
			</div>
		</div>
	</div>
</section>
<div class="triangle"></div>
<section class="section-stage" id="stage">
	<div class="container">
		<div class="row">
			<h2 class="title-section col-md-offset-1 col-sm-offset-1 col-md-3">Stages</h2>
		</div>
		<div class="row">
			<div class="col-md-4 col-vid-stage">
				<iframe width="380" height="200"
				src="http://www.youtube.com/embed/GqtQoMgkh_Q?autoplay=0">
				</iframe>
				<p>Sed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad</p>
			</div>
			<div class="col-md-4 col-vid-stage">
				<iframe width="380" height="200"
				src="http://www.youtube.com/embed/GqtQoMgkh_Q?autoplay=0">
				</iframe>
				<p>Sed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad</p>
			</div>
			<div class="col-md-4 col-vid-stage">
				<iframe width="380" height="200"
				src="http://www.youtube.com/embed/GqtQoMgkh_Q?autoplay=0">
				</iframe>
				<p>Sed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad</p>
			</div>
		</div>
	</div>
</section>
<section class="section-date" id="date">
	<div class="container">
		<div class="row">
			<h2 class="title-section col-md-offset-1 col-sm-offset-1 col-md-3">Stages à venir</h2>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-1 photo-date">
				<!-- <img src="http://placehold.it/350x250"> -->
				<img class="photo-salle" src="<?php echo get_template_directory_uri(); ?>/assets/img/salle-stage.jpg">
			</div>
			<div class="col-md-5 col-md-offset-2 col-date">
				<?php echo nl2br(get_post_meta(get_the_ID(),'jp_dates_stage', true)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 stage-about">
				<h3>déroulement du stage</h3>					
				<?php echo nl2br(get_post_meta(get_the_ID(),'jp_deroulement_stage', true)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 content-place">
				<h3>Tarifs</h3>
				<?php echo nl2br(get_post_meta(get_the_ID(),'jp_tarif_stage', true)); ?>
			</div>
			<div class="col-md-6 content-place">
				<h3>Lieu</h3>
				<?php echo nl2br(get_post_meta(get_the_ID(),'jp_lieu_stage', true)); ?>
			</div>
		</div>
	</div>
</section>
<div class="triangle-contact"></div>
<section class="section-contact" id="contact">
	<div class="container">
		<div class="row">
			<h2 class="title-section col-md-offset-1 col-sm-offset-1 col-md-3">Me contacter</h2>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-1">
				<div class="content-contact">
					Jean-pierre Francisco <br>
					Tel : 00 00 00 00 00 <br>
					E-Mail : dansejazzone@free.fr
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<form>
				  <div class="form-group">
				    <label for="inputName">Nom et prénom</label>
				    <input type="text" class="form-control" id="inputName">
				    <label for="inputEmail">E-mail</label>
				    <input type="email" class="form-control" id="inputEmail">
				    <label for="inputObject">Objet</label>
				    <input type="text" class="form-control" id="inputObject">
				    <label for="inputMsg">Message</label>
				    <textarea type="text" id="inputMsg" class="form-control" rows="5"></textarea>
				  </div>
				  <button type="submit" class="btn btn-default">Envoyer</button>
				</form>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>