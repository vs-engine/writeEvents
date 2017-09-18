var writeEvents = function (config) {
    config = config || {};
    writeEvents.superclass.constructor.call(this, config);
};
Ext.extend(writeEvents, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('writeevents', writeEvents);

writeEvents = new writeEvents();