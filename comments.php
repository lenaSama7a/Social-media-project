<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="h-screen flex justify-center" style="background: #edf2f7;">
    <form class="mt-3 w-full max-w-xl bg-white rounded-lg px-4 py-3 pt-2">
        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-xs md:text-sm pt-px">Comment !</p>
                </div>
                <div class="-mr-1">
                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                </div>
            </div>
        </div>
        <!-- comment -->
        <div class="ml-6 mt-3 px-5 py-4 bg-blue-100 dark:bg-gray-800 shadow rounded-lg max-w-lg">
            <div class="flex mb-4">
                <img class="w-12 h-12 rounded-full" src="images/profile.png" />
                <div class="ml-2 mt-0.5">
                    <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">Loyce Kuvalis</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">16 December at 08:25</span>
                </div>
            </div>
            <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="ml-6 mt-3 px-5 py-4 bg-blue-100 dark:bg-gray-800 shadow rounded-lg max-w-lg">
            <div class="flex mb-4">
                <img class="w-12 h-12 rounded-full" src="images/profile.png" />
                <div class="ml-2 mt-0.5">
                    <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">Loyce Kuvalis</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">16 December at 08:25</span>
                </div>
            </div>
            <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

    </form>
</body>

</html>