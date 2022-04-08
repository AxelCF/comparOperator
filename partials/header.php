<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./style.css">
    <title>MyTO</title>
</head>
<header class="mb-12">
    <div class="select-none">
        <nav class="fixed top-0 bg-gray-100 w-full mb-6">
            <ul class="flex flex-row-reverse p-4 mr-4">
                <li class="">
                    <form action="./process/search.php" method="post" class="ml-4 mb-4 w-full md:mb-0">
                        <label for="Search" class="hidden">rechercher</label>
                        <input type="text"  name="Search" class="p-2 border rounded-lg w-full bg-grey-lightest focus:border-orange focus:shadow-inner" placeholder="rechercher" />
                        <button class="hidden">rechercher</button>
                    </form>
                </li>
                <li class="text-xl font-mono pt-2 pr-6 hover:text-indigo-400 ease-in duration-100 cursor-pointer">Déconnexion</li>
                <li class="text-xl font-mono pt-2 pr-6 hover:text-indigo-400 ease-in duration-100 cursor-not-allowed">autre chose</li>
                <li class="text-xl font-mono pt-2 pr-6 hover:text-indigo-400 ease-in duration-100 cursor-pointer"><a href="index.php">Accueil</a></li>
            </ul>
        </nav>
        <br>

    </div>

</header>