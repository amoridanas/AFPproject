<?php
session_start();

// Ellenőrizd, hogy a felhasználó be van-e jelentkezve
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("Location: index.php?page=1"); // Irányítás a bejelentkezési oldalra
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tippek és Trükkök</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .tips-section {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
        }

        .tip {
            margin-bottom: 20px;
        }

        .tip-icon {
            font-size: 40px;
            color: #007bff;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container my-5">
        <div class="tips-section">
            <h1 class="text-center">Tippek és Trükkök</h1>
            <p class="mt-4">Hasznos tanácsok és eszközök, amelyek segítenek a hatékony tanulásban és időbeosztásban.</p>

            <div class="tip d-flex align-items-center">
                <div class="tip-icon">💡</div>
                <div>
                    <h5>Hozz létre tanulási tervet</h5>
                    <p>Határozd meg a napi céljaidat, és oszd be az idődet. Egy jól átgondolt terv segít koncentráltan
                        haladni.</p>
                </div>
            </div>

            <div class="tip d-flex align-items-center">
                <div class="tip-icon">📚</div>
                <div>
                    <h5>Használj hasznos eszközöket</h5>
                    <p>Próbáld ki az olyan alkalmazásokat, mint a Notion, Trello vagy Google Keep, amelyek segítenek a
                        jegyzetelésben és a feladatkezelésben.</p>
                </div>
            </div>

            <div class="tip d-flex align-items-center">
                <div class="tip-icon">🕒</div>
                <div>
                    <h5>Pomodoro technika</h5>
                    <p>Dolgozz 25 perces blokkokban, majd tarts 5 perces szünetet. Ez segít elkerülni a kiégést és
                        növeli a fókuszt.</p>
                </div>
            </div>

            <div class="tip d-flex align-items-center">
                <div class="tip-icon">🌟</div>
                <div>
                    <h5>Jutalmazd meg magad</h5>
                    <p>Ha elérsz egy tanulási célt, jutalmazd meg magad valami kicsivel. Ez motiválóan hat a következő
                        cél elérésére.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>