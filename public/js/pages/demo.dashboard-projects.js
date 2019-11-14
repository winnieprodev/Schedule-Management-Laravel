!function (t) {
    "use strict";
    var r = function () {
        this.$body = t("body"), this.charts = []
    };
    r.prototype.respChart = function (r, a, n, e) {
        Chart.defaults.global.defaultFontColor = "#8391a2", Chart.defaults.scale.gridLines.color = "#8391a2";
        var i = r.get(0).getContext("2d"), s = t(r).parent();
        return function () {
            var o;
            switch (r.attr("width", t(s).width()), a) {
                case"Line":
                    o = new Chart(i, {type: "line", data: n, options: e});
                    break;
                case"Doughnut":
                    o = new Chart(i, {type: "doughnut", data: n, options: e})
            }
            return o
        }()
    }, r.prototype.initCharts = function () {
        var r = [];
        if (t("#task-area-chart").length > 0) {
            r.push(this.respChart(t("#task-area-chart"), "Line", {
                labels: ["Sprint 1", "Sprint 2", "Sprint 3", "Sprint 4", "Sprint 5", "Sprint 6", "Sprint 7", "Sprint 8", "Sprint 9", "Sprint 10", "Sprint 11", "Sprint 12", "Sprint 13", "Sprint 14", "Sprint 15", "Sprint 16", "Sprint 17", "Sprint 18", "Sprint 19", "Sprint 20", "Sprint 21", "Sprint 22", "Sprint 23", "Sprint 24"],
                datasets: [{
                    label: "This year",
                    backgroundColor: "rgba(114, 124, 245, 0.3)",
                    borderColor: "#727cf5",
                    data: [16, 44, 32, 48, 72, 60, 84, 64, 78, 50, 68, 34, 26, 44, 32, 48, 72, 60, 74, 52, 62, 50, 32, 22]
                }]
            }, {
                maintainAspectRatio: !1,
                legend: {display: !1},
                tooltips: {intersect: !1},
                hover: {intersect: !0},
                plugins: {filler: {propagate: !1}},
                scales: {
                    xAxes: [{reverse: !0, gridLines: {color: "rgba(0,0,0,0.05)"}}],
                    yAxes: [{
                        ticks: {stepSize: 10, display: !1},
                        min: 10,
                        max: 100,
                        display: !0,
                        borderDash: [5, 5],
                        gridLines: {color: "rgba(0,0,0,0)", fontColor: "#fff"}
                    }]
                }
            }))
        }
        if (t("#project-status-chart").length > 0) {
            r.push(this.respChart(t("#project-status-chart"), "Doughnut", {
                labels: ["Completed", "In-progress", "Behind"],
                datasets: [{
                    data: [64, 26, 10],
                    backgroundColor: ["#0acf97", "#727cf5", "#fa5c7c"],
                    borderColor: "transparent",
                    borderWidth: "3"
                }]
            }, {maintainAspectRatio: !1, cutoutPercentage: 80, legend: {display: !1}}))
        }
        return r
    }, r.prototype.init = function () {
        var r = this;
        Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif', r.charts = this.initCharts(), t(window).on("resize", function (a) {
            t.each(r.charts, function (t, r) {
                try {
                    r.destroy()
                } catch (t) {
                }
            }), r.charts = r.initCharts()
        })
    }, t.ChartJs = new r, t.ChartJs.Constructor = r
}(window.jQuery), function (t) {
    "use strict";
    t.ChartJs.init()
}(window.jQuery);