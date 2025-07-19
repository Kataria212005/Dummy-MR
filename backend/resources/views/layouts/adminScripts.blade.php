<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("Chart script is running");

        const ctx = document.getElementById('donationsChart');

        if (!ctx) {
            console.error("Canvas element not found!");
            return;
        }

        let donationsData = @json($donations);
        if (!donationsData || donationsData.length === 0) {
            console.warn("No donation data available");
            return;
        }

        // Extract donor IDs and donation amounts
        let labels = donationsData.map(d => `Donor #${d.id}`); // Use Donor ID as X-axis label
        let donationAmounts = donationsData.map(d => d.amount);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Set donor IDs on X-axis
                datasets: [{
                    label: 'Donations ($)',
                    data: donationAmounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Donor ID' // Label for X-axis
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Amount ($)'
                        }
                    }
                }
            }
        });
    });
</script>
