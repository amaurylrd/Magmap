<!DOCTYPE html>
<html lang="fr">
	<head>
    	<meta http-equiv="Content-Type" charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Magmap</title>
        <?= link_tag('assets/css/normalize.css'); ?>
        <?= link_tag('assets/css/reset.css'); ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <?= link_tag('assets/css/font-awesome-4.7.0/css/font-awesome.min.css'); ?>
        <?= link_tag('assets/css/tweet.css'); ?>
        <?= link_tag('assets/css/style.css'); ?>
        <script type='text/javascript' src="<?= base_url('assets/js/cache.js') ?>"></script>
        <script type='text/javascript' src="<?= base_url('assets/js/serviceAjax.js') ?>"></script>
        <script type='text/javascript' src="<?= base_url('assets/js/d3.min.js') ?>"></script>
        <script type='text/javascript' src="<?= base_url('assets/js/map.js') ?>"></script>
  	</head>

  	<body>
		<div id="app">
			<header>
				<nav class="nav nav-bar">
					<a style="margin-right: auto" href="">
						<img class="nav-logo" src="<?= base_url('assets/images/raspberry.svg'); ?>">
					</a>
					<a class="nav-link" href="">S’inscrire</a>
					<a class="nav-link" href="">Se connecter</a>
				</nav>
			</header>

			<main role="main">
				<div class="container justify-content-center">
					<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</h2>
					<img style="float: left" src="<?= base_url('assets/images/run.gif'); ?>"  alt="">
					<p><br><br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
				</div>
				<hr class="separator">
			</main>

			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
			<div class="register">
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
                <p class="tweet-info">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            </div>
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="">
                    <h3>Bienvenue</h3>
                    <span>Vous faites d&eacute;j&agrave; partie de nos membres ? Connectez-vous pour d&eacute;couvrir notre s&eacute;lection de profils par affinit&eacute;s.</span>
                    <a class="nav-link" href="">Se connecter</a>
                </div>
    <?php
    function input_tag($type, $name, $placeholder = "") {
      return '<input type="'.$type.'" name="'.$name.'" class="form-control" value="'.set_value($name).'" placeholder="'.$placeholder.'">';
  }
  ?>
                <div class="col-md-9 register-right">
                    <div class="tab-content">
                        <div class="tab-pane show active">
                            <h3 class="register-heading">Inscrivez-vous et vivez vos propres relations</h3>
                            <?= form_open('', array('class' => 'row')) ?>
                                <div class="col-md-6 form-group">
                                    <div class="form-group">
                                        <?= input_tag('email', 'email', 'Adresse e-mail') ?>
                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" onclick="toggle('password')">
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <?= input_tag('password', 'password', 'Mot de passe') ?>
                                    </div>
                                    <div class="form-group">
                                        <select name="dept" class="form-control" id="depts"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?= input_tag('text', 'username', 'Nom d\'utilisateur') ?>
                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" onclick="toggle('passconf')">
                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <?= input_tag('password', 'passconf', 'Confirmation du mot de passe') ?>
                                    </div>
                                    <div class="form-group">
                                        <?= input_tag('date', 'birthdate') ?>
                                    </div>
                                    <input type="submit" class="btnRegister" value="S'enregistrer"/>
                                </div>
                            <?= form_close() ?>


                                <!-- 
                                	date de naissance!

                                	emphase bouton top
                                	cocher condition d'utilisation
                                	connexion fb google
									btn coeur
									input -> btn

									mdp oubli&eacute; connexion
									https://codepen.io/jsweetie/pen/dXLyYG
									https://kitt.lewagon.com/placeholder/users/random?2
									change color of map en fonction de des depts des utilisateurs

									base de donnée, serveur
                                -->
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <br><br><br><br><br><br><br><br><br><br>
            
        <div id="map"></div>
        <style type="text/css">
                #map {
                    width: 50%;
                    height: 100%;
                    margin-left: 5%;
                    background: white;
/*                    radial-gradient(circle at center, #039, transparent);
*/                }
    </style>
                        <!-- carte ici -->	
        <footer>
                 <?php
                    $data = array();
                    for ($i = 1; $i < 96; $i++) {
                        if ($i != 20) {
                            $rand = rand(1, 500);
                            $id = substr("0".$i, -2);
                            $data[$id] = $rand;
                        }
                    } 
                    

                    $cookie_name = 'depts_cookie';
                    if (!isset($_COOKIE[$cookie_name])) {
                        $cookie_data = json_encode($data);
                        $cookie_expires = time()+60*60*48;
                        setcookie($cookie_name, $cookie_data, $cookie_expires);
                    }


                    // $from    = 'no-reply@magmap.com';
                    // $to      = 'amaurylrd@yahoo.fr';
                    // $subject = 'le sujet';
                    // $message = 'Bonjour !';
                    // $headers = 'From: '.$from.'\r\n'.
                    //     'Reply-To: '.$to.'\r\n'.
                    //     'X-Mailer: PHP/'.phpversion();

                    // $success = mail($to, $subject, $message, $headers);
                    // if (!$success) {
                    //     $errorMessage = error_get_last()['message'];
                    // }

                ?>     	
        </footer>
	</div>
</body>

  	<script type="text/javascript">
		window.onload = () => {
			makeServiceAjax().getDept().then((rep) => {
				let select = document.getElementById("depts");
                rep = rep.filter(dept => (dept.code+'').length < 3);
                rep.sort(function(a, b) { return a.code - b.code; });
                let cookie_json = JSON.parse(decodeURIComponent(getCookie('depts_cookie')));
                for (dept of rep) {
					let opt = document.createElement("option");
                    let [code, nom] = [dept.code, dept.nom];
					opt.value = code;
					opt.innerText = code+" - "+nom;
					select.appendChild(opt);

                    delete dept.codeRegion;
                    delete dept.nom;
                    dept.weight = cookie_json.hasOwnProperty(code) ? cookie_json[code] : 0; 
                }
                map_initialize(rep);
			}, (err) => {});
        }

		function toggle(name) {
			let input = document.getElementsByName(name)[0];
			input.focus();
			input.type = input.type === "text" ? "password" : "text";
		}
 	</script>
<html>