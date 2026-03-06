<!DOCTYPE html>
<html>
<head>
    <title>Prime Numbers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="card m-4">
        <div class="card-header">Prime Numbers From 1 to 100</div>
        <div class="card-body">

            @for ($num = 2; $num <= 100; $num++)
                @php
                    $isPrime = true;

                    for ($i = 2; $i <= sqrt($num); $i++) {
                        if ($num % $i == 0) {
                            $isPrime = false;
                            break;
                        }
                    }
                @endphp

                @if ($isPrime)
                    <span class="badge bg-primary">{{ $num }}</span>
                @endif
            @endfor

        </div>
    </div>
</div>

</body>
</html>