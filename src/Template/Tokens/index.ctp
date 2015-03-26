<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Overview'), ['controller' => 'Pages', 'action' => 'display', 'home']) ?></li>
	</ul>
</div>

<?php $this->cell('Inbox::display'); ?>

<div>
<?php echo $this->element('info'); ?>
</div>
