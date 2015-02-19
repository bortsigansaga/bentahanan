<p class="clear"></p>

	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<p>Login</p>
					<?php $baseUrl = array('controller' => 'Login', 'action' => 'login'); ?>
				
					<?php echo $this->Form->create("Login", array('url' => $baseUrl, 'class' => 'form-div'));?>
					
					<div class="input-group input-group-lg">
	  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
						<?php
							echo $this->Form->input('email', array(
									'type' => 'text',
									'label' => false,
									'class' => 'form-control input-lg inputEmail',
									'placeholder' => 'E-mail Address..',
									'required' => true,
									'aria-describedby' => 'sizing-addon1',
									'id' => 'email',
								));
						?>
					</div>

					<p class="clear"></p>

					<div class="input-group input-group-lg">
						<span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-lock"></i></span>
					<?php
						echo $this->Form->input('password', array(
								'type' => 'password',
								'label' => false,
								'class' => 'form-control input-lg inputPassword',
								'placeholder' => 'Password..',
								'aria-describedby' => 'sizing-addon1',
								'required' => true,
								'id' => 'password',
							));
					?>
					</div>

					<p class="clear"></p>

					<button type="submit" id="submit" class="btn btn-default btn-lg"/>Login</button>
					
					<?php echo $this->Form->end();?>
				</div>

				<div class="col-xs-12 col-md-6">
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.datepicker').datepicker({
					format: 'mm-dd-yyyy',
					viewMode: 'years',
		});
	});

</script>