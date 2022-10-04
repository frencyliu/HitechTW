jQuery( document ).ready( function(){
    var page = 2;
    jQuery( function($) {
      jQuery( 'body' ).on( 'click', '.loadmore', function() {
        jQuery( '.loadmore' ).html('<span class="spinner-grow spinner-grow-sm me-1r" role="status" aria-hidden="true"></span>Loading...');
        var data = {
          'action': 'load_posts_by_ajax',
          'page': page,
          'obj': blog.obj,
          'security': blog.security
        };
        let total_page = jQuery( '.loadmore' ).attr('total_page');
        if(page >= total_page){
            jQuery( '.loadmore' ).hide();
        }

        jQuery.post( blog.ajaxurl, data, function( response ) {
          if( $.trim(response) != '' ) {
            jQuery( '.loadmore' ).text('Load More');
            jQuery( '.blog-posts' ).append( response );
            page++;
          } else {
            jQuery( '.loadmore' ).hide();
            jQuery( ".no-more-post" ).html( "No More Post Available" );
          }
        });
      });
    });
  });