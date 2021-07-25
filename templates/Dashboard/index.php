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
    ]) ?>
    <div class="input-group">
        <?= $this->Form->text('name', [
            'class' => 'form-control',
            'placeholder' => __('Enter new group name...'),
            'aria-label' => __('Enter new group name...'),
            'aria-describedby' => 'button-search',
            'require' => true,
        ]) ?>
        <button class="btn btn-primary" id="button-search" type="submit"><?= __('Create New Group') ?></button>
    </div>
    <?= $this->Form->end() ?>
    <hr/>
</div>
<?php foreach ($deviceGroups as $deviceGroup): ?>
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title"><?= h($deviceGroup->name) ?></h4>
            <div class="row row-cols-1 row-cols-md-2 g-4">

            </div>
        </div>
    </div>
<?php endforeach; ?>
