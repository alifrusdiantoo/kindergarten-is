<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page - KinderGarten</title>
    <link rel="shortcut icon" href="content/img/icon.png" type="image/x-icon" />
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              lightgrey: '#E5EAF6',
              dark: '#1e293b',
              primary: '#3E3D6D',
              secondary: '#929EBC',
            },
            fontFamily: {
              inter: ['Inter', 'sans-serif'],
            },
          },
        },
      };
    </script>
  </head>
  <body class="font-inter text-dark bg-white">
    <!-- START HEADER -->
    <header class="bg-white w-full fixed shadow-md">
      <div class="container mx-auto px-20">
        <div class="w-full flex justify-between">
          <a href="#home" class="w-60 flex items-center gap-1 pt-2 pb-2">
            <img src="content/img/logo-nav.png" width="80" alt="logo" />
            <div>
              <h1 class="text-primary text-2xl font-semibold tracking-tight">KinderGarten</h1>
              <h1 class="-mt-2 text-sm tracking-tighter font-medium">CHILDREN PRESCHOOL</h1>
            </div>
          </a>
          <ul class="flex items-center gap-12 font-semibold tracking-wider">
            <li><a href="#home" class="hover:text-purple-700">Home</a></li>
            <li><a href="#profil" class="hover:text-purple-700">Profil</a></li>
            <li>
              <a href="#program" class="hover:text-purple-700">Program</a>
            </li>
            <li>
              <a href="#fasilitas" class="hover:text-purple-700">Fasilitas</a>
            </li>
            <li><a href="#kontak" class="hover:text-purple-700">Kontak</a></li>
          </ul>
          <div class="flex items-center">
            <a href="login.php" class="bg-primary text-white font-semibold px-4 py-2 rounded-md hover:bg-secondary hover:text-primary">LOGIN</a>
          </div>
        </div>
      </div>
    </header>
    <!-- END HEADER -->

    <!-- STAR HERO SECTION -->
    <section id="home" class="w-full h-[600px] pt-[96px] bg-[url('content/img/landing/hero-bg.jpg')] bg-cover">
      <!-- HERO CONTENT -->
      <div class="w-full bg-primary h-full bg-opacity-50">
        <div class="container mx-auto px-20 flex justify-between h-full">
          <!-- TEXT HERO -->
          <div class="my-auto w-[418px]">
            <h1 class="text-white font-bold text-[34px]">Best Children Pre-School</h1>
            <h1 class="text-white text-xl font-normal">Learning For "<i>Character & Creativity</i>"</h1>
            <p class="text-white font-extralight mt-2">Come on! Immediately register your child for a bright future by contacting the contact below.</p>
            <div class="mt-8">
              <a href="#kontak" class="bg-primary text-white font-medium text-sm py-3 px-5 mx-auto rounded-full hover:bg-secondary hover:text-primary">Register Now</a>
            </div>
          </div>
          <!-- IMAGE HERO -->
          <div class="flex items-end">
            <img src="content/img//landing/child-hero.png" width="700" alt="child-img" />
          </div>
        </div>
      </div>
    </section>
    <!-- END HERO SECTION -->

    <!-- START PROFILE SECTION -->
    <section id="profil" class="w-full bg-white pt-10 pb-20">
      <div class="container mx-auto px-20">
        <h1 class="text-center text-primary font-semibold mb-10 text-lg">Profile of KinderGarten</h1>
        <!-- IMAGE HEADER -->
        <div class="w-3/4 h-72 mx-auto bg-[url('content/img/landing/header-profile.jpg')] bg-cover bg-center rounded-full"></div>
        <!-- PROFILE CONTENT -->
        <div class="w-3/4 mx-auto mt-8">
          <p class="text-center text-sm">
            KinderGarten merupakan sekolah Pendidikan Anak Usia Dini (PAUD) yang menawarkan rangkaian proses pembelajaran yang interaktif, inovatif, dan sesuai dengan perkembangan tekonologi di dunia pendidikan. Metode pembelajaran
            menggunakan metode yang mengedepankan pendidikan karakter dan kreativitas peserta didik.
          </p>
        </div>
        <!-- VISI -->
        <div class="w-3/4 mx-auto mt-8 text-center">
          <h1 class="font-bold text-lg tracking-widest text-primary">Visi</h1>
          <p class="mt-2">
            "<i
              >Menjadi lembaga pendidikan anak usia dini yang <span class="text-primary font-bold">unggul</span> dalam membentuk <span class="text-primary font-bold">karakter</span>, <span class="text-primary font-bold">kemandirian</span>,
              dan <span class="text-primary font-bold">kreativitas</span> anak melalui pembelajaran yang <span class="text-primary font-bold">menyenangkan</span> dan <span class="text-primary font-bold">holistik</span></i
            >."
          </p>
        </div>
        <!-- MISI -->
        <div class="w-3/4 mx-auto mt-8">
          <h1 class="font-bold text-lg tracking-widest text-primary text-center">Misi</h1>
          <div class="w-full flex justify-center mt-2">
            <ol class="list-decimal">
              <li>Menyediakan lingkungan pembelajaran yang aman dan menyenangkan.</li>
              <li>Mengembangkan potensi anak secara holistik.</li>
              <li>Membentuk karakter positif pada anak.</li>
              <li>Melibatkan orang tua dalam proses pendidikan.</li>
              <li>Meningkatkan kualitas guru dan tenaga pendidik.</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!-- END PROFILE SECTION -->

    <!-- START PROGRAM SECTION -->
    <section id="program" class="w-full bg-[url('content/img/landing/program-bg.jpg')] bg-cover">
      <div class="w-full h-full bg-primary bg-opacity-80">
        <!-- PROGRAM CONTENT -->
        <div class="container mx-auto px-20">
          <h1 class="text-white text-center pt-10 font-semibold mb-10 text-lg">Program of KinderGarten</h1>
          <!-- IMAGE CONTENT -->
          <div class="flex justify-center flex-wrap gap-7 px-36 pb-14">
            <div class="hover:scale-125 transition-all bg-white pb-3 w-72 rounded-md overflow-hidden">
              <img src="content/img/landing/tematik.jpg" alt="program" class="w-full h-44" />
              <p class="font-bold px-3 text-sm my-1">Pembelajaran Tematik</p>
              <p class="px-3 text-xs break-all">Menggabungkan berbagai aspek pembelajaran dalam satu tema untuk membuat pembelajaran lebih relevan dan menarik bagi anak-anak.</p>
            </div>
            <div class="hover:scale-125 transition-all bg-white pb-3 w-72 rounded-md overflow-hidden">
              <img src="content/img/landing/social.jpg" alt="program" class="w-full h-44" />
              <p class="font-bold px-3 text-sm my-1">Keterampilan Sosial dan Emosional</p>
              <p class="px-3 text-xs">Fokus pada pengembangan keterampilan sosial dan emosional anak-anak untuk membantu mereka berinteraksi dengan orang lain dan mengelola emosi mereka.</p>
            </div>
            <div class="hover:scale-125 transition-all bg-white pb-3 w-72 rounded-md overflow-hidden">
              <img src="content/img/landing/creative.jpg" alt="program" class="w-full h-44" />
              <p class="font-bold px-3 text-sm my-1">Pengembangan Kreativitas</p>
              <p class="px-3 text-xs">Merangsang kreativitas anak melalui kerajinan tangan, seni, dan musik seperti menggambar, melukis, atau membuat kolase.</p>
            </div>
            <div class="hover:scale-125 transition-all bg-white pb-3 w-72 rounded-md overflow-hidden">
              <img src="content/img/landing/sport.jpg" alt="program" class="w-full h-44" />
              <p class="font-bold px-3 text-sm my-1">Kesehatan dan Kebugaran</p>
              <p class="px-3 text-xs">Membangun kesadaran tentang pentingnya kesehatan dan kebugaran sejak dini.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END PROGRAM SECTION -->

    <!-- START FACILITIES -->
    <section id="fasilitas" class="w-full bg-white py-10">
      <div class="container mx-auto px-20">
        <h1 class="text-center text-primary font-semibold mb-20 text-lg">Facilities of KinderGarten</h1>
        <div class="w-full flex justify-between mb-20 px-10">
          <div class="w-1/2 my-auto">
            <h1 class="text-primary font-bold text-3xl mb-2">Ruang Kelas yang Nyaman dan Aman</h1>
            <ul class="list-disc ml-5">
              <li>Perabotan yang Sesuai: Meja dan kursi yang disesuaikan dengan tinggi anak-anak.</li>
              <li>Papan Tulis Interaktif: Untuk kegiatan belajar yang lebih dinamis.</li>
              <li>Rak Buku dan Mainan: Untuk penyimpanan buku cerita, permainan edukatif, dan bahan ajar.</li>
            </ul>
          </div>
          <div>
            <img src="content/img/landing/classroom.jpg" width="400" alt="classroom" class="ml-0 rounded-tl-[200px] rounded-br-[200px]" />
          </div>
        </div>
        <div class="w-full flex justify-between mb-20 px-10">
          <div class="w-1/2 my-auto order-2">
            <h1 class="text-primary font-bold text-3xl mb-2">Ruang Perpustakaan Mini</h1>
            <ul class="list-disc ml-5">
              <li>Koleksi Buku: Buku cerita anak, buku bergambar, dan buku edukatif.</li>
              <li>Area Membaca: Karpet atau bantal-bantal besar untuk area membaca yang nyaman.</li>
            </ul>
          </div>
          <div class="order-1">
            <img src="content/img/landing/library.jpg" width="400" alt="library" class="ml-0 rounded-tr-[200px] rounded-bl-[200px]" />
          </div>
        </div>
        <div class="w-full flex justify-between mb-20 px-10">
          <div class="w-1/2 my-auto">
            <h1 class="text-primary font-bold text-3xl mb-2">Taman Bermain Outdoor</h1>
            <ul class="list-disc ml-5">
              <li>Peralatan Bermain: Ayunan, perosotan, jungkat-jungkit, dan alat bermain lainnya.</li>
              <li>Area Berpasir: Untuk permainan pasir yang aman dan edukatif.</li>
              <li>Area Tanam: Kebun kecil untuk kegiatan menanam dan belajar tentang alam.</li>
            </ul>
          </div>
          <div>
            <img src="content/img/landing/taman.jpg" width="400" alt="classroom" class="ml-0 rounded-tl-[200px] rounded-br-[200px]" />
          </div>
        </div>
      </div>
    </section>
    <!-- END FACILITIES -->

    <!-- START CONTACT -->
    <section id="kontak" class="w-full bg-primary py-10">
      <div class="container mx-auto px-20">
        <h1 class="text-white text-center font-semibold mb-5 text-lg">Contact</h1>
        >
        <form action="#kontak" class="w-3/5 mx-auto px-3 pb-5 text-white">
          <div class="mb-4">
            <label for="subjek" class="block">Subjek</label>
            <input type="text" name="subjek" id="subjek" placeholder="Masukkan Subjek Pesan" required autocomplete="off" class="w-full text-dark px-3 py-2 rounded" />
          </div>
          <div class="flex gap-2 mb-4">
            <div class="w-1/2">
              <label for="nama" class="block">Nama</label>
              <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda" required autocomplete="off" class="w-full text-dark px-3 py-2 rounded" />
            </div>
            <div class="w-1/2">
              <label for="nomor" class="block">No. WhatsApp</label>
              <input type="text" name="nomor" id="nomor" placeholder="Masukkan Nomor WA" required autocomplete="off" class="w-full text-dark px-3 py-2 rounded" />
            </div>
          </div>
          <label for="pesan" class="block">Pesan</label>
          <textarea name="pesan" id="pesan" placeholder="Masukkan Pesan" required autocomplete="off" class="w-full resize-none rounded h-36 text-dark px-3 py-2"></textarea>
          <input type="button" name="submit" id="submit" value="Kirim WhatsApp" onclick="sendMessage()" class="w-full bg-dark py-2 mt-6 rounded-full cursor-pointer font-semibold hover:brightness-150" />
        </form>
      </div>
    </section>
    <!-- END CONTACT -->

    <!-- START FOOTER SECTION -->
    <footer id="footer-sec" class="w-full bg-dark pt-16">
      <div class="container mx-auto px-20 text-slate-300">
        <!-- FOOTER INFO -->
        <div class="flex justify-between gap-12 w-full">
          <!-- FOOTER 1 -->
          <div class="w-1/3">
            <a href="#home" class="w-60 flex items-center gap-1 pb-2">
              <img src="content/img/logo-nav.png" width="80" alt="logo" />
              <div>
                <h1 class="text-primary text-2xl font-semibold tracking-tight">KinderGarten</h1>
                <h1 class="text-primary -mt-2 text-sm tracking-tighter font-medium">CHILDREN PRESCHOOL</h1>
              </div>
            </a>
            <div class="mt-4">
              <p class="text-sm">Membentuk fondasi kuat untuk masa depan anak-anak melalui lingkungan yang aman, kreatif, dan inspiratif di KinderGarten, di mana mereka bisa belajar sambil bermain.</p>
            </div>
            <!-- SOSMED -->
            <div class="flex mt-7 mb-6">
              <!-- YOUTUBE -->
              <a href="https://www.youtube.com/@fajarnurr" target="_blank" class="w-7 h-7 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-secondary hover:border-primary hover:bg-primary hover:text-white">
                <svg class="fill-current" width="16" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <title>YouTube</title>
                  <path
                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                  />
                </svg>
              </a>

              <!-- INSTAGRAM -->
              <a href="https://www.instagram.com/fajarn.ur" target="_blank" class="w-7 h-7 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-secondary hover:border-primary hover:bg-primary hover:text-white">
                <svg width="16" class="fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <title>Instagram</title>
                  <path
                    d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"
                  />
                </svg>
              </a>

              <!-- TIKTOK -->
              <a href="https://www.tiktok.com/@donquiixotte" target="_blank" class="w-7 h-7 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-secondary hover:border-primary hover:bg-primary hover:text-white">
                <svg width="16" class="fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <title>TikTok</title>
                  <path
                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"
                  />
                </svg>
              </a>

              <!-- LINKEDIN -->
              <a
                href="https://www.linkedin.com/in/fajar-nurdiansyah/"
                target="_blank"
                class="w-7 h-7 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-secondary hover:border-primary hover:bg-primary hover:text-white"
              >
                <svg width="16" class="fill-current" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <title>LinkedIn</title>
                  <path
                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"
                  />
                </svg>
              </a>
            </div>
          </div>
          <!-- FOOTER 2 -->
          <div class="w-1/3">
            <h1 class="font-bold text-2xl mb-5">Page Links</h1>
            <ul class="text-slate-300">
              <li>
                <a href="#home" class="inline-block text-sm hover:text-primary mb-3">Home</a>
              </li>
              <li>
                <a href="#profil" class="inline-block text-sm hover:text-primary mb-3">Profil</a>
              </li>
              <li>
                <a href="#program" class="inline-block text-sm hover:text-primary mb-3">Program</a>
              </li>
              <li>
                <a href="#fasilitas" class="inline-block text-sm hover:text-primary mb-3">Fasilitas</a>
              </li>
              <li>
                <a href="#Kontak" class="inline-block text-sm hover:text-primary mb-3">Kontak</a>
              </li>
            </ul>
          </div>
          <!-- FOOTER 3 -->
          <div class="w-1/3 text-sm">
            <h1 class="font-bold text-2xl mb-5">Contact Us</h1>
            <!-- PHONE -->
            <div class="mb-3">
              <p class="text-slate-500">Phone :</p>
              <p>+62 8912 3456 7890</p>
            </div>
            <!-- ADDRESS -->
            <div class="mb-3">
              <p class="text-slate-500">Address :</p>
              <p>Jl. Pegangsaan Timur No. 56, Tasikmalaya, Jawa Barat</p>
            </div>
            <!-- EMAIL -->
            <div class="mb-3">
              <p class="text-slate-500">E-mail :</p>
              <p>kindergarten@gmail.com</p>
            </div>
          </div>
        </div>
        <!-- COPYRIGHT -->
        <div>
          <hr class="w-full h-[2px] border-t-0 bg-slate-300 rounded-full" />
          <div class="py-4">
            <p class="text-center text-slate-300 text-sm">&copy; 2024 - KinderGarten PreSchool Institute.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- END FOOTER SECTION -->

    <script>
      function sendMessage() {
        let subjek = document.getElementById('subjek').value;
        let nama = document.getElementById('nama').value;
        let nomor = document.getElementById('nomor').value;
        let pesan = document.getElementById('pesan').value;
        let urlToWhatsapp = `https://wa.me/447974904959?text=*Subjek:* ${subjek}, *Nama:* ${nama}, *Nomor:* ${nomor}, *Pesan:* ${pesan}`;
        window.open(urlToWhatsapp, '_blank');
      }
    </script>
  </body>
</html>
