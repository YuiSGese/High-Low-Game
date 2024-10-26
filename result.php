<?php
session_start();

$first_card = $_SESSION['first_card'];
$second_card = rand(1, 13);

$choice = isset($_POST['choice']) ? $_POST['choice'] : '';

$result = '';
if (($choice == 'HIGH' && $second_card > $first_card) || 
    ($choice == 'LOW' && $second_card < $first_card)) {
    $result = '勝ち！'; 
} else {
    $result = '負け！'; 
}

$second_card_image = str_pad($second_card, 2, '0', STR_PAD_LEFT) . ".png";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>High & Low</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./styles.css">
    <script src="https://cdn.jsdelivr.net/npm/fireworks-js/dist/fireworks.min.js"></script>
  
</head>
<body>
    <div id="fireworks-container"></div>
    
    <div class="game-container">
        <h1>HIGH or LOW</h1>
        <div class="card-container">
            <img src="cards/<?php echo str_pad($first_card, 2, '0', STR_PAD_LEFT); ?>.png" class="card" alt="First Card">
            <img src="cards/<?php echo $second_card_image; ?>" class="card" alt="Second Card">
        </div>

        <div class="result-container">
            <h2 class="small-text"><?php echo ($choice == 'HIGH' ? 'HIGH' : 'LOW') . 'を選択しました。'; ?></h2> 
            <h2><?php echo $result; ?></h2>
            
            <form action="game.php" method="GET">
                <button class="button" type="submit" width="200px">もう一度挑戦！</button>
            </form>
            <div class="star-container">
                <?php for ($i = 0; $i < 13; $i++): ?>
                    <i class="fa-solid fa-star"></i>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const result = "<?php echo $result; ?>";
            if (result === '勝ち！') { 
                const fireworks = new Fireworks(document.getElementById('fireworks-container'), {
                    opacity: 0.5,
                    colors: ['#ff004d', '#ffab00', '#00d1ff', '#8eff00', '#d500ff'],
                });
                fireworks.start();
            }
        });
    </script>
</body>
</html>
