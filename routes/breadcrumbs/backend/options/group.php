<?php

Breadcrumbs::for('admin.options.group', function ($trail) {
    $trail->push('Group', route('admin.options.group'));
});
