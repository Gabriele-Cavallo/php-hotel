<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $parking;
    $hotelInfo = ['Hotels', 'Description', 'Parking available', 'Users vote', 'Distance to center'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- /Bootstrap CSS -->
    <title>PHP Hotel</title>
</head>
<body>
    <h1>ECCO I NOSTRI HOTEL</h1>
    <!-- Hotels simple list -->
    <ul>
        <?php foreach ($hotels as $hotel) {?>
            <li>
                <div>Hotel name: <?php echo $hotel['name']; ?></div>
                <div>Hotel description: <?php echo $hotel['description']; ?></div>
                <div>Hotel parking available: <?php echo $parking = $hotel['parking'] ? 'available' : 'not available'; ?></div>
                <div>Hotel users vote: <?php echo $hotel['vote']; ?>/5</div>
                <div>Hotel distance to center: <?php echo $hotel['distance_to_center']; ?> km</div>
            </li>
        <?php } ?>
    </ul>
    <!-- /Hotels simple list -->

    <!-- Hotels Table -->
    <table class="table">
        <thead class="table-dark">
            <tr>
                <?php foreach($hotelInfo as $singleInfo) { ?>
                    <th class="text-center" scope="col"><?php echo $singleInfo; ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody class="table-secondary">
            <?php foreach($hotels as $hotel) { ?>
                <tr class="text-center">
                    <th scope="row"><?php echo $hotel['name']; ?></th>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo $parking = $hotel['parking'] ? 'available' : 'not available'; ?></td>
                    <td><?php echo $hotel['vote']; ?>/5</td>
                    <td><?php echo $hotel['distance_to_center']; ?> km</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- /Hotels Table -->
</body>
</html>