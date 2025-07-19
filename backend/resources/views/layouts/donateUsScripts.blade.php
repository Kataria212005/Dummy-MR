<script>
    // Form submission handler
    document.addEventListener('DOMContentLoaded', function() {
        const paymentModeSelect = document.getElementById("paymentMode");
        const transactionIdField = document.getElementById("transactionId");
        const transactionIdContainer = document.getElementById("transactionIdContainer");
        const transactionRequiredMark = document.getElementById("transactionRequiredMark");
        
        // Function to handle payment mode change
        function handlePaymentModeChange() {
            const selectedMode = paymentModeSelect.value;
            if (selectedMode === "online") {
                transactionIdField.setAttribute("required", "required");
                transactionRequiredMark.style.display = "inline";
            } else {
                transactionIdField.removeAttribute("required");
                transactionRequiredMark.style.display = "none";
            }
        }
        
        // Add event listener for payment mode changes
        paymentModeSelect.addEventListener("change", handlePaymentModeChange);
        
        // Initialize on page load
        handlePaymentModeChange();
        
        document.getElementById("submitDonation").addEventListener("click", function () {
            const form = document.getElementById("donationForm");
            
            // Check form validity
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            
            // Submit the form to the controller
            form.submit();
        });

        // If there's a success message, display the thank you container
        @if(session('success'))
            document.getElementById("thankYouMessage").style.display = "block";
            document.getElementById("thankYouMessage").scrollIntoView({
                behavior: "smooth",
            });
        @endif
    });
</script>
