<?php

return [
    'post_form' => [
        [
            'name' => 'description',
            'label' => 'Meta description',
            'count_field' => true,
            'helpers' => ['will be used as page description on search engine. Keep it under 155 characters']
        ],
        [
            'name' => 'sample',
            'type' => 'textarea',
            'label' => 'Post sample',
            'count_field' => true,
            'attrs' => ['placeholder'=>'consider ending it in ...'],
            'helpers' => ['will be used as post sample when needed. Keep it interesting, also, keep it consistent as length during your posts']
        ],
        [
            'name' => 'title',
            'label' => 'Title',
            'helpers' => ['will be used as page title, also as meta-title tag']
        ],
        [
            'name' => 'file_photo',
            'type' => 'file',
            'label' => 'Article main photo',
            'preview' => true
        ],
        [
            'name' => 'content',
            'type' => 'textarea',
            'class' => 'd-none ck-editor'
        ],
        [
            'name' => 'category',
            'label' => 'Category',
            'helpers' => ['Target nested groups separing them with "/"']
        ],
        [
            'name' => 'tags',
            'label' => 'Tags',
            'class' => 'tagify-input',
            'attrs' => ['data-endpoint' => '/api/tags?like=', 'data-pattern' => '^[a-zA-Z]+[0-9]*']//
        ],
    ]
];