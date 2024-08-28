<template>
    <div>
      <h1 class="mx-4 my-3"> Tableau de bord</h1>
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>Adhérants</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-users"></i>
                </div>
                <a href="/adherants" class="small-box-footer">Plus info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-md-6 col-lg-4 mb-4">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53</h3>
                  <p>Enseignants</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-person-chalkboard"></i>
                </div>
                <a href="#" class="small-box-footer">Plus info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-md-6 col-lg-4 mb-4">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>44</h3>
                  <p>Formations</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <!-- <div class="col-md-6 col-lg-3 mb-4">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> -->
            <!-- ./col -->
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-md-12 col-lg-7 mb-4">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Nombre d’adhérents inscrits / Jour
                    </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                      </li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                      <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                  </div>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->



            </section>
            <!-- /.Left col -->

            <!-- right col -->
            <section class="col-md-12 col-lg-5 mb-4">
              <!-- Map card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Visitors</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div>

              </div>





            </section>
            <!-- /.right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
    </div>
  </template>

<script>
import AdminLayout from '@/Layouts/AdminLayout.vue';

export default {
  layout: AdminLayout,
  name: 'Dashboard',
}
</script>
<style>

</style>

