<?php
    $meta = $data['meta'];
    $rates = $data['rates'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col" rowspan="2" class="text-center">Mata Uang</th>
            <th scope="col" colspan="3" class="text-center">{{$meta["indonesia"]}}</th>
            <th scope="col" rowspan="2" class="text-center">{{$meta["word"]}}</th>
        </tr>
        <tr>
            <th class="text-center">Beli</th>
            <th class="text-center">Jual</th>
            <th class="text-center">Tengah</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if(count($rates) > 0){
                foreach ($rates as $rate){
                    ?>
                    <tr>
                        <td class="text-center">{{$rate["currency"]}}</td>
                        <td class="text-center">{{$rate["buy"]}}</td>
                        <td class="text-center">{{$rate["sell"]}}</td>
                        <td class="text-center">{{$rate["average"]}}</td>
                        <td class="text-center">{{$rate["word_rate"]}}</td>
                    </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
    <div style="float:right;"><a href="{{route("rate.index")}}">Back</a></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
