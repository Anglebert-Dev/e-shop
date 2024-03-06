<script src="home/js/jquery-3.4.1.min.js"></script>
<script src="home/js/popper.min.js"></script>
<script src="home/js/bootstrap.js"></script>
<script src="home/js/custom.js"></script>



<script>
    const cartCountRoute = "{{ url('cart/count') }}";
    function updateCartCount() {
        fetch(cartCountRoute)
            .then(response => response.json())
            .then(data => {
                document.querySelector('.cart-number').innerText = data.count;
            }); 
    }

    // Call the function to update cart count when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        updateCartCount();
    });
</script>