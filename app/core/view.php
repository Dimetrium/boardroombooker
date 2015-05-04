<?php

class View
{

    function generate ( $content_view, $template_view, $data = null )
    {
        // Calendar and data set
        if ( isset( $data[ 'getDate' ] ) ) {
            $month = $data[ 'getDate' ][ 'mon' ];
            $year = $data[ 'getDate' ][ 'year' ];
            $select_month_control = '';
            $select_year_control = '';

            /* select month control */
            for ( $x = 1; $x <= 12; $x++ ) {
                $select_month_control .=
                    '<option value="' . $x . '"' . ( $x != $month ? '' : ' selected="selected"' ) . '>';
                $select_month_control .=
                    date( 'F', mktime( 0, 0, 0, $x, 1, $data[ 'getDate' ][ 'year' ] ) ) . '</option>';
            }

            /* select year control */
            $year_range = 4;
            for ( $x = ( $data[ 'getDate' ][ 'year' ] - floor( $year_range / 2 ) );
                  $x <= ( $data[ 'getDate' ][ 'year' ] + floor( $year_range / 2 ) );
                  $x++ ) {
                $select_year_control .=
                    '<option value="' . $x . '"' . ( $x != $data[ 'getDate' ][ 'year' ] ? '' :
                        ' selected="selected"' ) . '>';
                $select_year_control .= $x . '</option>';
            }

            /* "next month" link */
            $next_month_link =
                ( $month != 12 ? $month + 1 : 1 ) . '/' . ( $month != 12 ? $year : $year + 1 );

            /* "previous month" link */
            $previous_month_link =
                ( $month != 1 ? $month - 1 : 12 ) . '/' . ( $month != 1 ? $year : $year - 1 );

        }

        // booardroom list
        if ( isset( $data[ 'boardrooms' ] ) ) {
            $boardrooms = $data[ 'boardrooms' ];
            $rooms = '';
            if ( null !== $boardrooms ) {
                foreach ( $boardrooms as $room ) {
                    $rooms .= '<li class="list-group-item">';
                    $rooms .= '<a href="main" onClick="DoPost(' . $room . ')">';
                    $rooms .= '{{BOARDROOM}} # ' . $room;
                    $rooms .= '</a></li>';
                }
            }
        }

        // Employee name selector
        if ( isset( $data[ '0' ][ 'employee_id' ] ) ) {
            $userList = '';
            foreach ( $data as $id => $value ) {
                $userList .= '<option value="';
                $userList .= $value[ 'employee_id' ] . '">';
                $userList .= $value[ 'employee_name' ] . '</option>';
            }
        }

        // Employee table rows
        if ( isset( $data[ '0' ][ 'employee_name' ] ) ) {
            $userTable = '';
            foreach ( $data as $key => $val ) {
                $userTable .= '<tr><td>';
                $userTable .= '<a href="mailto:' . $val[ 'employee_email' ] . '">' . $val[ 'employee_name' ] . '</a>';
                $userTable .= '</td><td>';
                $userTable .= '<a href="employee/del/' . $val[ 'employee_id' ];
                $userTable .= '" onclick="return confirm(\'{{REMOVE_CONFIRM}}\');">{{REMOVE}}</a>';
                $userTable .= '</td><td>';
                $userTable .= '<a href="employee/edit/' . $val[ 'employee_id' ];
                $userTable .= '">{{EDIT}}</a></td></tr>';
            }

        }
        // END Employee table rows

        // Details part
        if ( isset( $data[ 'users' ] ) ) {
            $users = '';
            foreach ( $data[ 'users' ] as $key => $val ) {
                if ( $data[ 'employee_id' ] == $val[ 'employee_id' ] ) {
                    $users .= '<option selected ="" value="';
                    $users .= $val[ 'employee_id' ] . '">' . $val[ 'employee_name' ] . '</option>';
                }
                $users .= '<option value="' . $val[ 'employee_id' ] . '">' . $val[ 'employee_name' ] . '</option>';
            }
        }
        // End Detail part

        // Render a page with replacement chars {{TEXT}}
        ob_start();
        include 'app/views/' . $template_view;
        $html = ob_get_contents();
        ob_end_clean();

        if ( !isset( $_COOKIE[ 'lang' ] ) ) {
            $_COOKIE[ 'lang' ] = 'en';
        }

        if ( isset( $_POST[ 'lang' ] ) ) {
            $lang = $_POST[ 'lang' ];
            setcookie( "lang", $_POST[ 'lang' ], time() + 60 * 60 * 24 * 30, BASE );
        } else {
            $lang = $_COOKIE[ 'lang' ];
        }

        $language = new Lang( $lang );
        // Render translated html
        echo $language->templateRender( $html );

    }

}
