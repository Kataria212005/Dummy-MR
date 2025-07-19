<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('donationChart').getContext('2d');
        const donationChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Child Care Home', 'Cleanliness Program', 'Helping People', 'Excursions', 'Feeding the Poor'],
                datasets: [{
                    data: [40, 35, 10, 10, 5],
                    backgroundColor: [
                        '#0d6efd',  // Blue - Child Care
                        '#d63384',  // Pink - Cleanliness
                        '#6c757d',  // Gray - Helping People
                        '#ffc107',  // Yellow - Excursions
                        '#20c997',  // Teal - Feeding
                    ],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        // Learn more buttons
        const learnMoreButtons = document.querySelectorAll('.btn-learn-more');
        learnMoreButtons.forEach(button => {
            button.addEventListener('click', function() {
                alert('Learn more clicked! This would link to a detailed page.');
            });
        }); 
    });
</script>