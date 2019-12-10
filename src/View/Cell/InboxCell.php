<?php

namespace App\View\Cell;

use Cake\Log\Log;
use Cake\View\Cell;

class InboxCell extends Cell {

	/**
	 * InboxCell::display()
	 *
	 * @return void
	 */
	public function display() {
		Log::write('info', 'InboxCell.action', 'exec');
	}

}
