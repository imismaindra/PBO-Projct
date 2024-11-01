<div :class="{ '-ml-64': !sidebarOpen }" class="w-64 bg-[#0548B3] text-gray-100 h-screen transition-all duration-300 ease-in-out">
    <div class="flex text-white font-bold text-xl justify-center mt-10">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
            <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
        </svg>

        <span>Aplikasi opo iki</span>
    </div>
    <div class="p-4 font-bold text-lg mt-5">Menu</div>
    <ul class="space-y-2">
        <li class="group">

            <div class="flex font-semibold px-4 py-2 hover:bg-[#E5E7EB] hover:ml-5 hover:rounded-l-full hover:text-black cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
                    <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                    <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                </svg>


                <a href="index.php?modul=role">Master Data Role</a>
            </div>
            <!--            <ul class="ml-4 space-y-1 hidden group-hover:block">-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">List</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Insert</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Update</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Delete</li>-->
            <!--            </ul>-->
        </li>
        <li class="group">
            <div class="flex font-semibold px-4 py-2 hover:bg-[#E5E7EB] hover:ml-5 hover:rounded-l-full hover:text-black cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                </svg>

                <a href="index.php?modul=user">Master Data User</a>
            </div>
            <!--            <ul class="ml-4 space-y-1 hidden group-hover:block">-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">List</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Insert</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Update</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Delete</li>-->
            <!--            </ul>-->
        </li>
        <li class="group">
            <div class="flex font-semibold px-4 py-2 hover:bg-[#E5E7EB] hover:ml-5 hover:rounded-l-full hover:text-black cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                    <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>

                <a
                    href="index.php?modul=barang"> Master Data Barang</a>
            </div>
            <!--            <ul class="ml-4 space-y-1 hidden group-hover:block">-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">List</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Insert</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Update</li>-->
            <!--                <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer">Delete</li>-->
            <!--            </ul>-->
        </li>
        <li class="group">

            <div class="flex font-semibold px-4 py-2 hover:bg-[#E5E7EB] hover:ml-5 hover:rounded-l-full hover:text-black cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
                    <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                </svg>


                <span>Menu Transaksi</span>
            </div>
            <ul class="ml-4 space-y-1 hidden group-hover:block ">
                <li class="px-4 py-2 hover:bg-[#E5E7EB] hover:ml-5 hover:rounded-l-full hover:text-black cursor-pointer">
                    <a href=#>Insert Transaksi</a>
                </li>
                <li class="px-4 py-2 hover:bg-[#E5E7EB] hover:ml-5 hover:rounded-l-full hover:text-black cursor-pointer">
                    <a href=#>List Transaksi</a>
                </li>

            </ul>
        </li>
    </ul>
</div>