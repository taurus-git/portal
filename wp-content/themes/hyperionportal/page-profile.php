<?php get_header(); ?>
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <?php get_sidebar('main'); ?>
                </div>
                <div class="col-9">
                    <div id="content">
                        <?php
                        if ( isset ($_GET['id']) ){
                            //avatar
                            if( get_avatar($_GET['id'] ) ){
                                echo get_avatar($_GET['id'], 300);
                            }
                            //First Name
                            if( get_the_author_meta('first_name', $_GET['id'] ) ){
                                echo '<br><br>' . "First Name : " . get_the_author_meta('first_name', $_GET['id'] );
                            }
                            //Last Name
                            if( get_the_author_meta('last_name', $_GET['id'] ) ){
                                echo '<br>' . "Last Name : " . get_the_author_meta('last_name', $_GET['id'] );
                            }
                            //Skype
                            if( get_the_author_meta('skype', $_GET['id'] ) ){
                                echo '<br>' . "Skype : " . get_the_author_meta('skype', $_GET['id'] );
                            }
                            //Floor
                            if( get_the_author_meta('floor', $_GET['id'] )){
                                echo '<br>' . "Floor : " . get_the_author_meta('floor', $_GET['id'] );
                            }
                            //BD
                            $birth_date = wp_parse_args( get_the_author_meta( 'birth_date', $_GET['id'] ) );
                            if( $birth_date ){
                                echo '<br>' . "Birth date : ";
                                echo  $birth_date['day'] . ' ' . $birth_date['month'] . ' ' . $birth_date['year'] . '<br>';
                            }

                            //position
                            $positions = json_decode( get_option('position') );
                            $positions_user = get_the_author_meta('position', $_GET['id'] ) ;
                            if( $positions_user ) {
                                foreach ($positions as $position) {
                                    if (in_array($position->id, $positions_user)) {
                                        $pos_res[] = $position->name;
                                    }
                                }
                                $pos_res = implode(', ', $pos_res);
                                echo 'Position : '.$pos_res.'<br>';
                            }

                            //phone
                            $arr_phone = get_the_author_meta('phone', $_GET['id'] );
                            //var_dump( $arr_phone );
                            if( $arr_phone ){
                                for ( $i=0; $i <= count($arr_phone); $i++ ){
                                    if( $arr_phone[$i] == "" ){
                                        unset( $arr_phone[$i] );
                                    }
                                }
                                $users_phones_array = implode( '; ', $arr_phone );
                                echo 'Phone : ' . $users_phones_array . '<br>';
                            }

                            //team
                            $team_id = get_the_author_meta('team', $_GET['id'] );
                            if( $team_id ) {
                                $team_name = $wpdb->get_col("SELECT post_title FROM wp_posts WHERE ID = $team_id");
                                echo "Team : ".$team_name[0].'<br>';
                            }
                            //po
                            if( get_the_author_meta('po', $_GET['id']) ) {
                                $po_id = get_the_author_meta('po', $_GET['id']);
                                $po_name = $wpdb->get_col("SELECT post_title FROM wp_posts WHERE ID = $po_id");
                                echo 'Product owner : '.$po_name[0].'<br>';
                            }
                        } else {
                            echo "Select user ...";
                        }
                        ?>
                    </div>
                </div>
                </div>
            </div>
        </div><!-- #primary -->
    </div><!-- .wrap -->

<?php
wp_footer();

