<?php
require './dao/categoriesDAO.php';
$wow = 5;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete"])) {
        $iddelete = intval($_POST["delete"]);

        // Assuming productsDAO is the class name
        $deletcategoies = new CategoriesDAO();
        $deletcategoies->Delete_category($iddelete);
    }
    if (isset($_POST["delete"])) {
        $iddelete = intval($_POST["delete"]);

        // Assuming productsDAO is the class name
        $deletcategoies = new CategoriesDAO();
        $deletcategoies->Delete_category($iddelete);
    }
}
$categories = new CategoriesDAO();
$categorieDATA = $categories->get_categories();
$pdo = Database::getInstance()->getConnection();
// Redirect back to the categories page or any other page


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/"></script>
    <title>Document</title>
</head>
<?php


?>
<body class="bg-white">
        <!-- Header Navbar -->
        <?php
        include('header.php');
        ?>


        <!-- Title -->
        <div class="pt-32  bg-white">
            <h1 class="text-center text-2xl font-bold text-gray-800">Categories</h1>
        </div>

        <!-- Tab Menu -->

        <div class="flex flex-wrap items-center  overflow-x-auto overflow-y-hidden py-10 justify-center   bg-white text-gray-800">
            <button rel="noopener noreferrer" name="category" value="0" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                </svg>
                <span>ALL</span>
            </button>
            <a href="pushcategory.php" rel="noopener noreferrer" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 rounded-t-lg text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>
                <span>Ajouter categorie</span>
            </a>
        </div>

        <!-- Product List -->
        <section class="py-10 bg-gray-100">
        <form  method="post">
            <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            <?php
                foreach ($categorieDATA as $category) {
                    echo '
                        <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                            <a>
                                <div class="relative flex items-end overflow-hidden rounded-xl">
                                    <img src="assets/image_category/'. $category->getImage().'" alt="Hotel Photo" />
                                </div>

                                <div class="mt-1 p-2">
                                    <h2 class="text-slate-700">'.$category->getName().'</h2>
                                    <p class="mt-1 text-sm text-slate-400"> '. $category->getDescription() .'</p>

                                    <div class="mt-3 flex items-end justify-between">
                                        <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">

                                        <a  onclick="return confirm(Are you sure you want to delete this category?)">
                                        <button name="delete" value = "' . $category->getId() . '" class="text-sm">Supprimer</button>
                                        </a>
                                        </div>
                                        <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">


                                            <a ><button name="Modify" value = "' . $category->getId() . '" class="text-sm">Modifier</button></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                        ';
                }
                ?>
            </div>
            </form>
        </section>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <?php
    // include('panier.php');
    include('footer.php');
    ?>

</body>

</html>
