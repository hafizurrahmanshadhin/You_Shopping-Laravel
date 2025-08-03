<script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>

<script src="{{ asset('frontend/js/plugins.js') }}"></script>

<script src="{{ asset('frontend/js/main.js') }}"></script>

<script src="{{ asset('frontend/js/tagify.js') }}"></script>

<script>
    var input = document.querySelector('input[name=tag]');

    new Tagify(input)
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        toastr.options.positionClass = 'toast-top-right';

        @if (Session::has('t-success'))
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            };
            toastr.success("{{ session('t-success') }}");
        @endif

        @if (Session::has('t-error'))
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            };
            toastr.error("{{ session('t-error') }}");
        @endif

        @if (Session::has('t-info'))
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            };
            toastr.info("{{ session('t-info') }}");
        @endif

        @if (Session::has('t-warning'))
            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': true,
                'progressBar': true,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            };
            toastr.warning("{{ session('t-warning') }}");
        @endif
    });
</script>

<script>
    function addToCart(productId, productTitle, productPrice, productImage) {
        let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : {};
        if (cart[productId]) {
            cart[productId].quantity += 1;
        } else {
            cart[productId] = {
                id: productId,
                title: productTitle,
                price: parseFloat(productPrice),
                quantity: 1,
                image: productImage
            };
        }
        cart[productId].totalPrice = cart[productId].quantity * cart[productId].price;
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartUI();
    }
</script>

<script>
    function updateCartUI() {
        const cartItemsContainer = document.getElementById('cart-items-container');
        let cart = JSON.parse(localStorage.getItem('cart'));
        let html = '';
        let totalItems = 0;
        let subtotal = 0;

        if (cart && Object.keys(cart).length > 0) {
            Object.keys(cart).forEach(key => {
                let item = cart[key];
                totalItems += item.quantity;
                let totalPrice = item.quantity * item.price;
                subtotal += totalPrice;
                html += `
                <div class="single--cart--item">
                    <div class="cart--item--img">
                        <img src="${item.image}" alt="${item.title}"/>
                    </div>
                    <div class="cart--item--details">
                        <p class="item--title">${item.title}</p>
                    </div>
                    <div class="item--amount">
                        <div class="minus action--btn" onclick="updateQuantity('${key}', 'minus', event)">
                            <!-- Minus SVG here -->
                            <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="4"
                          viewBox="0 0 24 4"
                          fill="none"
                        >
                          <path
                            d="M1.41958 3.43907H22.5395C22.7286 3.43907 22.9159 3.40181 23.0907 3.32942C23.2654 3.25704 23.4242 3.15094 23.5579 3.01719C23.6916 2.88344 23.7977 2.72466 23.8701 2.54991C23.9424 2.37516 23.9797 2.18787 23.9796 1.99873C23.9797 1.8096 23.9424 1.62232 23.8701 1.44758C23.7977 1.27285 23.6916 1.11408 23.5579 0.980343C23.4242 0.846609 23.2654 0.74053 23.0907 0.668165C22.9159 0.595801 22.7286 0.558568 22.5395 0.558594H1.41958C1.04053 0.563027 0.678499 0.716719 0.412019 0.986333C0.14554 1.25595 -0.00390625 1.61975 -0.00390625 1.99883C-0.00390625 2.37791 0.14554 2.74171 0.412019 3.01133C0.678499 3.28094 1.04053 3.43463 1.41958 3.43907Z"
                            fill="black"
                          />
                        </svg>
                        </div>
                        <input type="text" class="amount" value="${item.quantity}" readonly />
                        <div class="plus action--btn" onclick="updateQuantity('${key}', 'plus', event)">
                            <!-- Plus SVG here -->
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="18"
                          height="18"
                          viewBox="0 0 18 18"
                          fill="none"
                        >
                          <path
                            d="M8.98828 17.6231C8.34094 17.6231 7.81641 17.0986 7.81641 16.4513V1.54688C7.81641 0.899531 8.34094 0.375 8.98828 0.375C9.63563 0.375 10.1602 0.899531 10.1602 1.54688V16.4513C10.1602 17.0986 9.63563 17.6231 8.98828 17.6231Z"
                            fill="black"
                          />
                          <path
                            d="M16.4395 10.1719H1.53516C0.887812 10.1719 0.363281 9.64734 0.363281 9C0.363281 8.35266 0.887812 7.82812 1.53516 7.82812H16.4395C17.0869 7.82812 17.6114 8.35266 17.6114 9C17.6114 9.64734 17.0869 10.1719 16.4395 10.1719Z"
                            fill="black"
                          />
                        </svg>
                        </div>
                    </div>
                    <div class="cart--item--price">
                        <p class="item--price">$${totalPrice.toFixed(2)}</p>
                        <div class="item--close--btn" onclick="removeItemFromCart('${key}')">
                            <!-- Close SVG here -->

                            <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="15"
                          height="14"
                          viewBox="0 0 15 14"
                          fill="none"
                        >
                          <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M1.28107 0.305288C1.4686 0.117817 1.7229 0.0125018 1.98807 0.0125018C2.25323 0.0125018 2.50754 0.117817 2.69507 0.305288L7.98807 5.59829L13.2811 0.305288C13.3733 0.209778 13.4837 0.133596 13.6057 0.0811869C13.7277 0.0287779 13.8589 0.00119157 13.9917 3.77571e-05C14.1244 -0.00111606 14.2561 0.0241854 14.379 0.0744663C14.5019 0.124747 14.6136 0.199 14.7075 0.292893C14.8014 0.386786 14.8756 0.498438 14.9259 0.621334C14.9762 0.744231 15.0015 0.87591 15.0003 1.00869C14.9992 1.14147 14.9716 1.27269 14.9192 1.39469C14.8668 1.5167 14.7906 1.62704 14.6951 1.71929L9.40207 7.01229L14.6951 12.3053C14.8772 12.4939 14.978 12.7465 14.9757 13.0087C14.9735 13.2709 14.8683 13.5217 14.6829 13.7071C14.4975 13.8925 14.2467 13.9977 13.9845 14C13.7223 14.0022 13.4697 13.9014 13.2811 13.7193L7.98807 8.42629L2.69507 13.7193C2.50647 13.9014 2.25386 14.0022 1.99167 14C1.72947 13.9977 1.47866 13.8925 1.29325 13.7071C1.10784 13.5217 1.00267 13.2709 1.00039 13.0087C0.998115 12.7465 1.09891 12.4939 1.28107 12.3053L6.57407 7.01229L1.28107 1.71929C1.0936 1.53176 0.988281 1.27745 0.988281 1.01229C0.988281 0.747124 1.0936 0.492816 1.28107 0.305288Z"
                            fill="#5A5C5F"
                          />
                        </svg>
                        </div>
                    </div>
                </div>
            `;
            });
        } else {
            html = '<p>Your cart is empty.</p>';
        }

        cartItemsContainer.innerHTML = html;

        const selectedShipping = document.querySelector('input[name="shipping-services"]:checked');
        let shippingCost = 0;
        if (selectedShipping) {
            shippingCost = parseFloat(document.querySelector(`label[for="${selectedShipping.id}"] .price span`)
                .textContent);
            console.log("Selected shipping cost: ", shippingCost);

            document.querySelector('.final--pricing--area .price--list ul li:first-child p span').textContent = subtotal
                .toFixed(2);
            document.querySelector('.final--pricing--area .price--list ul li:nth-child(2) p span').textContent =
                shippingCost.toFixed(2);
            document.querySelector('.final--pricing--area .total--price p span').textContent = (subtotal + shippingCost)
                .toFixed(2);

            const cartCountElement = document.getElementById('cart-count');
            if (cartCountElement) {
                cartCountElement.textContent = totalItems;
            }
        }
    }
</script>

<script>
    function updateQuantity(productId, action, event) {
        event.preventDefault();
        event.stopPropagation();
        let cart = JSON.parse(localStorage.getItem('cart'));

        if (action === 'plus') {
            cart[productId].quantity += 1;
        } else if (action === 'minus') {
            cart[productId].quantity -= 1;
            if (cart[productId].quantity < 1) {
                delete cart[productId];
            }
        }

        cart[productId].price = parseFloat(cart[productId].price);

        cart[productId].totalPrice = cart[productId].quantity * cart[productId].price;

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartUI();
    }

    function removeItemFromCart(productId) {
        let cart = JSON.parse(localStorage.getItem('cart'));
        delete cart[productId];
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartUI();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        updateCartUI();
        attachShippingOptionListeners();

        var checkoutButton = document.querySelector('.checkout--btn');
        checkoutButton.addEventListener('click', function(event) {
            event.preventDefault();
            var isLoggedIn =
                @if (Auth::check())
                    true
                @else
                    false
                @endif ;

            if (!isLoggedIn) {
                Swal.fire({
                    title: 'Login Required',
                    text: 'You need to login first to CHECK-OUT.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Login',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}";
                    }
                });
            } else {
                let cart = JSON.parse(localStorage.getItem('cart'));
                $.ajax({
                    url: "{{ route('cart.store') }}",
                    type: "POST",
                    data: {
                        cart: cart,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        window.location.href = "{{ route('checkout.index') }}";
                    }
                });
            }
        });
    });

    function attachShippingOptionListeners() {
        const shippingOptions = document.querySelectorAll('input[name="shipping-services"]');
        shippingOptions.forEach(option => {
            option.addEventListener('change', function() {
                updateCartUI();
            });
        });
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('checkout-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('cart-data').value = localStorage.getItem('cart');
            document.getElementById('selected-shipping-service').value = document.querySelector(
                'input[name="shipping-services"]:checked').id;
            document.getElementById('selected-payment-option').value = document.querySelector(
                'select[name="payment-options"]').value;
            form.submit();
            localStorage.clear();
        });
        updateCartUI();
        attachEventListeners();
    });
</script>


@stack('script')
