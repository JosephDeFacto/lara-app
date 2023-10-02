@extends('welcome')

@section('content')
    <main class="my-8">
        <div class="container mx-auto">
            @if(isset($categories))
                @foreach($categories as $category)
                    <div class="my-8 h-64 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <h2 class="text-2xl text-white font-semibold">{{ $category->name }}</h2>
                                <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                                <button class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <a href="{{ route('home', ['category_id' => $category->id]) }}">Shop now</a>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="inline-block p-4">
                        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                                class="bg-blue-600 text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="button">
                            Filter by
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- category filter -->
                        <form class="form-category-filter form-brand-filter">
                            <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Category</h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                    @foreach($categories as $category)
                                        <li class="flex items-center">
                                            <input id="category_{{$category->id}}" type="checkbox" name="category" value="{{ $category->id }}" data-category-type="{{ $category->name }}"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                            <label for="category_{{$category->id}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ $category->name }}
                                            </label>
                                        </li>
                                    @endforeach

                                </ul>
                                <!-- brand filter-->
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Brand</h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                    @foreach($brands as $brand)
                                        <li class="flex items-center">
                                            <input id="brand_{{$brand->id}}" type="checkbox" name="brand" value="{{ $brand->id }}" data-brand-type="{{ $brand->name }}"
                                                   class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                                            <label for="brand_{{$brand->id}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                {{ $brand->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                    <button id="submitID" value="submit">Filter</button>
                                </ul>

                            </div>
                        </form>
                    </div>

                        <button id="dropdownDefault" data-dropdown-toggle="dropdown1"
                                class="bg-blue-600 text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="button">
                            Sort by
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- price filter -->
                        <form class="form-price-filter">
                            <div id="dropdown1" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Price</h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                    <li class="flex items-center">
                                        <input id="asc" type="checkbox" name="price" value="asc" data-price-type="asc"
                                               class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="asc" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            asc
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="desc" type="checkbox" name="price" value="desc" data-price-type="desc"
                                               class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="desc" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            desc
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </form>

            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">Buy now</h3>

                <div id="products-container" class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6 filtered">
                    @foreach($randomProducts as $products)
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">
                                <form class="add-quantity-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </button>
                                </form>

                                <form action="{{ route('toWishlist') }}" method="POST" class="flex w-full ml-64">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                    <button type="submit"><i class="fa fa-heart text-xl on-hover-red"></i></button>
                                </form>
                            </div>

                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">{{ $products->name }}</h3>
                                <span class="text-gray-500 mt-2">{{ $products->price }}€</span>
                            </div>
                        </div>
                    @endforeach
                        @endif
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function () {
            var counter = 0;

            $('.add-quantity-form').on('click', function(event) {
                event.preventDefault();
                let form = $(this).closest('.add-quantity-form');
                let product_id = form.find('input[name="product_id"]').val();
                let quantity = form.find('input[name="quantity"]').val();
                let cartCount = $('.cart-count');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.add') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: product_id,
                        quantity: quantity,
                    },
                    success: function(response) {
                        let quantityElement = form.find('.quantity');
                        quantityElement.text(response.quantity);
                        cartCount.text(response.cartCount);
                        let quantity = parseInt(response.quantity);
                        cartCount.text(quantity + counter);
                        counter++;
                    },
                    error: function (request, status, error) {
                        alert(error);
                    }
                })
            });
        });

        let filterByCategory = () => {
            $('form.form-category-filter').change(function(event) {
                event.preventDefault();
                let category = $('input[type=checkbox][data-category-type]:checked').map(function() {
                    return $(this).val()
                }).get();

                $.ajax({
                    url: "{{ url('filter') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        category: category,
                    },

                    success: function(response) {
                        console.log(response);
                        let productsContainer = $('#products-container');
                        productsContainer.html("");
                        response.filteredProducts.forEach(function (product) {
                            productsContainer.append(generateElement(product));
                        })
                    },
                    error: function (request, status, error) {
                        alert(error);
                    }
                })
            });
        }

        let filterByBrand = () => {
            $('.form.form-brand-filter').change(function (event) {
                event.preventDefault();
                let brand = $('input[type=checkbox][data-brand-type]:checked').map(function () {
                    return $(this).val();
                }).get();

                $.ajax({
                    url: "{{ url('filter') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        brand: brand,
                    },
                    success: function (response) {
                        console.log(response);
                        let productsContainer = $('#products-container');
                        productsContainer.html("");
                        response.byBrand.forEach(function (product) {
                            productsContainer.append(generateElement(product));
                        })
                    },
                    error: function (request, status, error) {
                        alert(error);
                    }
                })
            });
        }

        let sortByPrice = () => {
            $('form.form-price-filter').change(function (event) {
                event.preventDefault();
                let productsContainer = $('#products-container');

                let price = $('input[type=checkbox][data-price-type]:checked').val();
                productsContainer.html("");
                const newUrl = `{{ url('filter') }}?price=${price}`;
                history.pushState({}, null, newUrl);

                $.ajax({
                    url: newUrl,
                    method: 'GET',
                    dataType: 'json',

                    success: function (response) {
                        console.log(response);

                        if (price) {
                            if (response.byPriceASC) {
                                response.byPriceASC.forEach(function (product) {
                                    productsContainer.append(generateElement(product));
                                })
                            } else if (response.byPriceDESC) {
                                response.byPriceDESC.forEach(function (product) {
                                    productsContainer.append(generateElement(product));
                                })
                            }
                        }
                    },
                    error: function (request, status, error) {
                        alert(error);
                    }
                })

            })
        }

        sortByPrice();

        filterByCategory();

        filterByBrand();


        $('.on-hover-red').hover(function() {
            $(this).css('color', '#e26571');
        }, function () {
            $(this).css('color', 'black');
        })

        let generateElement = (product) => {
            return `<div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">
                                            <form class="add-quantity-form">
                                                @csrf
            <input type="hidden" name="product_id" value="${product.id}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                                </button>
                                            </form>

                                            <form action="{{ route('toWishlist') }}" method="POST" class="flex w-full ml-64">
                                @csrf
            <input type="hidden" name="product_id" value="${product.id}">
                                                <button type="submit"><i class="fa fa-heart text-xl on-hover-red"></i></button>
                                            </form>
                                        </div>

                                        <div class="px-5 py-3">
                                            <h3 class="text-gray-700 uppercase">${product.name}</h3>
                                            <span class="text-gray-500 mt-2">${product.price}€</span>
                                        </div>
                                    </div>
                                </div>
                                `;
        }
    </script>
@endsection
