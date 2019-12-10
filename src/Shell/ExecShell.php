<?php

namespace App\Shell;

use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;

/**
 * Simple cleanup for exec shell
 */
class ExecShell extends Shell {

	/**
	 * @param \Cake\Console\ConsoleIo|null $io
	 */
	public function __construct(ConsoleIo $io = null) {
		parent::__construct($io);

		// Dont send our logging calls to stdout...
		$this->_io->setLoggers(false);

		$this->log('Shell::__construct', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function initialize() {
		parent::initialize();

		$this->log('Shell::initialize', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function startup() {
		parent::startup();

		$this->log('Shell::startup', 'info', 'exec');
	}

	/**
	 * Start the shell and interactive console.
	 *
	 * @return int|null
	 */
	public function test() {
		$this->out('Testing CLI execution order');

		$this->log('Shell::command', 'info', 'exec');
	}

	/**
	 * Start the shell and interactive console.
	 *
	 * @return int|null
	 */
	public function testError() {
		$this->out('Testing CLI execution order');

		$this->log('Shell::command', 'info', 'exec');

		$this->abort('foo bar');
	}

	/**
	 * Prep exec.txt for Results.md.
	 *
	 * @return int|null
	 */
	public function prep() {
		if (!file_exists(LOGS . 'exec.log')) {
			$this->abort('No log file. Nothing to do.');
		}
		$logs = file_get_contents(LOGS . 'exec.log');
		if (!$logs) {
			$this->abort('No log file content. Nothing to do.');
		}

		preg_replace('/.+ Info\s*/', '', $logs);

		if (!is_dir(TMP)) {
			mkdir(TMP, 0770, true);
		}

		file_put_contents(TMP . 'exec.txt', $logs);
		unlink(LOGS . 'exec.log');
		$this->out('Result in: exec.txt');
	}

	/**
	 * Display help for this console.
	 *
	 * @return \Cake\Console\ConsoleOptionParser
	 */
	public function getOptionParser() {
		$parser = new ConsoleOptionParser('console', false);
		$parser->setDescription(
			'For getting README/Results output from exec.log'
		)
		->addSubcommand(
			'test', [
				'help' => 'Test run for CLI',
			]
		)
		->addSubcommand(
			'test_error', [
				'help' => 'Test run for CLI with error case (abort via exception).',
			]
		)
		->addSubcommand(
			'prep', [
				'help' => 'Run this after each test run (CLI or web). This preares the log data for RESULTS.md file.',
			]
		);

		return $parser;
	}

	/**
	 * Kind of the "shutdown" callback if really required.
	 *
	 * @param string $message
	 * @param int $exitCode
	 * @return void
	 */
	public function abort($message, $exitCode = self::CODE_ERROR) {
		$this->log('Shell::abort', 'info', 'exec');

		parent::abort($message, $exitCode);
	}

}
