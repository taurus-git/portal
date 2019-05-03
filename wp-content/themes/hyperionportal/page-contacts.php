<?php get_header(); ?>
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php get_sidebar('main'); ?>
            </div>
            <div class="col-9">
                <div id="content">
                    <form action="" method="get" id="search-form">
                        <legend>Please input some information to search:</legend>
                            <input style="width: 90%" type="search" name="site_search" value="" id="site_search">
                            <button id="search_button" type="submit">Search</button>
                        <div>
                            <label for="name_id_radio">Name</label>
                            <input type="radio" id="name_id_radio" name="name_radio" value="search_name" checked>

                            <label for="skype_id_radio">Skype</label>
                            <input type="radio" id="skype_id_radio" name="name_radio" value="search_skype">

                            <label for="nickname_id_radio">Nickname</label>
                            <input type="radio" id="nickname_id_radio" name="name_radio" value="search_nickname">
                        </div>
                    </form>
                    <hr>
                </div>
                <h4>Fast links</h4>
                <p>Get all users:</p>
                <div class="row">
                    <div class="col-3">
                        <form action="" method="get" id="floor-form">
                            <h4>On the floor </h4>
                            <select name="select_floor" id="floor_id_select"> <?php
                                $floors = get_option('floor');

                                for ($i = 1; $i <= 10; $i++) {
                                    $active = ( in_array("$i",  $floors) ) ? 'selected' : '';
                                    if ($active) {
                                        echo '<option id="floor" type="number" name="floor" value="' . $i . '">' . $i . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <input id="get_users_on_the_floor" type="submit" name="submit" value="Go" />
                        </form>
                    </div>
                    <div class="col-3">
                        <h4>By Team</h4>
                        <?php
                        $args = array(
                            'post_type'      => 'team',
                            'posts_per_page' => 999,
                            'order'          => 'ASC',
                            'orderby'        => 'none',
                        );
                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();

                                echo '<button type="button" class="btn btn-outline-dark btn-sm">'
                                    . get_the_title() . '</button>';
                            }
                        } else {
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="col-3">
                        <h4>By Position</h4>
                        <?php


                        ?>
                    </div>
                    <div class="col-3">
                        <h4>By BD month:</h4>
                    </div>
                </div>
                <hr>
                <div id="search_results_container">
                    <?php
                    $results = $wpdb->get_results( "
                        SELECT
                        u.ID AS id,
                        um.meta_value AS first_name,
                        um1.meta_value AS last_name,
                        wp.post_title AS team,
                        um2.meta_value AS positions
                        FROM wp_users u
                        INNER JOIN wp_usermeta um ON id=um.user_id
                        AND um.meta_key='first_name'
                        INNER JOIN wp_usermeta um1 ON id=um1.user_id
                        AND um1.meta_key='last_name'
                        INNER JOIN wp_usermeta um2 ON id=um2.user_id
                        AND um2.meta_key='position'
                        INNER JOIN wp_usermeta um3 ON id=um3.user_id
                        AND um3.meta_key='team'
                        INNER JOIN wp_posts wp ON wp.ID=um3.meta_value
                        AND um3.meta_key='team'
                        ORDER BY team ASC
                        ;" );

                    $res = '';
                    foreach ($results as $result) {
                        if ($res != $result->team) {
                            $res = $result->team;
                            echo '<b>' . $res . '</b><br>';
                        }
                        echo '<p>' . get_wp_user_avatar( $result->id,'user-thumb' ) .
                            ' ' . $result->first_name . ' ' . $result->last_name . '</p>';

                        $users_positions_array = array();
                        $users_positions_array = get_the_author_meta('position', $result->id );
                        $positions = json_decode( get_option('position') );

                        foreach ($positions as $position) {
                            $user_positions = in_array($position->id, $users_positions_array);
                            if ($user_positions) {
                                echo '<pre>'. $position->name . '</pre>';
                            }
                        }
                        echo '<hr><br>';
                    }
                    ?>
                </div>
            </div>
        </div>
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
wp_footer();