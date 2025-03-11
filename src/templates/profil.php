<?php ob_start(); ?>

    <main class="pt-24">
        <div class="text-center mb-8 justify-center flex flex-wrap items-center m-auto w-[900px] h-full animate-fadeIn ">
            <div class="container bg-white border-2 border-black backdrop-blur-2xl">
                <div class="justify-center flex flex-wrap items-center m-auto h-auto rounded-4xl">
                    <img src="./src/public/assets/profil.jpg" class="rounded-full h-80 w-80 p-5" alt="profil-image"/>
                </div>

                <hr/>
                <div class="mb-8 justify-center flex flex-wrap flex-col gap-5 m-auto w-full p-5 mt-5">
                    <div class="flex flex-row justify-center gap-10 items-center">
                        <h1><?php echo $_SESSION['user']['NOM'] . " " . $_SESSION['user']['PRENOM']; ?></h1>
                        <span> <?php echo $_SESSION['user']['EMAIL']; ?>  </span>
                        <form action="#" method="post">
                            <button type="submit" id="toggleButton"
                                    value="<?= isset($_POST['action']) ? $_POST['action'] : '0'; ?>" name="action"
                                    class="p-2 border w-28 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                                <?= isset($_POST['action']) && $_POST['action'] == '1' ? 'Cancel' : 'Edit'; ?>
                            </button>
                        </form>
                    </div>

                    <?php if (isset($_POST['action']) && $_POST['action'] == '1') : ?>
<!--                        --><?php
//                        if (isset($_POST['msg'])) {
//                            $message = $_POST['msg'];
//                            if (!empty($message)) {
//                                echo "<div class='text-center p-3 mb-4 text-red-700 bg-red-300 rounded-lg border border-red-500'>
//                             " . htmlspecialchars($message) . "
//                            </div>";
//                            }
//                        }
//                        ?>
                        <form action="index.php?controller=user&action=update" method="post"
                              class="flex flex-col flex-wrap gap-2 justify-around shadow-2xl shadow-black backdrop-opacity-10 border-black p-5 animate-fadeIn">
                            <!-- Champs du formulaire -->

                            <input type="hidden" value="<?php echo $_SESSION['user']['IDUSER']; ?>" name="id"/>
                            <div class="flex items-center mt-5 ml-20 flex-row gap-5">
                                <label for="nom" class="text-gray-700 font-semibold mb-1">
                                    Nom:
                                </label>
                                <input type="text" id="nom" name="name" value="<?php echo $_SESSION['user']['NOM']; ?>"
                                       class="w-[50%] p-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"/>
                            </div>

                            <div class="flex items-center mt-5 ml-20 flex-row gap-5">
                                <label for="prenom" class="text-gray-700 font-semibold mb-1">
                                    Prenom:
                                </label>
                                <input type="text" id="prenom" name="prenom"
                                       value="<?php echo $_SESSION['user']['PRENOM']; ?>"
                                       class="w-[50%] p-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"/>
                            </div>

                            <div class="flex items-center mt-5 ml-20 flex-row gap-5">
                                <label for="email" class="text-gray-700 font-semibold mb-1">
                                    Email:
                                </label>
                                <input type="email" id="email" name="email"
                                       value="<?php echo $_SESSION['user']['EMAIL']; ?>"
                                       class="w-[50%] p-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"/>
                                <input name="old_mail" type="hidden"
                                       value="<?php echo $_SESSION['user']['EMAIL']; ?> "/>
                            </div>

                            <div class="flex items-center mt-5 ml-20 flex-row gap-5">
                                <input type="button" value="change password if want"
                                       class="p-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"/>
                            </div>

                            <div class="flex items-center mt-5 ml-20 flex-row gap-5">
                                <label for="pass" class="text-gray-700 font-semibold mb-1">
                                    Old password: <input type="password" id="pass" name="old_password"
                                                         class="w-[50%] p-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"/>
                                </label>
                            </div>

                            <div class="flex items-center mt-5 ml-20 flex-row gap-5">
                                <label for="pass" class="text-gray-700 font-semibold mb-1">
                                    New password: <input type="password" id="pass" name="password"
                                                         class="w-[50%] p-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"/>
                                </label>
                            </div>

                            <div class="flex items-center mt-5 ml-20 flex-row gap-5">
                                <label for="pass" class="text-gray-700 font-semibold mb-1">
                                    Confirm password: <input type="password" id="pass" name="repeatpassword"
                                                             class="w-[50%] p-2 border rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"/>
                                </label>
                            </div>

                            <div class="flex items-center mt-5 ml-20 flex-row gap-5">
                                <button type="submit"
                                        class="p-2 border w-28 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                                    Save
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <script>
        const button = document.getElementById('toggleButton');

        button.addEventListener('click', () => {
            // Change la valeur du bouton entre '0' et '1'
            button.value = button.value === '0' ? '1' : '0';
            // Change le texte du bouton en fonction de la valeur
            button.textContent = button.value === '1' ? 'Cancel' : 'Edit';
        });
    </script>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>