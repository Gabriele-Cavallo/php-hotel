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
    $hotelInfo = ['Hotels', 'Description', 'Parking available', 'Users vote', 'Distance to center'];
    $parkingChoice = isset($_GET['parking-choice']) ? $_GET['parking-choice'] : '';
    $usersScore = isset($_GET['score-filter']) ? $_GET['score-filter'] : 0;
    $usersScoreNumber = (int)$usersScore;
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
    <form method="get">
        <div class="parking-filter">
            <label for="parking-available">Parking available</label>
            <input <?php echo $parkingChoice == 'true' ? 'checked' : '';?> type="radio" id="parking-available" name="parking-choice" value="true">
            <label for="parking-not-available">Parking not available</label>
            <input <?php echo $parkingChoice == 'false' ? 'checked' : '';?> type="radio" id="parking-not-available" name="parking-choice" value="false">
        </div>
        <div class="vote-filter">
            <span>Users hotel score: </span>
            <label for="score-one">1</label>
            <input <?php echo $usersScore == '1' ? 'checked' : '';?> type="radio" id="score-one" name="score-filter" value="1">
            <label for="score-two">2</label>
            <input <?php echo $usersScore == '2' ? 'checked' : '';?> type="radio" id="score-two" name="score-filter" value="2">
            <label for="score-three">3</label>
            <input <?php echo $usersScore == '3' ? 'checked' : '';?> type="radio" id="score-three" name="score-filter" value="3">
            <label for="score-four">4</label>
            <input <?php echo $usersScore == '4' ? 'checked' : '';?> type="radio" id="score-four" name="score-filter" value="4">
            <label for="score-five">5</label>
            <input <?php echo $usersScore == '5' ? 'checked' : '';?> type="radio" id="score-five" name="score-filter" value="5">
        </div>
        <button type="submit">Filter Search</button>
    </form>
    <!-- Hotels simple list -->
    <ul>
        <?php foreach ($hotels as $hotel) {
            $parking = $hotel['parking'] ? 'available' : 'not available';
            if ((empty($parkingChoice) || $parkingChoice === '') && (empty($usersScore) || $usersScore === '')) {?>
                <li>
                    <div>Hotel name: <?php echo $hotel['name']; ?></div>
                    <div>Hotel description: <?php echo $hotel['description']; ?></div>
                    <div>Hotel parking available: <?php echo $parking; ?></div>
                    <div>Hotel users vote: <?php echo $hotel['vote']; ?>/5</div>
                    <div>Hotel distance to center: <?php echo $hotel['distance_to_center']; ?> km</div>
                </li>
            <?php } else if((empty($parkingChoice) || $parkingChoice === '') && ($hotel['vote'] >= $usersScoreNumber)){ ?>
               <li>
                    <div>Hotel name: <?php echo $hotel['name']; ?></div>
                    <div>Hotel description: <?php echo $hotel['description']; ?></div>
                    <div>Hotel parking available: <?php echo $parking; ?></div>
                    <div>Hotel users vote: <?php echo $hotel['vote']; ?>/5</div>
                    <div>Hotel distance to center: <?php echo $hotel['distance_to_center']; ?> km</div>
                </li> 
            <?php } else if(($parkingChoice == 'true' && $parking == 'available') && ($hotel['vote'] >= $usersScoreNumber)){ ?>
               <li>
                    <div>Hotel name: <?php echo $hotel['name']; ?></div>
                    <div>Hotel description: <?php echo $hotel['description']; ?></div>
                    <div>Hotel parking available: <?php echo $parking; ?></div>
                    <div>Hotel users vote: <?php echo $hotel['vote']; ?>/5</div>
                    <div>Hotel distance to center: <?php echo $hotel['distance_to_center']; ?> km</div>
                </li> 
            <?php } else if(($parkingChoice == 'false' && $parking == 'not available') && ($hotel['vote'] >= $usersScoreNumber)){ ?>
                <li>
                    <div>Hotel name: <?php echo $hotel['name']; ?></div>
                    <div>Hotel description: <?php echo $hotel['description']; ?></div>
                    <div>Hotel parking available: <?php echo $parking; ?></div>
                    <div>Hotel users vote: <?php echo $hotel['vote']; ?>/5</div>
                    <div>Hotel distance to center: <?php echo $hotel['distance_to_center']; ?> km</div>
                </li>
            <?php } ?>
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