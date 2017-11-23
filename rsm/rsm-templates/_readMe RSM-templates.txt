//
RSM TEMPLATES folder:

This folder can be used to copy templates in from the the quantus-cms plugin:
/wp-content/plugins/quantus-cms/templates/

-- These templates contain all of the markup for the included shortcodes and widgets.
-- Overriding these templates allows you to add in custom fields or markup for specific components if this site build.

How WordPress will locate the called template.
* Search Order:
* 1. /themes/theme-name/rsm-templates/$template_name
* 2. /themes/theme-name/$template_name
* 3. /plugins/quantus-cms/templates/$template_name.