<?php

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Exception;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @property \App\Model\Table\TokensTable $Tokens
 */
class TokensController extends AppController {

	/**
	 * @return void
	 */
	public function initialize(): void {
		parent::initialize();

		$this->loadComponent('Foo');
	}

	/**
	 * TokensController::index()
	 *
	 * @return void
	 */
	public function index() {
		$this->log('Controller.action', 'info', 'exec');

		$this->viewBuilder()->setHelpers(['Foo']);
	}

	/**
	 * @throws \Cake\Http\Exception\NotFoundException
	 * @return void
	 */
	public function exception() {
		throw new NotFoundException();
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function modelFind() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->find()->first();
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function modelSave() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEmptyEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function modelDynamically() {
		$this->log('Controller.action', 'info', 'exec');

		$this->Tokens->removeBehavior('Alpha');
		$this->Tokens->addBehavior('Alpha');

		$token = $this->Tokens->newEmptyEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}

		$this->render('model');
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function modelPatch() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEmptyEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);
		if ($token->getErrors()) {
			throw new Exception('Patch failed: ' . print_r($token->getErrors(), true));
		}
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function modelNoValidation() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEmptyEntity();
		$token = $this->Tokens->patchEntity($token, ['foo' => 'bar'], ['validate' => false]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed: ' . print_r($token->getErrors(), true));
		}
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function modelNoValidationNoRules() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEmptyEntity();
		$token = $this->Tokens->patchEntity($token, ['foo' => 'bar'], ['validate' => false]);

		$result = $this->Tokens->save($token, ['checkRules' => false]);
		if (!$result) {
			throw new Exception('Save failed');
		}
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function modelMultiSave() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEmptyEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}

		$token = $this->Tokens->newEmptyEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function modelDelete() {
		$this->log('Controller.action', 'info', 'exec');

		$token = $this->Tokens->newEmptyEntity();
		$token = $this->Tokens->patchEntity($token, ['type' => 'x', 'key' => 'x', 'content' => 'foo', 'used' => 0, 'unlimited' => 0]);

		$result = $this->Tokens->save($token);
		if (!$result) {
			throw new Exception('Save failed');
		}

		$token = $this->Tokens->get($result->id);
		$result = $this->Tokens->delete($token);
		if (!$result) {
			throw new Exception('Delete failed');
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
		$token = $this->Tokens->newEmptyEntity();

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
