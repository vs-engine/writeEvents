writeEvents.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'writeevents-panel-home',
            renderTo: 'writeevents-panel-home-div'
        }]
    });
    writeEvents.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(writeEvents.page.Home, MODx.Component);
Ext.reg('writeevents-page-home', writeEvents.page.Home);