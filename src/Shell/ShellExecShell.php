<?php

namespace App\Shell;

use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Console\Shell;
use Cake\ORM\Locator\LocatorInterface;

/**
 * Shell execution testing.
 */
class ShellExecShell extends Shell {

	/**
	 * @param \Cake\Console\ConsoleIo|null $io
	 * @param \Cake\ORM\Locator\LocatorInterface|null $locator
	 */
	public function __construct(?ConsoleIo $io = null, ?LocatorInterface $locator = null) {
		parent::__construct($io, $locator);

		// Dont send our logging calls to stdout...
		$this->_io->setLoggers(false);

		$this->log('Shell::__construct', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function initialize(): void {
		parent::initialize();

		$this->log('Shell::initialize', 'info', 'exec');
	}

	/**
	 * @return void
	 */
	public function startup(): void {
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
	public function getOptionParser(): ConsoleOptionParser {
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
				'help' => 'Run this after each test run (CLI or web). This prepares the log data for RESULTS.md file.',
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
	public function abort(string $message, int $exitCode = self::CODE_ERROR): void {
		$this->log('Shell::abort', 'info', 'exec');

		parent::abort($message, $exitCode);
	}

}
