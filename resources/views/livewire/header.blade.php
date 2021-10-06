<head><link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"></head>
<header>
    <nav class="bg-black" style="background-color: #EDD3A7">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>

                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <a href="/" class="flex justify-center items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <img class="hidden lg:block h-16 w-auto" src="../images/asian_logo.png"
                                 alt="AsianLogo">
                        </div>
                        <h1 class="text-gray-900 px-3 py-2 rounded-md text-xl titleHeaderClass">Asian Box</h1>
                    </a>
                    <div class="hidden my-auto sm:block sm:ml-6">
                        <div class="flex space-x-4">

                            <a href="/actualites"
                               class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl titleHeaderClass">ACTUALITÉS</a>

                            <a href="/service"
                               class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl titleHeaderClass">SERVICES</a>



                            @if (Route::has('login'))
                                @auth
                                    <a href="/abonnement"
                                       class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl titleHeaderClass">ABONNEMENT</a>

                                    <a href="/logout"
                                       class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl titleHeaderClass">LOGOUT</a>

                                    @if(Auth::user()->is_admin)
                                    <a href="/admin"
                                       class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl titleHeaderClass">ADMIN</a>
                                    @endif
                                    <a href="/profile"
                                       class="hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl">
                                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg"
                                             width="20" height="20" viewBox="0 0 24 24">
                                            <path
                                                d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/>
                                        </svg>
                                    </a>

                                @else

                                    @if (Route::has('register'))

                                        <a href="/login"
                                           class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl titleHeaderClass">CONNEXION</a>

                                        <a href="/register"
                                           class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl titleHeaderClass">INSCRIPTION</a>

                                    @endif
                                @endauth
                            @endif

                            <a href="/contact"
                               class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl titleHeaderClass  ">CONTACT</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/actualites"
                   class="text-gray-900 hover:bg-gray-700 text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base  titleHeaderClass"
                   aria-current="page">ACTUALITÉS</a>

                <a href="/service"
                   class="text-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base  titleHeaderClass">SERVICE</a>

                <a href="/contact"
                   class="text-gray-900 text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base  titleHeaderClass">CONTACT</a>

                @if (Route::has('login'))
                    @auth

                        <a href="/abonnement"
                           class="text-gray-900 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base  titleHeaderClass">ABONNEMENT</a>

                        <a href="/logout"
                           class="text-gray-900 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base  titleHeaderClass">LOGOUT</a>


                        <a href="/profile"
                           class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-xl  ">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="20"
                                 height="20" viewBox="0 0 24 24">
                                <path
                                    d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/>
                            </svg>
                        </a>

                    @else

                        @if (Route::has('register'))

                            <a href="/login"
                               class="text-gray-900 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base  titleHeaderClass">LOGIN</a>

                            <a href="/register"
                               class="text-gray-900 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base  titleHeaderClass">REGISTER</a>

                        @endif
                    @endauth
                @endif
                <a href="/contact"
                   class="text-gray-900 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-base titleHeaderClass  ">CONTACT</a>
            </div>
        </div>
    </nav>
</header>
