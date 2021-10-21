define([
    "jquery",
    "ko",
    "uiClass",
    "uiComponent",
    'mage/translate'
], function ($, ko, Class, Component) {
    'use strict';
    return Component.extend({
        defaults: {
            template: 'Luvina_Test/report/gird',
            json: '',
        },

        initialize: function () {
            this._super();
            this.initObservable;
        },

        /**
         * Initialize observable properties
         */
        initObservable: function () {
            var self = this;
            this._super();
            var json = self.json;
            this.processData(json)

            return this;
        },

        processData: function (data) {
            var self = this;
            this.items = ko.observableArray();
            var map = $.map(data,function (data) {
                return new Item(data);
            });
            self.items(map);
        }
    })

    function Item(data) {
        var self = this;
        var pattern =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
        var checkBirthday = pattern.test(data.birthday);
        if (!checkBirthday) {
            self.birthday = ko.observable(data.birthday);
            self.dev = ko.observable(data.dev);
            self.name = ko.observable(data.name);
            self.staff_id = ko.observable(data.staff_id);
            self.point = ko.observable(data.point);
        }
        return self;
    }
});
