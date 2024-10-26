<?php
session_start();

$first_card = rand(1, 13); 
$_SESSION['first_card'] = $first_card;

$first_card_image = str_pad($first_card, 2, '0', STR_PAD_LEFT) . ".png";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>High & Low Game</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fireworks-js/dist/fireworks.min.js"></script>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div class="game-container">
        <h1>HIGH or LOW</h1>
        <div class="card-container">
            <img src="cards/<?php echo $first_card_image; ?>" class="card" alt="First Card">
            <img src="cards/bg.png" class="card" alt="Hidden Card">
        </div>
        <div class="result-container">
            <h2 class="small-text">GOOD LUCK</h2>
            <h2>賭けて！</h2>
            <form action="result.php" method="POST">
                <div class="button-container">
                    <input type="submit" name="choice" value="HIGH" class="button">
                    <input type="submit" name="choice" value="LOW" class="button">
                </div>
            </form>
            <div class="star-container">
                <?php for ($i = 0; $i < 13; $i++): ?>
                    <i class="fa-solid fa-star"></i>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
