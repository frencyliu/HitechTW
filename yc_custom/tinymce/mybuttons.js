(function() {
    /* Register the buttons */
    tinymce.create('tinymce.plugins.MyButtons', {
         init : function(ed, url) {
              /**
              * Inserts shortcode content
              */
              ed.addButton( 'button_eek', {
                   title : '插入聯絡表單',
                   image : '../wp-content/themes/HiTechTW/yc_custom/tinymce/form.png',
                   onclick : function() {
                        ed.selection.setContent('[ht_form_sec]');
                   }
              });
         },
         createControl : function(n, cm) {
              return null;
         },
    });
    /* Start the buttons */
    tinymce.PluginManager.add( 'my_button_script', tinymce.plugins.MyButtons );
})();