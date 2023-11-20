jQuery(document).ready(function($){

    /* Call the Color Picker */
    $( ".color-picker-wrapper-curly" ).each(function(){
        const item = this
        $( ".color-picker", this ).wpColorPicker({
            change: function(_event, ui){
                $('.curly_color', item).val(ui.color.to_s( 'rgba' )).trigger('change')
            }
        });
    })

});