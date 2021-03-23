<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'carts' => [
        'name' => 'Carts',
        'index_title' => 'Carts List',
        'create_title' => 'Create Cart',
        'edit_title' => 'Edit Cart',
        'show_title' => 'Show Cart',
        'inputs' => [
            'user_id' => 'User Id',
            'identifier' => 'Identifier',
            'product_id' => 'Product Id',
            'name' => 'Name',
            'price' => 'Price',
            'quantity' => 'Quantity',
        ],
    ],

    'products' => [
        'name' => 'Products',
        'index_title' => 'Products List',
        'create_title' => 'Create Product',
        'edit_title' => 'Edit Product',
        'show_title' => 'Show Product',
        'inputs' => [
            'cateory_id' => 'Cateory Id',
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'price' => 'Price',
            'size' => 'Size',
            'weight' => 'Weight',
        ],
    ],

    'categories' => [
        'name' => 'Categories',
        'index_title' => 'Categories List',
        'create_title' => 'Create Category',
        'edit_title' => 'Edit Category',
        'show_title' => 'Show Category',
        'inputs' => [
            'id' => 'Id',
            'name' => 'Name',
            'parent_id' => 'Parent Id',
        ],
    ],
];
