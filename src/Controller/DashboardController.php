<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DeviceGroups Controller
 *
 * @property \App\Model\Table\DeviceGroupsTable $DeviceGroups
 * @method \App\Model\Entity\DeviceGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('DeviceGroups');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $deviceGroups = $this->DeviceGroups->find()
            ->orderAsc('DeviceGroups.name')
            ->all();

        $this->set(compact('deviceGroups'));
    }
}
