<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta http-equiv="Content-Type" charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="language" content="FR">
        <meta name="description" content="Site de rencontre en ligne">
        <title>Magmap</title>
        <?= link_tag('assets/css/normalize.css'); ?>
        <?= link_tag('assets/css/reset.css'); ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <?= link_tag('assets/css/font-awesome-4.7.0/css/font-awesome.min.css'); ?>
        <?= link_tag('assets/css/tweet.css'); ?>
        <?= link_tag('assets/css/style.css'); ?>
        <script type='text/javascript' src="<?= base_url('assets/js/d3.min.js') ?>"></script>
        <script type='text/javascript' src="<?= base_url('assets/js/cache.js') ?>"></script>
        <script type='text/javascript' src="<?= base_url('assets/js/serviceAjax.js') ?>"></script>
        <script type='text/javascript' src="<?= base_url('assets/js/map.js') ?>"></script>
        <script type='text/javascript' src="<?= base_url('assets/js/script.js') ?>"></script>
  	</head>

    <?php
        function input_tag($type, $name, $placeholder = "", $focus = FALSE) {
            $attributes = 'type="'.$type.'"';
            $attributes .= ' name="'.$name.'"';
            $attributes .= ' class="form-control"';
            $attributes .= ' value="'.set_value($name).'"';
            $attributes .= ' placeholder="'.$placeholder.'"';
            $head = '<input required '; $tail = '>';
            return !$focus ? $head.$attributes.$tail : $head.$attributes.' autofocus'.$tail;
        }
    ?>

  	<body>   
		<div id="app">
            <div class="page" id="connection">
                <header>
				    <nav class="nav nav-bar">
                        <a style="margin-right: auto" href="">
                            <img class="nav-logo" src="<?= base_url('assets/images/raspberry.svg'); ?>">
                        </a>
                        <?= form_open('welcome/login', array('class' => 'form-inline')) ?>                     
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-at" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <?= input_tag('email', 'lg_email', 'Adresse e-mail') ?>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" onclick="toggle('lg_password')">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <?= input_tag('password', 'lg_password', 'Mot de passe') ?>
                            </div>
                            <button type="submit" class="nav-link"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        <?= form_close() ?>
                        <div>
                            <?= anchor('#registration', 'S’inscrire', 'class="nav-link"'); ?>
                            <?= anchor('', 'Se connecter', ['class' => 'nav-link', 'onclick' => 'return develop(this)']); ?>   
                        </div>
				    </nav>
                </header>

                <main role="main">
				    <div class="container justify-content-center">
					   <h2 class="main_title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h2>
					   <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
				    </div>
                </main>
            </div>
            <div class="row t .fluid">
                <div class="col-sm-5">
                    
                </div>
                <div class="col" id="map"></div> 
            </div>

            <style type="text/css">
                .t {
                    margin-bottom: 80px;
                }

                .t > .col-sm-5 {
                    background-color: red;
                    height: auto;
                    margin-left: 10%;
                    width: 40%;
                }
            </style>

			<div class="register">
                <svg id="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#fff" fill-opacity="1" d="M0,288L60,256C120,224,240,160,360,138.7C480,117,600,139,720,160C840,181,960,203,1080,202.7C1200,203,1320,181,1380,170.7L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
                </svg>
				<div class="container" style="height: 650px">
					<div class="tweet-container">
                		<div class="tweet">
                    		<div class="tweet-content">
                        		<div class="tweet-header">
                            		<a class="account-group">
                                		<img class="avatar" src="<?= base_url('assets/images/tweet/male_avatar.jpg'); ?>" alt="">
                           				<span class="fullname-group">
                                            <strong class="fullname txt-truncate">Mat Wayne</strong>
                                        </span>
                                		<span class="username txt-truncate" dir="ltr">@<b>matthew.wayne</b></span>
                            		</a>
                        		</div>
                    		</div>
                    		<div>
                    			<p class="tweet-text"><a class="mention" href="">@al_ice.d</a>, d&eacute;j&agrave; 6 mois que nos chemins se sont crois&eacute;s sur <a class="mention" href="">@Magmap</a> &#10084;&#65039;</p>
                    		</div>
                            <div class="tweet-details">
                                <div class="tweet-metadata">
                                    <span class="metadata">
                                        <span id="timeOutput">11:58 PM</span> - <span id="dayOutput">6</span> <span id="monthOutput">Nov</span> <span id="yearOutput">2019</span>
                                    </span>
                        	    </div>
                        	    <div class="tweet-stats">
                            	    <ul class="stats">
                                	    <li><a><strong style="display: inline-block;">75</strong> Retweets</a></li>
                                	    <li><a><strong style="display: inline-block;">524</strong> Likes</a></li>
                            	    </ul>
                                </div>
                    	    </div>
                            <div class="tweet-footer">
                                <div class="action-list" role="group">
                                    <div class="action">
                                        <div class="action-block reply">
                                            <div class="icon-container">
                                                <span class="icon-medium"><i class="fa fa-comment"></i></span>
                                            </div>
                                            <span class="action-count"><span>276</span></span>
                                	    </div>
                            	    </div>
                            	    <div class="action">
                                	    <div class="action-block retweet">
                                            <div class="icon-container">
                                                <span class="icon-medium"><i class="fa fa-lg fa-retweet"></i></span>
                                    	    </div>
                                    	    <span class="action-count"><span>75</span></span>
                                	    </div>
                            	    </div>
                				    <div class="action">
                                	    <div class="action-block liked">
                                            <div class="icon-container">
                                                <span class="icon-medium"><i class="fa fa-heart"></i></span>
                                            </div>
                                            <span class="action-count">524</span>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <div class="action-block">
                                            <div class="icon-container">
                                                <span class="icon-medium"><i class="fa fa-envelope"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tweet">
                            <div class="tweet-content">
                                <div class="tweet-header">
                                    <a class="account-group">
                                        <img class="avatar" src="<?= base_url('assets/images/tweet/female_avatar.jpg'); ?>" alt="">
                                        <span class="fullname-group"><strong class="fullname txt-truncate">Sara Lisa</strong></span>
                                        <span class="username txt-truncate" dir="ltr">@<b>m.sara_lisa</b></span>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <p class="tweet-text">Je pars plus en vacances tellement je fais de rencontres<br>avec <a class="mention" href="">@Magmap</a> !</p>
                            </div>
                            <div class="tweet-details">
                                <div class="tweet-metadata">
                                    <span class="metadata">
                                        <span id="timeOutput">10:06 PM</span> - <span id="dayOutput">1</span> <span id="monthOutput">Nov</span> <span id="yearOutput">2019</span>
                                    </span>
                                </div>
                                <div class="tweet-stats">
                                    <ul class="stats">
                                        <li><a><strong style="display: inline-block;">218</strong> Retweets</a></li>
                                        <li><a><strong style="display: inline-block;">609</strong> Likes</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tweet-footer">
                                <div class="action-list" role="group">
                                    <div class="action">
                                        <div class="action-block reply">
                                            <div class="icon-container">
                                                <span class="icon-medium"><i class="fa fa-comment"></i></span>
                                            </div>
                                            <span class="action-count"><span>121</span></span>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <div class="action-block retweet">
                                            <div class="icon-container">
                                                <span class="icon-medium"><i class="fa fa-lg fa-retweet"></i></span>
                                            </div>
                                            <span class="action-count"><span>218</span></span>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <div class="action-block liked">
                                            <div class="icon-container">
                                                <span class="icon-medium"><i class="fa fa-heart"></i></span>
                                            </div>
                                            <span class="action-count">609</span>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <div class="action-block">
                                            <div class="icon-container">
                                                <span class="icon-medium"><i class="fa fa-envelope"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="tweet-info">Comme Matthew et Sara, faites-nous confiance pour nous permettre de vous aider à rencontre la personne dont vous rêviez à vos côtés.</p>
                </div>
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="">
                        <h3>Bienvenue</h3>
                        <span>Vous faites d&eacute;j&agrave; partie de nos membres ? Connectez-vous pour d&eacute;couvrir notre s&eacute;lection de profils par affinit&eacute;s.</span>
                        <?= anchor('#connection', 'Se connecter', 'class="nav-link"'); ?>
                    </div>
                    <div id="registration" class="col-md-9 register-right">
                        <div class="tab-content">
                            <div class="tab-pane show active">
                                <h3 class="register-heading">Inscrivez-vous et vivez vos propres relations</h3>
                                <?= form_open('welcome/register', array('class' => 'row')) ?>
                                    <div class="col-md-6 form-group">
                                        <div class="form-group">
                                            <?= input_tag('email', 'rg_email', 'Adresse e-mail') ?>
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" onclick="toggle('rg_password')">
                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <?= input_tag('password', 'rg_password', 'Mot de passe') ?>
                                        </div>
                                        <div class="form-group">
                                            <select name="rg_dept" class="form-control" id="depts"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?= input_tag('text', 'rg_username', 'Nom d\'utilisateur') ?>
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" onclick="toggle('rg_passconf')">
                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <?= input_tag('password', 'rg_passconf', 'Confirmation du mot de passe') ?>
                                        </div>
                                        <div class="form-group">
                                            <?= input_tag('date', 'rg_birthdate') ?>
                                        </div>
                                        <input type="submit" class="btnRegister" value="S'enregistrer" <?= $focus ?>>
                                    </div>
                                <?= form_close() ?>
                                <?= validation_errors('<div class="alert form_error">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                              
            <!-- indent is perfect -->
                    	
            <footer class="footer">
            




            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="footer-widget">
                            <h3>Stay in touch</h3>
                            <div class="footer-widget-content">
            
            <a href="mailto:sales@example.com" class="contact-link">sales@example.com</a>
            <a href="mailto:support@example.com" class="contact-link red"> support@example.com </a>
            <a href="tel:0121234" class="contact-link">(123) 456-789</a>
            <div class="footer-social">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
      <div class="footer-widget">
        <h3>Latest Events</h3>
        <div class="footer-widget-content">
          <div class="media">
              <div class="media-left">
                 <a href="#"><img class="media-object" src="http://placehold.it/60x60" alt="..."></a>
              </div>
              <div class="media-body">
                 <p><a href="#">vulputate velit esse consequat. </a></p>
                 <span>September 30, 2016 </span>
              </div>
           </div>
          <div class="media">
              <div class="media-left">
                 <a href="#."><img class="media-object" src="http://placehold.it/60x60" alt="..."></a>
              </div>
              <div class="media-body">
                 <p><a href="#">vulputate velit esse consequat. </a></p>
                 <span>September 30, 2016 </span>
              </div>
           </div>
        </div>
        </div>
      </div>
      <div class="col-sm-3">
      <div class="footer-widget">
        <h3>Opening Hour</h3>
        <div class="footer-widget-content">
        <div class="open-time ">
          <ul class="opening-time">
            <li><span><i class="fa fa-times"></i></span><p class="clock-time"><strong>monday :</strong> closed</p>
             </li>
            <li><span><i class="fa fa-check"></i></span><p><strong>tue-fri :</strong> 8am - 12am</p></li>
            <li><span><i class="fa fa-check"></i></span><p><strong>sat-sun :</strong> 7am - 1am</p></li>
            <li><span><i class="fa fa-check"></i></span><p><strong>holydays :</strong> 12pm-12am</p></li>
          </ul>
           </div>
        </div>
        </div></div>
      
      <div class="col-sm-3">
      <div class="footer-widget">
        <h3>Latest Events</h3>
        <div class="footer-widget-content">
          <div class="images-gellary">
            <ul>
              <li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 01"></a></li>
              <li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 02"></a></li>
              <li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 03"></a></li>
              <li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 04"></a></li>
              <li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 05"></a></li>
              <li><a href="#"><img src="http://placehold.it/85x85" alt="Instagram 06"></a></li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</footer>
	</div>
</body>

<html>