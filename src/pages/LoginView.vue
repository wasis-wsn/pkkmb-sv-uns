<template>
  <div class="flex flex-col px-7 pt-8 pb-20 bg-white rounded max-md:px-5">
    <header class="flex gap-5 justify-between w-full max-md:flex-wrap max-md:pr-5 max-md:max-w-full">
      <div class="flex gap-0 pr-6 font-bold text-center text-black bg-white bg-opacity-0 leading-[150%]">
        <img loading="lazy" src="@/assets/logo.png" alt="Askara logo" class="shrink-0 aspect-[1.08] w-[89px]" />
        <div class="flex flex-col self-start mt-5">
          <h1 class="text-3xl">A S K A R A</h1>
          <p class="mt-2.5 text-xs">PKKMB SEKOLAH VOKASI 2024</p>
        </div>
      </div>
      <div class="flex gap-5 self-start mt-1 text-xl text-right text-gray-600 tracking-[2px]">
        <p class="flex-auto my-auto">Hubungi Kami</p>
        <!-- <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/888f2719a5b1ef64c28cf1ead6f28f4c073e30b9f5df623b7f3fc3a4d1b9a83f?apiKey=500874f732b04a0f9d2a6b3345b9b032&" alt="Contact icon" class="shrink-0 aspect-square w-[50px]" /> -->
      </div>
    </header>
    <main class="self-center mt-12 w-full max-w-[1270px] max-md:mt-10 max-md:max-w-full">
      <div class="flex gap-5 max-md:flex-col max-md:gap-0">
        <section class="flex flex-col w-[44%] max-md:ml-0 max-md:w-full">
          <div class="flex flex-col self-stretch my-auto font-bold max-md:mt-10 max-md:max-w-full">
            <h2 class="self-center text-5xl text-black max-md:text-4xl">
              Halo Vocazens!
            </h2>
            <form>
              <div class="mt-20 text-4xl text-neutral-400 max-md:mt-10 max-md:max-w-full">
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" placeholder="Username" class="w-full bg-transparent border-b-2 border-black outline-none" />
              </div>
              <div class="flex gap-5 mt-32 text-4xl whitespace-nowrap text-neutral-400 max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
                <label for="password" class="flex-auto">Password</label>
                <!-- <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a233f7e5bdbe0aa1aefe54d969831c7dc9e70ab7693b6fcfa2ebcbf2a01e93c4?apiKey=500874f732b04a0f9d2a6b3345b9b032&" alt="Password icon" class="shrink-0 self-start w-8 aspect-square" /> -->
              </div>
              <input type="password" id="password" class="w-full bg-transparent border-b-2 border-black outline-none mt-2.5" />
              <div class="flex gap-5 mt-12 w-full text-2xl font-light text-black text-opacity-80 max-md:flex-wrap max-md:mt-10 max-md:max-w-full">
                <div class="flex flex-1 gap-2.5">
                  <input type="checkbox" id="remember" class="shrink-0 bg-white rounded-full border-2 border-indigo-600 border-solid h-[33px] w-[33px]" />
                  <label for="remember" class="flex-auto my-auto">remember me</label>
                </div>
                <a href="#" class="flex-auto my-auto">lupa password?</a>
              </div>
              <button type="submit" class="justify-center items-center self-center px-16 py-4 mt-28 max-w-full text-4xl text-white whitespace-nowrap bg-slate-700 rounded-[70px] w-[365px] max-md:px-5 max-md:mt-10">
                LOGIN
              </button>
            </form>
          </div>
        </section>
        <section class="flex flex-col ml-5 w-[56%] max-md:ml-0 max-md:w-full">
          <img loading="lazy" src="@/assets/illustration.png" alt="Decorative illustration" class="grow w-full aspect-[1.11] max-md:mt-7 max-md:max-w-full" />
        </section>
      </div>
    </main>
  </div>
</template>

<script>
// import './css/pages/loginview.css';

export default {
  name: 'LoginView'
}
</script>