writeEvents.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'writeevents-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('writeevents') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('writeevents_items'),
                layout: 'anchor',
                items: [{
                    html: _('writeevents_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'writeevents-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    writeEvents.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(writeEvents.panel.Home, MODx.Panel);
Ext.reg('writeevents-panel-home', writeEvents.panel.Home);
