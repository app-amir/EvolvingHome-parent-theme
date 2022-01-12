jQuery(document).ready(function() {
    jQuery("#mobmenubtn").click(function() {
        jQuery(this).toggleClass("opendm");
        jQuery("#mobmenu_cont").toggle(200);
    });
});