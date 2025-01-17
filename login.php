<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="shortcut icon" href="content/img/icon.png" type="image/x-icon">
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
      rel="stylesheet"
    />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              lightgrey: "#E5EAF6",
              dark: "#1e293b",
              primary: "#3E3D6D",
              secondary: "#929EBC"
            },
            fontFamily: {
              inter: ["Inter", "sans-serif"],
            },
          },
        },
      };
    </script>
  </head>
  <body class="font-inter text-dark bg-lightgrey">
    <section class="container flex justify-center items-center h-svh mx-auto">
      <!-- LOGIN SECTION -->
      <div class="w-96 bg-white rounded-lg shadow-2xl px-8 py-12">
        <div class="">
          <img src="content/img/logo.png" width="120" alt="logo" class="mx-auto">
        </div>
        <h2 class="text-center my-5 text-xl font-bold text-primary">LOGIN</h2>
        <!-- INPUT FORM -->
        <form action="config/login.php" method="POST">
          <!-- USERNAME INPUT -->
          <label for="username" class="block mb-1 font-semibold text-primary">Username</label>
          <input type="text" name="username" id="username" required class="bg-lightgrey w-full p-2 mb-4 rounded-md focus:outline-primary">
          <!-- PASSWORD INPUT -->
          <label for="password" class="block mb-1 font-semibold text-primary">Password</label>
          <input type="password" name="password" id="password" required class="bg-lightgrey w-full p-2 mb-8 rounded-md focus:outline-primary">
          <!-- BUTTON SUBMIT -->
          <input type="submit" value="Login" name="submit" class="w-full bg-primary text-white font-semibold p-2 rounded-md hover:bg-secondary cursor-pointer">
        </form>
      </div>
    </section>
  </body>
</html>