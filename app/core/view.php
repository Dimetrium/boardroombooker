<?php

class View
{

    function generate ( $content_view, $template_view, $data = null )
    {

        $month = $data[ 'getDate' ][ 'mon' ];
        $year = $data[ 'getDate' ][ 'year' ];
        $boardrooms = $data[ 'boardrooms' ];
        
        /* select month control */
        for ( $x = 1; $x <= 12; $x++ ) {
            $select_month_control .= '<option value="' . $x . '"' . ( $x != $month ? '' : ' selected="selected"' ) . '>' . date( 'F', mktime( 0, 0, 0, $x, 1, $data[ 'getDate' ][ 'year' ] ) ) . '</option>';
        }
        
        /* select year control */
        $year_range = 7;
        for ( $x = ( $data[ 'getDate' ][ 'year' ] - floor( $year_range / 2 ) ); $x <= ( $data[ 'getDate' ][ 'year' ] + floor( $year_range / 2 ) ); $x++ ) {
            $select_year_control .= '<option value="' . $x . '"' . ( $x != $data[ 'getDate' ][ 'year' ] ? '' : ' selected="selected"' ) . '>' . $x . '</option>';
        }
        
        /* "next month" control */
        $next_month_link = ( $month != 12 ? $month + 1 : 1 ) . '/' . ( $month != 12 ? $year : $year + 1 );
        
        /* "previous month" control */
        $previous_month_link = ( $month != 1 ? $month - 1 : 12 ) . '/' . ( $month != 1 ? $year : $year - 1 );
        
        /* booardroom list */
        if (null !== $boardrooms){
            foreach ( $boardrooms as $room ) {
                $rooms .= '<li class="list-group-item"><a href="main" onClick="DoPost(' . $room . ')">Boardroom # ' . $room . '</a></li>';
            }
        }

        var_dump($data['0']['employee_id']);
        if ( !empty($data['0']['employee_id']) ) {
            foreach ( $data as $id=>$value ) {
                $userList .= '<option value="'.$value['employee_id'].'">'.$value['employee_name'].'</option>';
            }
        }

        ob_start();
        include 'app/views/' . $template_view;
        $hz = ob_get_contents();
        ob_end_clean();

        $lang = 'en';
        $language = new Lang( $lang );
        $langArray = $language->getLang();
        $language->addToReplace( $langArray );
        echo $language->templateRender( $hz );

    }


}
