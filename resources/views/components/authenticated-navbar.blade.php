<nav class='sticky h-14 inset-x-0 top-0 z-30 w-full border-b border-gray-200 bg-white/75 backdrop-blur-lg transition-all'>
    <div class="mx-auto w-full max-w-screen-xl px-2.5 md:px-20">
        <div class="flex h-14 items-center justify-between border-b border-zinc-200">
            <a href="/login" class="z-40 font-semibold">hrms.</a>

            <div class="hidden items-center space-x-4 sm:flex">
                <p>Welcome, <span class="text-[#009ADB]">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span></p>
                
                <button id="menu-button">
                    <div class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-[#2653EB] bg-[#2563EB]">
                        <img src="images/{{auth()->user()->avatar}}" alt="" class="absolute w-full h-auto object-cover rounded-full border-0">
                    </div>
                </button>
            </div>
        </div>
    </div>
</nav>

<div class="absolute right-[5rem] z-10 mt-2 w-56 origin-top-right divide-y-2 divide-[#E2E8F0] rounded-md bg-white focus:outline-none hidden border-2 border-[#E2E8F0]" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" id="menu-item" tabindex="-1">
    <div class="py-1" role="none">
        <div class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
            <p class="text-black">{{auth()->user()->username}}</p>
            <p class="text-[#6A6A6A]">{{auth()->user()->email}}</p>
        </div>
    </div>
    <div class="py-1" role="none">
        <a href="/profile" class="text-gray-700 block px-4 py-2 text-sm cursor-default focus:bg-[#F1F5F9] focus:text-[#0F172A] hover:bg-[#F1F5F9] hover:text-[#0F172A] transition-colors" role="menuitem" tabindex="-1" id="menu-item-2">
            Profile
        </a>
        <a href="/attendance" class="text-gray-700 block px-4 py-2 text-sm cursor-default focus:bg-[#F1F5F9] focus:text-[#0F172A] hover:bg-[#F1F5F9] hover:text-[#0F172A] transition-colors" role="menuitem" tabindex="-1" id="menu-item-3">
            Attendance
        </a>
    </div>
    <div class="py-1" role="none">
        <form action="/logout" method="POST">
            @csrf

            <button href="#" id="logout-button" type="submit" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-4">
                Logout
            </button>
        </form>
    </div>
</div>

<script>
    const menuButton = document.querySelector("#menu-button");
    const menuItem = document.querySelector("#menu-item");

    function isInside(element, container) {
        return container.contains(element);
    }

    menuButton.addEventListener("click", () => {
        menuItem.classList.toggle("hidden");
    });

    document.addEventListener("click", (event) => {
        if (!isInside(event.target, menuItem) && !isInside(event.target, menuButton)) {
            menuItem.classList.add("hidden");
        }
    });
</script>
