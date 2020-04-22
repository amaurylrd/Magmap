			<div id="app" class="fluid-container">
				<div id="nav-form" class="embedded-container">
					<div id="tabs">
  						<button class="<?php if (!$focus) echo 'active' ?>" onclick="toggle(this, 'login')">Log in</button>
  						<button class="<?php if ($focus) echo 'active' ?>" onclick="toggle(this, 'register')">Sign up</button>
					</div>

					<div id="forms">
						<?php if (!$focus) echo form_open('welcome/login', array('id' => 'login'));
							  else echo form_open('welcome/login', array('id' => 'login', 'class' => 'hide')); ?>
							<input type="texte" name="login" value="<?= set_value('login') ?>" placeholder="Username">
							<?= form_error('login', '<div class="alert">', '</div>'); ?>
							<input type="password" name="password" placeholder="Password">
							<?= form_error('password', '<div class="alert">', '</div>'); ?>
							<?= form_button(array('type' => 'submit', 'content' => 'Log in')) ?>
						<?= form_close() ?>

						<?php if ($focus) echo form_open('welcome/register', array('id' => 'register'));
						      else echo form_open('welcome/register', array('id' => 'register', 'class' => 'hide')); ?>
							<input type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email Address">
							<?= form_error('email', '<div class="alert">', '</div>'); ?>
							<input type="texte" name="login" value="<?= set_value('login') ?>" placeholder="Username">
							<?= form_error('login', '<div class="alert">', '</div>'); ?>
							<input type="password" name="password" placeholder="Password">
							<?= form_error('password', '<div class="alert">', '</div>'); ?>
							<input type="password" name="passconf" placeholder="Password Confirmation">
							<?= form_error('passconf', '<div class="alert">', '</div>'); ?>
							<?= form_button(array('type' => 'submit', 'content' => 'Register')) ?>
						<?= form_close() ?>

					</div>
				</div>
			</div>

			<script>
				toggle = function(btn, id) {
					[...document.getElementById("forms").children].forEach(child => child.style.display = "none");
					document.getElementById(id).style.display = "block";
					[...document.getElementById("tabs").children].forEach(child => child.className = "");
					btn.className = "active";
				}
			</script>