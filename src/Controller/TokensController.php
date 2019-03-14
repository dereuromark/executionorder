<?php

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Exception;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class TokensController extends AppController {

	/**
	 * @var array
	 */
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
	 * @throws \Cake\Http\Exception\NotFoundException
	 */
	public function exception() {
		throw new NotFoundException();
	}

	/**
	 * @return void
	 * @throws \Exception
	 */
	public function model() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}
	}

	/**
	 * @return void
	 * @throws \Exception
	 */
	public function modelNoValidation() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['foo' => 'bar'], ['validate' => false]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}
	}

	/**
	 * @return void
	 * @throws \Exception
	 */
	public function modelNoValidationNoRules() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['foo' => 'bar'], ['validate' => false]);

		$result = $this->Tokens->save($token, ['checkRules' => false]);
		if (!$result) {
			throw new Exception('Save failed');
		}
	}

	/**
	 * @return void
	 * @throws \Exception
	 */
	public function modelMultiSave() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}

		$token = $this->Tokens->newEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}
	}

	/**
	 * @return \Cake\Http\Response|null
	 */
	public function redirecting() {
		$this->log('Controller.action', 'info', 'exec');

		return $this->redirect(['action' => 'index']);
	}

	/**
	 * @return \Cake\Http\Response|null
	 */
	public function add() {
		$token = $this->Tokens->newEntity();

		if ($this->request->is('post')) {
			$token = $this->Tokens->patchEntity($token, $this->request->getData());
			if ($this->Tokens->save($token)) {
				$this->Flash->success('Wonderful');
				return $this->redirect(['action' => 'add']);
			}

			$this->Flash->error('Bad luck!');
		}
		$this->set(compact('token'));
	}

	/**
	 * @param int|null $id
	 * @return \Cake\Http\Response|null
	 */
	public function edit($id = null) {
		$token = $this->Tokens->get($id);

		if ($this->request->is('put')) {
			$token = $this->Tokens->patchEntity($token, $this->request->getData());
			if ($this->Tokens->save($token)) {
				$this->Flash->success('Wonderful');
				return $this->redirect(['action' => 'edit']);
			}

			$this->Flash->error('Bad luck!');
		}
		$this->set(compact('token'));
	}

}
