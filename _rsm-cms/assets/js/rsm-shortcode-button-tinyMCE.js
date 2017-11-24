(function() {
 
    tinymce.PluginManager.add('rsmshortcodes', function( editor )
    {
        var shortcodeValues = [];
        jQuery.each(shortcodes_button, function(i)
        {
            shortcodeValues.push({text: shortcodes_button[i], value:i});
        });
 
        editor.addButton('rsmshortcodes', {
            type: 'listbox',
            text: 'Shortcodes',
            onselect: function(e) {
                alert(e);
            var v = e.control._value;
            alert(v);
            //tinyMCE.activeEditor.selection.setContent('[' + v + '][/' + v + ']');
            tinyMCE.activeEditor.selection.setContent('[' + v + ']');
            },
            values: shortcodeValues
        });
    });
})();