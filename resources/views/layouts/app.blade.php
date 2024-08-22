<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BikeLelo</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}">
    <!-- Bootstrap CSS (latest version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        .message {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            max-width: 300px;
        }
        .message.show {
            display: block;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }
        .message.hide {
            opacity: 0;
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    <div class="content">
        @yield('content')
    </div>
    @include('partials.footer')

    <!-- Message Span -->
    <span id="message" class="message"></span>

    <!-- Bootstrap Bundle with Popper (latest version) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- jQuery (latest version) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Your Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Check if there's a message to show
            const message = $('#message');
            const msgText = message.data('message');
            if (msgText) {
                message.text(msgText).addClass('show');
                setTimeout(function() {
                    message.removeClass('show').addClass('hide');
                    setTimeout(function() {
                        message.removeClass('hide').text('');
                    }, 500); // Time to wait before clearing the message
                }, 3000); // Time to display the message
            }
        });
    </script>
</body>
</html>
