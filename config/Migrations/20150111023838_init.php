<?php

use Phinx\Migration\AbstractMigration;

class Init extends AbstractMigration {

	/**
	 * Change Method.
	 *
	 * More information on this method is available here:
	 * http://docs.phinx.org/en/latest/migrations.html#the-change-method
	 *
	 * Uncomment this method if you would like to use it.
	 *
	public function change() {
	}
	*/

	/**
	 * Migrate Up.
	 *
	 * @return void
	 */
	public function up() {
		$this->execute("CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `key` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `used` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `unlimited` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;");
	}

	/**
	 * Migrate Down.
	 *
	 * @return void
	 */
	public function down() {
		$this->execute('DROP table tokens');
	}

}
