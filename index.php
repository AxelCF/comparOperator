<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltdestination = $manager->getAllDestination();
?>

<body>


    <?php
    // $sqlQuery = 'SELECT * FROM destination ';
    // $pdostmt = $bdd->query($sqlQuery);
    // $results = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="pt-16 pb-5 bg-orange-200">

        <?php
        foreach ($rltdestination as $result) {
        ?>
            <!-- carte horizontal-->
            <!--responsive de w-1/3 -- laius 1/3 -->
            <form method="get" action="./page.php" name="id" value="<?=$result->getId()?>">
                <div class="p-10">
                    <h3 class="mb-4 font-bold text-orange-400"> </h3>
                    <div class="bg-white rounded-lg md:flex">
                    <a href="#"><img src="<?= $result->getImage() ?>" alt="Boat" class="rounded-t-lg md:w-1/3 md:rounded-l-lg md:rounded-t-none">
                    <div class="p-6">
                        <h2 class="mb-2 font-bold text:xl md:text-2xl text-orange-700"><?= $result->getLocation() ?></h2>

                        <p class="text-orange-700"><?= $result->getPrice() ?></p>
                    </div></a>
                </div>
            </div>
        </form>
        <?php
        }
        ?>
    </div>




    <?php
    include './partials/footer.php';
    ?>