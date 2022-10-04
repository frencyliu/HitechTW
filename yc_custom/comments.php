<?php


add_filter( 'comment_form_fields', 'yc_comment_fields_custom_order' );
function yc_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['comment'] = $comment_field;
    //$fields['submit_button'] = $comment_field;
/*
    echo '<pre>';
    var_dump($fields);
    echo '</pre>';
*/
    // done ordering, now return the fields:*/
    return $fields;
}

add_filter( 'get_comment_date', 'yc_custom_comment_date', 10, 3);
function yc_custom_comment_date( $date, $d, $comment ) {
    $orgDate = $comment->comment_date;
    $newDate = date("Y.m.d ", strtotime($orgDate));
    //var_dump($newDate);
    return $newDate;
}


