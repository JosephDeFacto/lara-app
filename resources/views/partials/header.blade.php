<header>
    <div class="bg-slate-300 container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-end w-full">
                <a href="{{url('viewCart')}}">
                    <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                        <i class="fa fa-shopping-cart text-2xl text-blue-600 cart" aria-hidden="true"></i>
                        <span class="cart-count">{{ session('cartCount', 0)}}</span>
                    </button>
                </a>
            </div>
        </div>
        <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
            <div class="w-full">
                <a class="mr-1 text-blue-600 hover:underline sm:mx-3 sm:mt-0" href="{{ url('/') }}">Home</a>
                <a class="mr-1 text-blue-600 hover:underline sm:max-3 sm:mt-0" href="{{ url('products') }}">Products</a>
                <a class="mr-1 text-blue-600 hover:underline sm:max-3 sm:mt-0" href="{{ url('special_offer') }}">Special offer</a><!-- no found -->
                @if (auth()->check())
                    <a class="ml-auto mr-1 text-black-900 hover:underline sm:mx-3 sm:mt-0 float-right" href="{{ url('logout') }}">Logout</a>
                    <a class="ml-auto mr-1 text-black-900 hover:underline sm:mx-3 sm:mt-0 float-right" href="{{ route('user.account') }}"><i class="fa fa-user text-xl" aria-hidden="true" title="Account"></i></a>
                @else
                    <a class="ml-auto mr-1 text-black-900 hover:underline sm:mx-3 sm:mt-0 float-right" href="{{ url('login') }}">Sign-in</a>
                @endif
            </div>
        </nav>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateCartCount() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('cart.getCount') }}',
                    success: function(response) {
                        let cartCount = parseInt(response.cartCount);
                        $('.cart-count').text(isNaN(cartCount) ? 0 : cartCount);
                    },
                    error: function(request, status, error) {
                        console.error('Error fetching cart count: ' + error);
                    }
                });
            }
            updateCartCount();
        });
    </script>
</header>
