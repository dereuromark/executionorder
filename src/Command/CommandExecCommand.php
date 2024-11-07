<?php

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

class CommandExecCommand extends Command {

	public function __construct() {
		$this->log('Command::__construct', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function initialize(): void {
		parent::initialize();

		$this->log('Command::initialize', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function startup(): void {
		parent::startup();

		$this->log('Command::startup', 'info', 'exec');
	}

	/**
	 * @param \Cake\Console\Arguments $args The command arguments.
	 * @param \Cake\Console\ConsoleIo $io The console io
	 *
	 * @return int|null The exit code or null for success
	 */
	public function execute(Arguments $args, ConsoleIo $io): ?int {
		// Dont send our logging calls to stdout...
		$io->setLoggers(false);

		$this->log('Command::execute', 'info', 'exec');

		return static::CODE_SUCCESS;
	}

}
