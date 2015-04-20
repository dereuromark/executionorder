<?php

namespace App\Controller;

use Cake\Network\Exception\NotFoundException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class TokensController extends AppController {

	public $components = ['Foo'];

	/**
	 * TokensController::index()
	 *
	 * @return void
	 */
	public function index() {
		$this->log('Controller.action', 'info', 'exec');

		$this->helpers[] = 'Foo';
	}

	/**
	 * @return void
	 */
	public function exception() {
		throw new NotFoundException();
	}

	/**
	 * TokensController::model()
	 *
	 * @return void
	 */
	public function model() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new \Exception('Save failed');
		}
	}

	/**
	 * TokensController::model()
	 *
	 * @return void
	 */
	public function modelNoValidation() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['foo' => 'bar'], ['validate' => false]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new \Exception('Save failed');
		}
	}

	/**
	 * TokensController::model()
	 *
	 * @return void
	 */
	public function modelNoValidationNoRules() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['foo' => 'bar'], ['validate' => false]);

		$result = $this->Tokens->save($token, ['checkRules' => false]);
		if (!$result) {
			throw new \Exception('Save failed');
		}
	}

	/**
	 * TokensController::model()
	 *
	 * @return void
	 */
	public function modelMultiSave() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new \Exception('Save failed');
		}

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new \Exception('Save failed');
		}
	}

	/**
	 * TokensController::index()
	 *
	 * @return void
	 */
	public function redirecting() {
		$this->log('Controller.action', 'info', 'exec');

		return $this->redirect(['action' => 'index']);
	}

	/**
	 * @return void
	 */
	public function add() {
		$token = $this->Tokens->newEntity();

		if ($this->request->is('post')) {
			$token = $this->Tokens->patchEntity($token, $this->request->data);
			if ($this->Tokens->save($token)) {
				$this->Flash->success("Wonderful");
				return $this->redirect(['action' => 'add']);
			} else {
				$this->Flash->error("Bad luck!");
			}
		}
		$this->set(compact('token'));
	}

	/**
	 * @return void
	 */
	public function edit($id = null) {
		$token = $this->Tokens->get($id);

		if ($this->request->is('put')) {
			$token = $this->Tokens->patchEntity($token, $this->request->data);
			if ($this->Tokens->save($token)) {
				$this->Flash->success("Wonderful");
				return $this->redirect(['action' => 'edit']);
			} else {
				$this->Flash->error("Bad luck!");
			}
		}
		$this->set(compact('token'));
	}

}
