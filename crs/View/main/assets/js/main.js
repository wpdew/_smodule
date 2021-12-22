// Импортируем необходимые js-файлы Bootstrap 4
//= ../../../../node_modules/bootstrap/dist/js/bootstrap.min.js
//= script.js



jQuery(document).ready( function($){
	
    
    
    
    $('input.color-picker').wpColorPicker();
    



    $( document ).on( 'click', '.ss-rm-locked', function(e){
        e.stopPropagation();
        e.preventDefault();

        $(this).pointer({
            content: '<h3>This is PRO feature. Please upgrade your plugin...</h3>' +
                '<p><a class="primary button" href="https://wpdew.ru/" target="_blank">Buy Plugin Pro</a> ' +
                '</p>',

            close: function() {
                //
            }
        }).pointer('open');
        return false;

    });
    
    
    
    
    
});
