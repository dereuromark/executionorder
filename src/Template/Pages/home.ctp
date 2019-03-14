<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright	 Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link		  http://cakephp.org CakePHP(tm) Project
 * @since		 0.10.0
 * @license	   http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;

$this->layout = false;

$cakeDescription = 'CakePHP execution app';
?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $cakeDescription ?>
	</title>
	<?= $this->Html->meta('icon') ?>
	<?= $this->Html->css('base.css') ?>
	<?= $this->Html->css('cake.css') ?>
</head>
<body class="home">
	<h1>Execution Order Test</h1>
	<div style="padding: 20px;">
		<div>
			<ul>
				<li><?php echo $this->Html->link('Basic Execution Order Test', ['controller' => 'Tokens', 'action' => 'index']);?></li>

				<li><?php echo $this->Html->link('Model Execution Order Test', ['controller' => 'Tokens', 'action' => 'model']);?></li>
				<li><?php echo $this->Html->link('Model: Saving multiple entities', ['controller' => 'Tokens', 'action' => 'model_multi_save']);?></li>
				<li><?php echo $this->Html->link('Model: Saving without validation', ['controller' => 'Tokens', 'action' => 'model_no_validation']);?></li>
				<li><?php echo $this->Html->link('Model: Saving without validation and without rules', ['controller' => 'Tokens', 'action' => 'model_no_validation_no_rules']);?></li>

				<li><?php echo $this->Html->link('Redirecting', ['controller' => 'Tokens', 'action' => 'redirecting']);?></li>
				<li><?php echo $this->Html->link('Exceptions', ['controller' => 'Tokens', 'action' => 'exception']);?></li>
			</ul>
		</div>
	</div>
	<div id="content">
		<?php
		if (Configure::read('debug')):
			Debugger::checkSecurityKeys();
		endif;
		?>
		<p id="url-rewriting-warning" style="background-color:#e32; color:#fff;display:none">
			URL rewriting is not properly configured on your server.
			1) <a target="_blank" href="http://book.cakephp.org/3.0/en/installation/url-rewriting.html" style="color:#fff;">Help me configure it</a>
			2) <a target="_blank" href="http://book.cakephp.org/3.0/en/development/configuration.html#general-configuration" style="color:#fff;">I don't / can't use URL rewriting</a>
		</p>

		<div class="row">
			<div class="columns large-5 platform checks">
				<?php if (version_compare(PHP_VERSION, '5.4.16', '>=')): ?>
					<p class="success">Your version of PHP is 5.4.16 or higher.</p>
				<?php else: ?>
					<p class="problem">Your version of PHP is too low. You need PHP 5.4.16 or higher to use CakePHP.</p>
				<?php endif; ?>

				<?php if (extension_loaded('mbstring')): ?>
					<p class="success">Your version of PHP has the mbstring extension loaded.</p>
				<?php else: ?>
					<p class="problem">Your version of PHP does NOT have the mbstring extension loaded.</p>;
				<?php endif; ?>

				<?php if (extension_loaded('openssl')): ?>
					<p class="success">Your version of PHP has the openssl extension loaded.</p>
				<?php elseif (extension_loaded('mcrypt')): ?>
					<p class="success">Your version of PHP has the mcrypt extension loaded.</p>
				<?php else: ?>
					<p class="problem">Your version of PHP does NOT have the openssl or mcrypt extension loaded.</p>
				<?php endif; ?>

				<?php if (extension_loaded('intl')): ?>
					<p class="success">Your version of PHP has the intl extension loaded.</p>
				<?php else: ?>
					<p class="problem">Your version of PHP does NOT have the intl extension loaded.</p>
				<?php endif; ?>
			</div>
			<div class="columns large-6 filesystem checks">
				<?php if (is_writable(TMP)): ?>
					<p class="success">Your tmp directory is writable.</p>
				<?php else: ?>
					<p class="problem">Your tmp directory is NOT writable.</p>
				<?php endif; ?>

				<?php if (is_writable(LOGS)): ?>
					<p class="success">Your logs directory is writable.</p>
				<?php else: ?>
					<p class="problem">Your logs directory is NOT writable.</p>
				<?php endif; ?>

				<?php $settings = Cache::config('_cake_core_'); ?>
				<?php if (!empty($settings)): ?>
					<p class="success">The <em><?= $settings['className'] ?>Engine</em> is being used for core caching. To change the config edit config/app.php</p>
				<?php else: ?>
					<p class="problem">Your cache is NOT working. Please check the settings in config/app.php</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="columns large-12  database checks">
				<?php
					try {
						$connection = ConnectionManager::get('default');
						$connected = $connection->connect();
					} catch (Exception $connectionError) {
						$connected = false;
						$errorMsg = $connectionError->getMessage();
						if (method_exists($connectionError, 'getAttributes')):
							$attributes = $connectionError->getAttributes();
							if (isset($errorMsg['message'])):
								$errorMsg .= '<br />' . $attributes['message'];
							endif;
						endif;
					}
				?>
				<?php if ($connected): ?>
					<p class="success">CakePHP is able to connect to the database.</p>
				<?php else: ?>
					<p class="problem">CakePHP is NOT able to connect to the database.<br /><br /><?= $errorMsg ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="columns large-6">
				<h3>Editing this Page</h3>
				<ul>
					<li>To change the content of this page, edit: src/Template/Pages/home.ctp.</li>
					<li>You can also add some CSS styles for your pages at: webroot/css/.</li>
				</ul>
			</div>
			<div class="columns large-6">
				<h3>Getting Started</h3>
				<ul>
					<li><a target="_blank" href="http://book.cakephp.org/3.0/en/">CakePHP 3.0 Docs</a></li>
					<li><a target="_blank" href="http://book.cakephp.org/3.0/en/tutorials-and-examples/blog/blog.html">The 15 min Blog Tutorial</a></li>
				</ul>
				<p>
			</div>
		</div>

	</div>
	<footer>
	</footer>
</body>
</html>
