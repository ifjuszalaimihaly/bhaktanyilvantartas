<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="small-3 medium-2 large-2 columns" id="actions-sidebar">
    <ul class="menu vertical">
        <li class="menu-text"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tb'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bhaktas'), ['controller' => 'Bhaktas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bhakta'), ['controller' => 'Bhaktas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tbs index small-9 medium-10 large-10 columns content">
    <h3><?= __('Tbs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tbs as $tb): ?>
            <tr>
                <td><?= $this->Number->format($tb->id) ?></td>
                <td><?= h($tb->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tb->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tb->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tb->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tb->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination text-center">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p class="text-center"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
