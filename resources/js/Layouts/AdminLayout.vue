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
  import Header from '@/Components/Header.vue';
  import Sidebar from '@/Components/SideBar.vue';
  import Footer from '@/Components/Footer.vue';

  export default {
    components: {
      Header,
      Sidebar,
      Footer
    },
    props: {
      title: String
    },
    watch: {
      title(newTitle) {
        if (newTitle) {
          document.title = newTitle;
        }
      }
    },
    mounted() {
      if (this.title) {
        document.title = this.title;
      }
    }
  };
  </script>


