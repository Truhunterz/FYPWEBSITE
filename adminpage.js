document.addEventListener('DOMContentLoaded', function() {
    const viewSelector = document.getElementById('viewSelector');
    const ctx = document.getElementById('bookingChart').getContext('2d');
    let myChart;

    const colors = {
        monthly: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(139, 69, 19, 0.2)',
            'rgba(83, 102, 255, 0.2)',
            'rgba(249, 159, 64, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(144, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'
        ],
        yearly: [
            'rgba(255, 159, 64, 0.2)',
            'rgba(139, 69, 19, 0.2)',
            'rgba(83, 102, 255, 0.2)',
            'rgba(249, 159, 64, 0.2)',
            'rgba(23, 99, 132, 0.2)'
        ],
        weekly: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(139, 69, 19, 0.2)',
            'rgba(83, 102, 255, 0.2)',
            'rgba(249, 159, 64, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(144, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(139, 69, 19, 0.2)',
            'rgba(83, 102, 255, 0.2)',
            'rgba(249, 159, 64, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(144, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(139, 69, 19, 0.2)',
            'rgba(83, 102, 255, 0.2)',
            'rgba(249, 159, 64, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(144, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(139, 69, 19, 0.2)',
            'rgba(83, 102, 255, 0.2)',
            'rgba(249, 159, 64, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(144, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'
        ],
        daily: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(139, 69, 19, 0.2)'
        ]
    };

    function fetchData(view) {
        fetch('fetch_chart.php')
            .then(response => response.json())
            .then(data => {
                updateChart(data[view], view);
            });
    }

    function updateChart(data, view) {
        let labels, chartData, backgroundColor, borderColor;

        switch(view) {
            case 'yearly':
                labels = Object.keys(data);
                chartData = Object.values(data);
                backgroundColor = colors.yearly;
                borderColor = colors.yearly.map(color => color.replace('0.2', '1'));
                break;
            case 'weekly':
                labels = [];
                chartData = [];
                backgroundColor = [];
                borderColor = [];
                let colorIndex = 0;
                for (let month in data) {
                    for (let week = 1; week <= 4; week++) {
                        labels.push(`${month} Week ${week}`);
                        chartData.push(data[month][week] || 0);
                        backgroundColor.push(colors.weekly[colorIndex % colors.weekly.length]);
                        borderColor.push(colors.weekly[colorIndex % colors.weekly.length].replace('0.2', '1'));
                        colorIndex++;
                    }
                }
                break;
            case 'daily':
                labels = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                chartData = labels.map(day => data[day] || 0);
                backgroundColor = colors.daily;
                borderColor = colors.daily.map(color => color.replace('0.2', '1'));
                break;
            case 'monthly':
            default:
                labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                chartData = labels.map(month => data[month] || 0);
                backgroundColor = colors.monthly;
                borderColor = colors.monthly.map(color => color.replace('0.2', '1'));
                break;
        }

        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Bookings',
                    data: chartData,
                    backgroundColor: backgroundColor,
                    borderColor: borderColor,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    viewSelector.addEventListener('change', function() {
        fetchData(this.value);
    });

    fetchData(viewSelector.value);
});
