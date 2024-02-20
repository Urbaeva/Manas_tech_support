<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Statistics Chart</title>
    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="videoChart" width="400" height="200"></canvas>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Replace 'video_id' with the actual video ID you want statistics for
        fetch(`/api/videos/${video_id}/statistics`)
            .then(response => response.json())
            .then(data => {
                createChart(data);
            })
            .catch(error => {
                console.error('Error fetching video statistics:', error);
            });
    });

    function createChart(data) {
        var ctx = document.getElementById('videoChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Views', 'Likes', 'Dislikes'], // Customize labels based on your data
                datasets: [{
                    label: 'Video Statistics',
                    data: data,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 205, 86, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 205, 86, 1)'],
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
</script>

</body>
</html>
