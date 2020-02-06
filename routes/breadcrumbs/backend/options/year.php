<?php

Breadcrumbs::for('admin.options.year', function ($trail) {
    $trail->push('Tahun', route('admin.options.year'));
});
