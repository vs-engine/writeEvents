Ext.onReady(function () {
    writeEvents.config.connector_url = OfficeConfig.actionUrl;

    var grid = new writeEvents.panel.Home();
    grid.render('office-writeevents-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});