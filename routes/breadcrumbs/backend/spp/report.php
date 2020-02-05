<?php

Breadcrumbs::for('admin.spp.report', function ($trail) {
    $trail->push('Rekap Setoran', route('admin.spp.report'));
});

Breadcrumbs::for('admin.spp.report.filter', function ($trail) {
    $trail->push('Rekap Setoran', route('admin.spp.report.filter'));
});
