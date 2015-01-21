<?php
namespace App\Shell;

use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\Log\Log;

/**
 * Simple cleanup for exec shell
 */
class ExecShell extends Shell {

	public function __construct(ConsoleIo $io = null) {
		parent::__construct($io);

		// Dont send our logging calls to stdout...
		$this->_io->setLoggers(false);

		$this->log('Shell::__construct', 'info', 'exec');
	}

	public function initialize() {
		parent::initialize();

  	$this->log('Shell::initialize', 'info', 'exec');
	}

	public function startup() {
		parent::startup();

  	$this->log('Shell::startup', 'info', 'exec');
	}

	/**
	 * Start the shell and interactive console.
	 *
	 * @return int|void
	 */
	public function test() {
		$this->out('Testing CLI execution order');

		$this->log('Shell::command', 'info', 'exec');
	}

	/**
	 * Start the shell and interactive console.
	 *
	 * @return int|void
	 */
	public function testError() {
		$this->out('Testing CLI execution order');

		$this->log('Shell::command', 'info', 'exec');

		return $this->error('foo bar');
	}

	/**
	 * Prep exec.txt for Results.md.
	 * Doesnt work, better use a sh script :)
	 *
	 * @return int|void
	 */
	public function prep() {
		if (!file_exists(LOGS . 'exec.log')) {
			return $this->error('No log file. Nothing to do.');
		}
		$logs = file_get_contents(LOGS . 'exec.log');
		if (!$logs) {
			return $this->error('No log file content. Nothing to do.');
		}

		preg_replace('/.+ Info\s*/', '', $logs);

		file_put_contents(TMP . 'exec.txt', $logs);
		unlink(LOGS . 'exec.log');
		$this->out('Result in: exec.txt');
	}

	/**
	 * Display help for this console.
	 *
	 * @return ConsoleOptionParser
	 */
	public function getOptionParser() {
		$parser = new ConsoleOptionParser('console', false);
		$parser->description(
			'For getting README/Results output from exec.log'
		)
		->addSubcommand(
			'test'
		)
		->addSubcommand(
			'test_error'
		)
		->addSubcommand(
			'prep'
		);

		return $parser;
	}

	/**
	 * ExecShell::_stop()
	 *
	 * Kind of the "shutdown" callback if really required.
	 *
	 * @param int $status
	 * @return void
	 */
	protected function _stop($status = 0) {
		$this->log('Shell::_stop', 'info', 'exec');

		parent::_stop($status);
	}

}
