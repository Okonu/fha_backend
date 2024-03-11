<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* loader and notification transition */
        #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1000;
        }

        #notification {
            transition: opacity 1s ease-out;
        }

        /* Card styling */
        .card {
            border: 2px solid #E5E7EB;
            border-radius: 0.375rem;
            padding: 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .card:hover {
            border-color: #1D4ED8;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .card input[type="radio"]:checked + div {
            background-color: #1D4ED8;
            color: white;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
            <div class="max-w-md mx-auto">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-900">Complete Your Payment</h2>
                    <p class="mt-1 text-sm text-gray-500">Please enter your phone number and select a payment method.</p>
                </div>
                <div class="mt-8">
                    <form action="{{ route('payment.submit') }}" method="POST">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="user_type" value="{{ request()->query('user_type') }}">
                        <input type="hidden" name="email" value="{{ $user->email }}">

                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                            <input type="number" name="amount" id="amount" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        {{-- <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Payment Method</label>
                            <div class="grid grid-cols-2 gap-4">

                                <!-- Mpesa Card -->
                                <label class="card cursor-pointer" for="channel_code_mpesa">
                                    <input type="radio" name="channel_code" id="channel_code_mpesa" value="63902" class="hidden">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold">Mpesa</h3>
                                        <p class="text-gray-500">Pay with Mpesa</p>
                                    </div>
                                </label>

                                <!-- Sasa Pay -->
                                <label class="card cursor-pointer" for="channel_code_sasa">
                                    <input type="radio" name="channel_code" id="channel_code_sasa" value="0" class="hidden">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold">Sasa Pay</h3>
                                        <p class="text-gray-500">Pay with Sasa Pay</p>
                                    </div>
                                </label>

                                <!-- Visa Card -->
                                <label class="card cursor-pointer" for="channel_code_visa">
                                    <input type="radio" name="channel_code" id="channel_code_visa" value="55" class="hidden">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold">Visa</h3>
                                        <p class="text-gray-500">Pay with Visa</p>
                                    </div>
                                </label>

                                <!-- Airtel Money -->
                                <label class="card cursor-pointer" for="channel_code_airtel">
                                    <input type="radio" name="channel_code" id="channel_code_airtel" value="63903" class="hidden">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold">Airtel</h3>
                                        <p class="text-gray-500">Pay with Airtel- Money</p>
                                    </div>
                                </label>
                            </div>
                        </div> --}}

                        <div class="mt-6">
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit Payment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Loader Element -->
    <div id="loader" class="flex items-center justify-center">
        <div class="loader"></div>
    </div>

    <!-- Notification Element -->
    <div id="notification" class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-white z-50">
        <div class="bg-gray-800 text-white p-6 rounded-lg shadow-lg">
            <p>Please wait for the payment to process. You will receive a status update in your email.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const notification = document.getElementById('notification');
            const loader = document.getElementById('loader');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    loader.style.display = 'flex';

                    setTimeout(function() {
                        loader.style.display = 'none';
                        notification.classList.remove('hidden');

                        setTimeout(function() {
                            notification.style.opacity = '0';
                            setTimeout(function() {
                                window.location.href = 'https://www.foundershubafrica.com';
                            }, 1000);
                        }, 10000);
                    }, 100);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
</html>
