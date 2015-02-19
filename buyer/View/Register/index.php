<p class="clear"></p>

	<div class="container">
		<div class="jumbotron">
			<div class="row ">
				
				<div id="column" class="col-xs-12 col-md-6">
					<p>Registration Form</p>
					
					<?php echo $this->Session->flash('message'); ?> 
					<?php $session = !empty($this->Session->read('register'))? $this->Session->read('register') : ''; ?>

					<span class="fillIn">*Fill in all the required fields correctly and with valid info.</span>
					<?php $baseUrl = array('controller' => 'Register', 'action' => 'index'); ?>

					<?php echo $this->Form->create("Register", array('url' => $baseUrl, 'class' => 'form-div')); ?>
						<div class="input-group">
		  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i>&nbsp;<span class="fillIn">*</span></span>
							<?php
								echo $this->Form->input('fname', array(
										'type' => 'text',
										'label' => false,
										'class' => 'form-control ',
										'placeholder' => 'First Name..',
										//'required' => true,
										'aria-describedby' => 'sizing-addon1',
										'id' => 'fname',
										'value' => !empty($session['fname'])? $session['fname'] : ''
									));
							?>
						</div>

						<p class="clear"></p>

						<div class="input-group">
		  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i>&nbsp;<span class="fillIn">*</span></span>
							<?php
								echo $this->Form->input('lname', array(
										'type' => 'text',
										'label' => false,
										'class' => 'form-control ',
										'placeholder' => 'Last name..',
										//'required' => true,
										'aria-describedby' => 'sizing-addon1',
										'id' => 'lname',
										'value' => !empty($session['lname'])? $session['lname'] : ''
									));
							?>
						</div>

						<p class="clear"></p>

						<div class="input-group">
		  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i>&nbsp;<span class="fillIn">*</span></span>
							<?php
								echo $this->Form->input('midInt', array(
										'type' => 'select',
										'label' => false,
										'class' => 'form-control',
										'empty' => '--Select--',
										//'required' => true,
										'aria-describedby' => 'sizing-addon1',
										'options' => !empty($letters)? $letters : '',
										'id' => 'select-width',
										'selected' => !empty($session['midInt'])? $session['midInt'] : ''
									));
							?>
						</div>

						<p class="clear"></p>

						<div class="input-group">
		  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-road"></i>&nbsp;<span class="fillIn">*</span></span>
							<?php
								echo $this->Form->input('homeAddr', array(
										'type' => 'textarea',
										'rows' => 3,
										'label' => false,
										'class' => 'form-control',
										'placeholder' => 'Home Address..',
										//'required' => true,
										'aria-describedby' => 'sizing-addon1',
										'id' => 'HomeAddress',
										'value' => !empty($session['homeAddr'])? $session['homeAddr'] : ''
									));
							?>
						</div>

						<p class="clear"></p>

						<div class="input-group">
		  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-th"></i>&nbsp;<span class="fillIn">*</span></span>
							<?php
								echo $this->Form->input('contactNo', array(
										'type' => 'text',
										'label' => false,
										'class' => 'form-control',
										'placeholder' => 'Mobile / Telephone number..',
										//'required' => true,
										'aria-describedby' => 'sizing-addon1',
										'id' => 'contactNo',
										'value' => !empty($session['contactNo'])? $session['contactNo'] : ''
									));
							?>
						</div>

						<p class="clear"></p>

						<div class="solidline"></div>

						<p>Login Information</p>

						<div class="input-group">
		  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i>&nbsp;<span class="fillIn">*</span></span>
							<?php
								echo $this->Form->input('emailAddr', array(
										'type' => 'text',
										'label' => false,
										'class' => 'form-control',
										'placeholder' => 'Email Address..',
										//'required' => true,
										'aria-describedby' => 'sizing-addon1',
										'id' => 'emailAddress',
										'value' => !empty($session['emailAddr'])? $session['emailAddr'] : ''
									));
							?>
						</div>

						<p class="clear"></p>

						<div class="input-group">
		  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i>&nbsp;<span class="fillIn">*</span></span>
							<?php
								echo $this->Form->input('password', array(
										'type' => 'password',
										'label' => false,
										'class' => 'form-control',
										'placeholder' => 'Password..',
										//'required' => true,
										'aria-describedby' => 'sizing-addon1',
										'id' => 'password',
										'value' => !empty($session['password'])? $session['password'] : ''
									));
							?>
						</div>

						<p class="clear"></p>

						<div class="input-group">
		  				<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i>&nbsp;<span class="fillIn">*</span></span>
							<?php
								echo $this->Form->input('confirm_password', array(
										'type' => 'password',
										'label' => false,
										'class' => 'form-control',
										'placeholder' => 'Confirm Password..',
										//'required' => true,
										'aria-describedby' => 'sizing-addon1',
										'id' => 'confirm_password',
										'value' => !empty($session['confirm_password'])? $session['confirm_password'] : ''
									));
							?>
						</div>

						<p class="clear"></p>

						<button type="submit" id="submit" class="btn btn-danger"/>Register</button>

					<?php echo $this->Form->end(); ?>

				</div>
				<div class="col-xs-12 col-md-4 tac">
					
					Terms and conditions
				</div>
			</div>
		</div>
	</div>