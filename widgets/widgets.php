<?php
function desvertcore_dashboard_widget() {

	if ( current_user_can( 'edit_dashboard' ) ) {

		wp_add_dashboard_widget( 'desvertcoredashbordwidget',
			__( 'DesVert Widgets', 'dashboardwidget' ),
			'desvertcore_dashboardwidget_output',
			'desvertcore_dashboardwidget_configure'
		);

	}else {

		wp_add_dashboard_widget( 'desvertcoredashbordwidget',
			__( 'desvertcore Widgets', 'dashboardwidget' ),
			'desvertcore_dashboardwidget_output'
		);
	}

}
add_action( 'wp_dashboard_setup', 'desvertcore_dashboard_widget' );

function desvertcore_dashboardwidget_output(){

    $count_education = wp_count_posts( 'education' )->publish;
    $count_experience = wp_count_posts( 'experience' )->publish;
    $count_projects = wp_count_posts( 'projects' )->publish;
    $count_service = wp_count_posts( 'service' )->publish;
    

    $post_edit = admin_url(sprintf('edit.php?%s', http_build_query($_GET)));
    $all_education = $post_edit . "post_type=education";
    $all_experience = $post_edit . "post_type=experience";
    $all_projects = $post_edit . "post_type=projects";
    $all_service = $post_edit . "post_type=service";
    $count_output = <<<EOD
        <div class="main">
            <ul>
                <li class="certificate-count"><a href="{$all_education}"><span class="dashicons-before dashicons-welcome-learn-more" aria-hidden="true"></span> {$count_education} Certificates</a></li>
                <li class="experience-count"><a href="{$all_experience}"><span class="dashicons-before dashicons-buddicons-buddypress-logo" aria-hidden="true"></span> {$count_experience} Experience</a></li>
                <li class="projects-count"><a href="{$all_projects}"><span class="dashicons-before dashicons-external" aria-hidden="true"></span> {$count_projects} Projects</a></li>
                <li class="service-count"><a href="{$all_service}"> <span class="dashicons-before dashicons-smiley" aria-hidden="true"></span> {$count_service} Services</a></li>
            </ul>
            <h2 class="hndle ui-sortable-handle">Develop By : <a href='www.redoyit.com'>Md. Redoy Islam</a></h2>	
        </div>
    EOD;
    echo $count_output;

}