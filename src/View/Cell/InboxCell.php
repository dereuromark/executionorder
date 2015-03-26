<?php
namespace App\View\Cell;

use Cake\Log\Log;
use Cake\View\Cell;

class InboxCell extends Cell
{

	public function display()
	{
		Log::write('info', 'InboxCell.action', 'exec');
	}

}
