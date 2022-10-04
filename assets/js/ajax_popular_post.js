jQuery( document ).ready( function(){
    jQuery( function($) {
      jQuery( 'select.borderless' ).on( 'change', function() {
         let post_area = $(this).closest('.container').find('div[lc-helper="posts-loop"]');
         let type = $(this).val();
         let cat_id = post_area.attr('cat_id');

         post_area.html('<span class="spinner-grow spinner-grow-sm me-1r" role="status" aria-hidden="true"></span>Loading...');

         let data = {
            'action': 'load_PopularPost_by_ajax',
            'type': type,
            'cat_id': cat_id,
            'security': popularpost.security
          };

        jQuery.post( popularpost.ajaxurl, data, function( response ) {
          if( $.trim(response) != '' ) {
            post_area.html( '<div class="row">' + response + '</div>' );
          } else {
            post_area.html( '獲取文章失敗！' );
          }
        });
      });
    });
  });