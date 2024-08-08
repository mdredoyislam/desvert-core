<?php

    //Education Post Custom Columns
    function desvertcore_service_columns( $columns ){
        unset($columns['date']);

        $columns['title'] = __('Services Title', 'desvertcore');
        $columns['servicesIcons'] = __('Services Icons', 'desvertcore');
        $columns['servicesText'] = __('Services Description', 'desvertcore');
        $columns['date'] = __('Date', 'desvertcore');

        return $columns;
    }
    add_filter('manage_service_posts_columns', 'desvertcore_service_columns');

    function desvertcore_service_column_data($column, $post_id){

        if('servicesIcons' == $column){
            //echo get_post_meta($post_id, 'select_icon', true);
            $services_icon = get_field('select_icon');
            $services_icon_output = <<<EOD
                <div class='slide'>
                    <img src="{$services_icon['url']}" alt="{$services_icon['alt']}">
                </div>
            EOD;
            echo $services_icon_output;

        }elseif('servicesText' == $column){
            echo get_the_content();
        }

    }
    add_action('manage_service_posts_custom_column', 'desvertcore_service_column_data', 10, 2);