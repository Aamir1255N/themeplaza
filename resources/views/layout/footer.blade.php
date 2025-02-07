<div class="container">
    <hr />

    <p class="text-center">
        <small>
            <a href="/contact">Contact</a> &middot;
            <a href="/terms">Terms of Service</a>
            <br />
            &copy; 2025 Theme Plaza<br />
            <span class="text-muted">Theme Plaza is in no way affiliated with Nintendo or any associated
                parties.<br />
                Copyrighted material can be reported using the email in our <a href="/terms">Terms of
                    Service</a>.</span>
        </small>
    </p>


</div>

</div> <!-- container-fluid -->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4TQ6719SRV"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-4TQ6719SRV');
</script>

<script src="{{asset('assets/js/holder.min416f.js?1500644593')}}"></script>
<script src="{{asset('assets/js/jquery.min416f.js?1500644593')}}"></script>
<script src="{{asset('assets/js/tether.min416f.js?1500644593')}}"></script>
<script src="{{asset('assets/js/bootstrap.min416f.js?1500644593')}}"></script>
<script src="{{asset('assets/js/appdb44.js?1544224878')}}"></script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const downloadButtons = document.querySelectorAll('.download-btn');

    downloadButtons.forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const themeId = button.getAttribute('data-id');
            const downloadUrl = button.getAttribute('href');

            try {
                // AJAX request to increment download count
                const response = await fetch(`{{url('api/theme/download/${themeId}')}}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({}) // Empty body for this request
                });

                if (response.ok) {
                    const data = await response.json();
                    document.querySelector(`[data-download-count="${themeId}"]`).textContent = data.downloads;

                    // After updating the download count, trigger the actual file download
                    window.location.href = downloadUrl; // This will download the file
                } else {
                    console.error('Error while updating download count');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const likeButtons = document.querySelectorAll('.like-btn');

    likeButtons.forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();
            const themeId = button.getAttribute('data-id');

            try {
                // AJAX request to toggle like
                const response = await fetch(`{{url('/api/theme/like/${themeId}')}}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({}) // Empty body for this request
                });

                if (response.ok) {
                    const data = await response.json();
                    document.querySelector(`[data-like-count="${themeId}"]`).textContent = data.likes;
                } else {
                    console.error('Error while toggling like');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });
});

</script>
</body>

<!-- Mirrored from themeplaza.art/themes by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Feb 2025 20:05:17 GMT -->

</html>