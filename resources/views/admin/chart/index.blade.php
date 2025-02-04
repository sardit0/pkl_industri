<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css">
</head>
<body>
    <body class="h-screen bg-gray-100">

        <div class="container px-4 mx-auto">
        
            <div class="p-6 m-20 bg-white rounded shadow">
                {!! $chart->container() !!}
            </div>
        
        </div>
        
        <script src="{{ $chart->cdn() }}"></script>
        
        {{ $chart->script() }}
        
</body>
</html>
