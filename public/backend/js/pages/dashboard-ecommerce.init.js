$(document).ready(function () {
    const $chartEl = $('#store-visits-source');

    // Ambil data dari atribut data-*
    const series = $chartEl.data('series');
    const labels = $chartEl.data('labels');
    const colors = $chartEl.data('colors');

    const options = {
        chart: {
            height: 333,
            type: 'donut'
        },
        series: series,
        labels: labels,
        legend: { position: "bottom" },
        stroke: { show: !1 },
        dataLabels: { dropShadow: { enabled: !1 } },
        colors: colors
    };

    const chart = new ApexCharts($chartEl[0], options);
    chart.render();
});
