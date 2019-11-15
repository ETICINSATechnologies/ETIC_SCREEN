jQuery(document).ready(function($) {

    $('.switch_options').each(function() {
        //This object
        var obj = $(this);

        var enb = obj.children('.switch_enable'); //cache first element, this is equal to ON
        var dsb = obj.children('.switch_disable'); //cache first element, this is equal to OFF
        var input = obj.children('input'); //cache the element where we must set the value
        var input_val = obj.children('input').val(); //cache the element where we must set the value

        /* Check selected */
        if (0 == input_val) {
            dsb.addClass('selected');
        }
        else if (1 == input_val) {
            enb.addClass('selected');
        }

        //Action on user's click(ON)
        enb.on('click', function() {
            $(dsb).removeClass('selected'); //remove "selected" from other elements in this object class(OFF)
            $(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(ON) 
            $(input).val(1).change(); //Finally change the value to 1
        });

        //Action on user's click(OFF)
        dsb.on('click', function() {
            $(enb).removeClass('selected'); //remove "selected" from other elements in this object class(ON)
            $(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(OFF) 
            $(input).val(0).change(); // //Finally change the value to 0
        });

    });

    /** Reorder Home Page Sections **/
    $('#ed-sections-reorder').sortable({
        cursor: 'move',
        axis: 'y',
        update: function(event, ui) {
            var section_ids = '';
            $('#ed-sections-reorder li').css('cursor','default').each(function() {
            var section_id = jQuery(this).attr( 'data-section-name' );
            section_ids = section_ids + section_id + ',';            
            });
            $('#shortui-order').val(section_ids);
            $('#shortui-order').trigger('change');
        }
    });

});//document.ready close