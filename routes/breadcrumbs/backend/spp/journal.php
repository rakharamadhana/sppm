<?php

Breadcrumbs::for('admin.spp.journal', function ($trail) {
    $trail->push('Status Setoran', route('admin.spp.journal'));
});

Breadcrumbs::for('admin.spp.journal.filter', function ($trail) {
    $trail->push('Status Setoran', route('admin.spp.journal.filter'));
});
