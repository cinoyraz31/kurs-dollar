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
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Key</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $number = 0;
            if (count($rates) > 0){
                foreach ($rates as $rate){
                    $number += 1;
                    ?>
        <tr>
            <th scope="row"><?php echo $number; ?></th>
            <td><?php echo $rate ?></td>
            <td><a href="{{route("rate.show", $rate)}}">Detail</a></td>
        </tr>
                    <?php
                }
            }
        ?>
        </tbody>
    </table>
    <div style="float:right;"><a href="{{route("rate.deleteAll")}}">Delete All</a></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
