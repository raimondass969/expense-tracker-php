<?php
session_start();
require_once '../../src/Services/Csrf.php';
$token = Csrf::generateToken();


?>

<!DOCTYPE html>
<html lang="lt">

<head>
    <title>Prisijungti | SpendOops</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap"
        rel="stylesheet">

    <link rel='stylesheet' href="/css/output.css">
</head>

<body class="bg-slate-100 font-manrope">
    <main class="grid lg:grid-cols-2 gap-12 items-center w-full max-w-6xl mx-auto min-h-screen">

        <section class="max-w-xl space-y-6">
            <div class="flex items-center gap-2">
                <img
                    src="../assets/images/spendoops-mark.svg"
                    alt=""
                    class="h-9 w-9">
                <span class="text-2xl font-semibold tracking-tight">Spend<span class="text-violet-500">Oops</span></span>
            </div>
            <div class="space-y-4">
                <h1 class="text-6xl font-extrabold leading-tight">Take control of your
                    <span class="text-violet-500">money.</span>
                </h1>
                <p class="text-lg text-gray-600 max-w-md">Track your income and expense in one simple place.</p>
            </div>
        </section>

        <section class="relative">

            <div class="absolute inset-0 bg-violet-200 rounded-3xl rotate-6 scale-105"></div>
            <form
                class="relative bg-white rounded-2xl p-8 shadow-2xl py-12"
                method="POST"
                action="login.php">
                <input type="hidden" name="csrf_token" value="<?php echo $token ?>">

                <div class="mb-8">
                    <h2 class="font-bold text-3xl">Prisijunkite</h2>
                    <p class="text-gray-600">Tęskite savo finansų stebėjimą</p>
                </div>

                <!-- login email input -->
                <div class="flex flex-col mb-4">
                    <label for="login_email">El pastas</label>
                    <div class="relative ">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="absolute left-2 top-1/2 -translate-y-1/2 size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>

                        <input
                            class="border rounded-lg w-full font-light py-2 pl-10"
                            id='login_email'
                            type="email"
                            name='email'
                            placeholder="Jusu el. pastas">
                    </div>
                </div>

                <!-- login pass input -->
                <div class="flex flex-col mb-4">
                    <label for="login_password">Iveskite slaptazodi</label>

                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="absolute left-2 top-1/2 -translate-y-1/2 size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>

                        <input
                            class="border rounded-lg w-full font-light py-2 pl-10"
                            id="login_password"
                            type="password"
                            name="password">

                    </div>
                </div>
                <button
                    class="rounded-2xl border border-black bg-violet-300 p-2 mt-6 w-full hover:cursor-pointer hover:border-violet-200"
                    type="submit">Prisijungti
                </button>

                <div class="flex justify-center gap-1 mt-6">
                    <p class="text-gray-600">Neturite paskyros?</p>

                    <a href="register-form.php"
                        class="text-violet-500 font-semibold hover:underline">Sukurti paskyrą</a>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
