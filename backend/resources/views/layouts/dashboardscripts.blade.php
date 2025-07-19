
    <script>
        let registered = false; // Variable to track registration status

        function toggleSidebar() {
            const sidebar = document.getElementById("customSidebar");
            const wrapper = document.getElementById("pageWrapper");
            sidebar.classList.toggle("active");
            wrapper.classList.toggle("sidebar-active");
        }

        document.getElementById('showRegistrationPopup').addEventListener('click', function() {
            if (!registered) {
                const eventName = this.getAttribute('data-event-name');
                document.getElementById('eventName').value = eventName;
                document.getElementById('registrationPopup').style.display = 'block';
            }
        });

        document.querySelector('#registrationPopup .close-popup').addEventListener('click', function() {
            document.getElementById('registrationPopup').style.display = 'none';
        });

        document.getElementById('submitRegistration').addEventListener('click', function() {
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const contact = document.getElementById('contact').value;

            if (fullName && email && contact) {
                console.log('Form data:', { fullName, email, contact });
                alert('Registration submitted successfully!');
                document.getElementById('registrationPopup').style.display = 'none';
                document.getElementById('registrationForm').reset();
                registered = true;
                document.getElementById('showRegistrationPopup').style.display = 'none';
                document.getElementById('alreadyRegistered').style.display = 'inline-block';
            } else {
                alert('Please fill in all fields.');
            }
        });
    </script>
