<header class="border-t-4 border-blue-700 bg-white shadow-md">

    <nav class="container mx-auto py-4 flex items-center justify-between">
        <ul class="flex">
            <li class="mr-6">
                <router-link
                    class="text-gray-500 hover:text-blue-800"
                    exact :to="{ name: 'home'}">Home
                </router-link>
            </li>
            <li class="mr-6">
                <router-link
                    exact :to="{ name: 'posts.index'}"
                    class="text-gray-500 hover:text-blue-800">Posts list
                </router-link>
            </li>
            <li class="mr-6">
                <router-link
                    exact :to="{ name: 'posts.create'}"
                    class="text-gray-500 hover:text-blue-800">New post
                </router-link>
            </li>
            <li class="mr-6">
                <router-link
                    exact :to="{ name: 'categories.create'}"
                    class="text-gray-500 hover:text-blue-800">New category
                </router-link>
            </li>
            <li class="mr-6">
                <router-link
                    exact :to="{ name: 'trips.index'}"
                    class="text-gray-500 hover:text-blue-800">Trips
                </router-link>
            </li>
        </ul>

        <div class="relative">
            <ul class="flex">
                @guest
                    <li class="mr-6">
                        <router-link
                            class="text-gray-500 hover:text-blue-800"
                            exact :to="{ name: 'login'}">Login
                        </router-link>
                    </li>
                    <li class="mr-6">
                        <router-link
                            class="text-gray-500 hover:text-blue-800"
                            exact :to="{ name: 'register'}">Register
                        </router-link>
                    </li>
                @endguest
                @auth
                    <li class="mr-6">
                        <router-link
                            class="text-gray-500 hover:text-blue-800"
                            exact :to="{ name: 'dashboard'}">Dashboard
                        </router-link>
                    </li>
                @endauth
            </ul>
        </div>

        {{--        <div class="relative" x-data="{ isOpen: false }">--}}
        {{--            <button--}}
        {{--                class="flex items-center focus:outline-none"--}}
        {{--                x-on:click="isOpen = !isOpen"--}}
        {{--                x-on:keydown.escape="isOpen = false">--}}
        {{--                <img src="{{ asset('images/avatar.png') }}" alt="Avatar img" class="w-10 h-10 rounded-full">--}}
        {{--                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">--}}
        {{--                    <path class="heroicon-ui"--}}
        {{--                          d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"/>--}}
        {{--                </svg>--}}
        {{--            </button>--}}
        {{--            <ul class="absolute font-normal bg-white shadow overflow-hidden rounded w-48 border mt-2 right-0 z-20"--}}
        {{--                x-show="isOpen"--}}
        {{--                x-on:click.away="isOpen = false">--}}
        {{--                <li>--}}
        {{--                    <a href="#"--}}
        {{--                       class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">--}}
        {{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">--}}
        {{--                            <path class="heroicon-ui"--}}
        {{--                                  d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/>--}}
        {{--                        </svg>--}}
        {{--                        <span class="block px-4">Login</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <a href="#"--}}
        {{--                       class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">--}}
        {{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">--}}
        {{--                            <path class="heroicon-ui"--}}
        {{--                                  d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/>--}}
        {{--                        </svg>--}}
        {{--                        <span class="block px-4">Account</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <a href="#"--}}
        {{--                       class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">--}}
        {{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">--}}
        {{--                            <path class="heroicon-ui"--}}
        {{--                                  d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>--}}
        {{--                        </svg>--}}

        {{--                        <span class="block px-4">Settings</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="border-t border-gray-400">--}}
        {{--                    <a href="#"--}}
        {{--                       class="flex items-center px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">--}}
        {{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">--}}
        {{--                            <path class="heroicon-ui"--}}
        {{--                                  d="M4.93 19.07A10 10 0 1 1 19.07 4.93 10 10 0 0 1 4.93 19.07zm1.41-1.41A8 8 0 1 0 17.66 6.34 8 8 0 0 0 6.34 17.66zM13.41 12l1.42 1.41a1 1 0 1 1-1.42 1.42L12 13.4l-1.41 1.42a1 1 0 1 1-1.42-1.42L10.6 12l-1.42-1.41a1 1 0 1 1 1.42-1.42L12 10.6l1.41-1.42a1 1 0 1 1 1.42 1.42L13.4 12z"/>--}}
        {{--                        </svg>--}}
        {{--                        <span class="block px-4">Logount</span>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
        {{--        </div>--}}
    </nav>

</header>
