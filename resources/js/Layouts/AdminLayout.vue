<!-- resources/js/Layouts/AppLayout.vue -->
<template>
    <div class="wrapper">
      <Header />
      <Sidebar />
      <div class="content-wrapper">
        <slot />
      </div>
      <footer class="main-footer">
        <Footer />
      </footer>
    </div>
  </template>

  <script>
  import Header from '@/Components/Header.vue'
  import Sidebar from '@/Components/SideBar.vue'
  import Footer from '@/Components/Footer.vue'

  export default {
    components: {
      Header,
      Sidebar,
      Footer
    },
    props: {
      title: String
    },
    mounted() {
      const dropdownToggle = document.querySelector('#navbarDropdown');
      const dropdownMenu = document.querySelector('.dropdown-menu');

      dropdownToggle.addEventListener('click', function(event) {
        event.preventDefault();
        dropdownMenu.classList.toggle('show');
      });

      window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
          dropdownMenu.classList.remove('show');
        }
      });
    }
  }
  </script>

  <style scoped>
  /* Ajoutez des styles globaux pour le layout si nécessaire */
  </style>
