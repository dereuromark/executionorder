<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class TokensController extends AppController {

	/**
	 * @return void|\Cake\Network\Response
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
	 * @return void|\Cake\Network\Response
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
