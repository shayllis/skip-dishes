<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Dishes Controller
 *
 * @property \App\Model\Table\DishesTable $Dishes
 *
 * @method \App\Model\Entity\Dish[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DishesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
				$query = $this->Dishes
					->find()
					->contain([
						'Categories'
					]);

				$restaurantId = (int) $this->request->getParam('restaurant_id');
				$categoryId = (int) $this->request->getParam('category_id');

				if ($restaurantId) {
					$query->andWhere([
						'Dishes.restaurant_id' => $restaurantId
					]);
				}

				if ($categoryId) {
					$query->matching(
						'Categories',
						function ($q) use ($categoryId){
							return $q->andWhere([
								'Categories.id' => $categoryId
							]);
						}
					);
				}

        $dishes = $this->paginate($query);

        $this->set('dishes',[
					'total' => $query->count(),
					'items' => $query->toArray()
					]);
				$this->set('_serialize', 'dishes');
    }

    /**
     * View method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dish = $this->Dishes->get($id, [
            'contain' => ['Restaurants', 'CategoriesDishes']
        ]);

        $this->set('dish', $dish);
				$this->set('_serialize', 'dish');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
						$dish = $this->Dishes->newEntity();
            $dish = $this->Dishes->patchEntity($dish, $this->request->getData());
            if ($this->Dishes->save($dish)) {
            }
						$this->set('_serialize', 'dish');
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dish = $this->Dishes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dish = $this->Dishes->patchEntity($dish, $this->request->getData());
            if ($this->Dishes->save($dish)) {
            }
        }
        $this->set('dish');
				$this->set('_serialize', 'dish');
    }

    /**
     * Delete method
     *
     * @param string|null $id Dish id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
				$this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $dish = $this->Dishes->get($id);
    }
}
