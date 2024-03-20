<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-DISKS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

    <body>
        <div id="app">
            <div class="container-fluid p-4 w-75">
                <div class="gap-4 row justify-content-center">
                 
                    <div class="card p-2" v-for="(disk, index) in diskList" @click="showCard(index, 'original')">
                        <img :src="disk.poster" alt="Album">
                        <div class="card-body">
                            <h4>{{ disk.title }}</h4>
                            <p>Author: {{ disk.author }}</p>
                            <p>Year: {{ disk.year }}</p>
                            <p>Genre: {{ disk.genre }}</p>
                        </div>
                    </div>
                <div class="d-flex justify-content-center">
                    <h2>Ciò che ascolto mentre programmo!!</h2>
                </div>
                    <div class="card" v-for="(myDisk, index) in myDiskList" @click="showCard(index, 'additional')">
                        <img :src="myDisk.image[3]['#text']" alt="Album">
                        <div class="card-body">
                            <h4>{{ myDisk.name }}</h4>
                            <p>Artist: {{ myDisk.artist.name }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overlay" v-if="showOverlay">
                <div class="close-button" @click="closeOverlay"><i class="fa-solid fa-bomb"></i></div>
                <div class="card modal-card">
                    <img :src="selectedDisk.poster" alt="Album">
                    <div class="card-body">
                        <h4>{{ selectedDisk.title }}</h4>
                        <p>Author: {{ selectedDisk.author }}</p>
                        <p>Year: {{ selectedDisk.year }}</p>
                        <p>Genre: {{ selectedDisk.genre }}</p>
                    </div>
                </div>
            </div>
        </div>

        <script src="./js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>

</html>