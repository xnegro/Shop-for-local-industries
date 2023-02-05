/* globals jQuery */
(function ($) {
    'use strict';

    $.fn.barChart = function (options) {
        var self = this,
            settings = $.extend({
                // defaults
                type: 'horizontal',
                easing: 'swing',
                animationSpeed: 2000,
                rowClass: 'barChart__row',
                fillClass: 'barChart__barFill'
            }, options);

        (function buildChart() {
            var rows = self.find('.' + settings.rowClass),
                values = [],
                maxDataValue;

            // Get value from each row
            rows.each(function (index, element) {
                var item = $(element),
                    value = parseInt(item.data('value'), 10);

                values.push(value);
            });

            // Find highest value
            maxDataValue = Math.max.apply(null, values);

            // Fill bars
            rows.each(function (index, element) {
                var item = $(element),
                    fill = item.find('.' + settings.fillClass),
                    value = parseInt($(element).data('value'), 10),
                    percentage = 0;

                // calcualte percentage comapred to max value
                if (value !== 0) {
                    percentage = (value / maxDataValue) * 100;
                }

                // fill bar
                if (settings.type === 'vertical') {
                    fill.animate({height: percentage + '%'}, settings.animationSpeed, settings.easing);
                } else {
                    fill.animate({width: percentage + '%'}, settings.animationSpeed, settings.easing);
                }
            });
        }());
        
        // Chainable
        return self;
    };
}(jQuery));
