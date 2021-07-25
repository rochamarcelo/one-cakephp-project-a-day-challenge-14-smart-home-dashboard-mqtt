<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\Query;

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
            ->contain(['Devices' => function(Query $query) {
                return $query->orderAsc('Devices.name');
            }])
            ->orderAsc('DeviceGroups.name')
            ->all();

        $this->set(compact('deviceGroups'));
    }
}
