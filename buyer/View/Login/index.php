	<?php echo $this->Element('carousel');?> 
	
	<section id="content">
	<div class="container">
		<div class="pull-right">
		<?php 
		echo $this->Form->input('Search', array(
				'type' => 'text',
				'label' => false,
				'placeholder' => 'Search an item..',
				'class' => 'form-control'
			));
		?>
		</div>
		<?php echo $this->element('best_products'); ?>
	</div>
	</section>