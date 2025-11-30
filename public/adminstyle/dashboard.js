document.addEventListener("DOMContentLoaded", function () {

    if (window.salesMonths && window.salesData) {
        const ctx = document.getElementById('salesChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: window.salesMonths,
                datasets: [{
                    label: "Total Penjualan",
                    data: window.salesData,
                    borderWidth: 3,
                    borderColor: "#355CFF",
                    tension: 0.3
                }]
            }
        });
    }

});
