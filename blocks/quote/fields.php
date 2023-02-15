<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_quote_block',
    'title' => 'Quote Block',
    'fields' => array(
        array(
            'key' => 'field_quote_text',
            'label' => 'Quote Text',
            'name' => 'quote_text',
            'type' => 'textarea',
            'required' => 1,
        ),
        array(
            'key' => 'field_author_name',
            'label' => 'Author Name',
            'name' => 'author_name',
            'type' => 'text',
            'required' => 1,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'saber-components/quote',
            ),
        ),
    ),
));

endif;

?>
