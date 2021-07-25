<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeviceGroup[]|\Cake\Collection\CollectionInterface $deviceGroups
 */
?>
<div class="col">
<?= $this->Form->create(null, [
    'url' => [
        'controller' => 'DeviceGroups',
        'action' => 'add'
    ],
])?>
<div class="input-group">
    <?= $this->Form->text('name', [
        'class' => 'form-control',
        'placeholder' => __('Enter new group name...'),
        'aria-label' => __('Enter new group name...'),
        'aria-describedby' => 'button-search',
        'require' => true,
    ])?>
    <button class="btn btn-primary" id="button-search" type="submit"><?= __('Create New Group')?></button>
</div>
<?= $this->Form->end()?>
    <hr />
</div>
<?php foreach ($deviceGroups as $deviceGroup):
$addDeviceUrl = $this->Url->build([
    'controller' => 'Devices',
    'action' => 'add',
    $deviceGroup->id,
]);
?>
<div class="card mb-4">
  <div class="card-body">
    <h4 class="card-title"><?= h($deviceGroup->name)?></h4>
      <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($deviceGroup->devices as $device):?>
          <div class="col">
              <div class="card h-100">
                  <div class="card-body" style="text-align: center">
                      <div class="form-check form-switch pull-right">
                          <?= $this->Device->checkbox($device)?>
                      </div>
                      <?= $this->Device->image($device->type)?>
                      <h5 class="card-title mt-2"><?= h($device->name)?></h5>
                      <small>Code: <?= h($device->id)?></small>
                      <?= $this->Form->postLink(
                          __('Delete'),
                          [
                              'controller' => 'Devices',
                              'action' => 'delete', $device->id
                          ],
                          [
                              'confirm' => __('Are you sure you want to delete # {0}?', $device->id),
                              'class' => 'btn btn-link'
                          ]
                      ) ?>
                  </div>
              </div>
          </div>
      <?php endforeach;?>
          <div class="col">
              <div class="card h-100">
                  <a href="<?= $addDeviceUrl?>">
                  <div class="card-body mt-4" style="text-align: center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                      <h5 class="card-title mt-2"><?= __('Add New Device')?></h5>
                  </div>
                  </a>
              </div>
          </div>
      </div>
  </div>
</div>
<?php endforeach;?>
