@extends('dash.layouts.dash')


@section('body')
<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-md-4">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Commandes en attente </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$cea}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Sales Card -->

          <!-- Sales Card -->
          <div class="col-md-4">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Commandes en cours</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$cec}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-md-4">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Total en XAF</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$montant}}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

        </div>
      </div><!-- End Left side columns -->
    </div>

    <div class="row">

      
      <div class="col-md-6">

        <!-- Website Traffic -->
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title">Les 5 meilleurs clients</h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    // name: 'Produits commmandés',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 1048,
                        name: 'Fotso Calvin'
                      },
                      {
                        value: 735,
                        name: 'François Dupont'
                      },
                      {
                        value: 580,
                        name: 'Madelaine Tata'
                      },
                      {
                        value: 484,
                        name: 'Lionnel Messi'
                      },
                      {
                        value: 300,
                        name: 'Christian Tadjeu'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->


      </div>
      <div class="col-md-6">

        <!-- Website Traffic -->
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title">Les 5 produits les plus commandés</h5>

            <div id="trafficChart2" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart2")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    // name: 'Produits commmandés',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 447,
                        name: 'Chaussure'
                      },
                      {
                        value: 3200,
                        name: 'Ecouteurs'
                      },
                      {
                        value: 600,
                        name: 'Ordinateur'
                      },
                      {
                        value: 350,
                        name: 'Modem wifi'
                      },
                      {
                        value: 130,
                        name: 'Table'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->


      </div>


    </div>



  </section>

@endsection
