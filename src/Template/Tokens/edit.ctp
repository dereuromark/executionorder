<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $token->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $token->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Tokens'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="tokens form large-10 medium-9 columns">
	<?= $this->Form->create($token); ?>
	<fieldset>
		<legend><?= __('Edit Token') ?></legend>
		<?php
			//echo $this->Form->input('user_id', ['options' => $users]);
			echo $this->Form->input('type');
			echo $this->Form->input('key');
			echo $this->Form->input('content');
			echo $this->Form->input('used');
			echo $this->Form->input('unlimited');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
