<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
            <div class="max-w-md mx-auto">
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-gray-900">Complete Your Payment</h2>
                    <p class="mt-1 text-sm text-gray-500">Please enter your phone number to complete the payment.</p>
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

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                notification.classList.remove('hidden');

                window.location.href = 'https://www.foundershubafrica.com';
            });
        });
    </script>
</body>
</html>
