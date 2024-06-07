<!-- Show a single customer -->
<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Customer</title>
    </head>
    <body>
        @include('components.header')
        <h1>{{ $customer->name }}</h1>
        <p>{{ $customer->email }}</p>
        <p>{{ $customer->phone }}</p>
        @include('components.footer')
    </body>
</html>