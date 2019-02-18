@extends('layouts.user')

@section('title')
    {{ __("Dashboard") }}
@endsection

@section('content')
<!-- START cards box-->
<div class="row">
  <div class="col-xl-3 col-md-6">
    <!-- START card-->
    <div class="card flex-row align-items-center align-items-stretch border-0">
      <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
        <em class="icon-cloud-upload fa-3x"></em>
      </div>
      <div class="col-8 py-3 bg-primary rounded-right">
        <div class="h2 mt-0">1700</div>
        <div class="text-uppercase">Uploads</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <!-- START card-->
    <div class="card flex-row align-items-center align-items-stretch border-0">
      <div class="col-4 d-flex align-items-center bg-purple-dark justify-content-center rounded-left">
        <em class="icon-globe fa-3x"></em>
      </div>
      <div class="col-8 py-3 bg-purple rounded-right">
        <div class="h2 mt-0">700
          <small>GB</small>
        </div>
        <div class="text-uppercase">Quota</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-12">
    <!-- START card-->
    <div class="card flex-row align-items-center align-items-stretch border-0">
      <div class="col-4 d-flex align-items-center bg-green-dark justify-content-center rounded-left">
        <em class="icon-bubbles fa-3x"></em>
      </div>
      <div class="col-8 py-3 bg-green rounded-right">
        <div class="h2 mt-0">500</div>
        <div class="text-uppercase">Reviews</div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-12">
    <!-- START date widget-->
    <div class="card flex-row align-items-center align-items-stretch border-0">
      <div class="col-4 d-flex align-items-center bg-green justify-content-center rounded-left">
        <div class="text-center">
          <!-- See formats: https://docs.angularjs.org/api/ng/filter/date-->
          <div class="text-sm" data-now="" data-format="MMMM"></div>
          <br>
          <div class="h2 mt-0" data-now="" data-format="D"></div>
        </div>
      </div>
      <div class="col-8 py-3 rounded-right">
        <div class="text-uppercase" data-now="" data-format="dddd"></div>
        <br>
        <div class="h2 mt-0" data-now="" data-format="h:mm"></div>
        <div class="text-muted text-sm" data-now="" data-format="a"></div>
      </div>
    </div>
    <!-- END date widget-->
  </div>
</div>
<!-- END cards box-->
<div class="row">
  <!-- START dashboard main content-->
  <div class="col-xl-9">
    <!-- START chart-->
    <div class="row">
      <div class="col-xl-12">
        <!-- START card-->
        <div class="card card-default card-demo" id="cardChart9">
          <div class="card-header">
            <a class="float-right" href="#" data-tool="card-refresh" data-toggle="tooltip" title="Refresh card">
              <em class="fas fa-sync"></em>
            </a>
            <a class="float-right" href="#" data-tool="card-collapse" data-toggle="tooltip" title="Collapse card">
              <em class="fa fa-minus"></em>
            </a>
            <div class="card-title">Inbound visitor statistics</div>
          </div>
          <div class="card-wrapper">
            <div class="card-body">
              <div class="chart-spline flot-chart"></div>
            </div>
          </div>
        </div>
        <!-- END card-->
      </div>
    </div>
    <!-- END chart-->
    <div class="row">
      <div class="col-xl-12">
        <div class="card border-0">
          <div class="row row-flush">
            <div class="col-lg-2 col-md-3 col-6 bg-info py-4 d-flex align-items-center justify-content-center rounded-left">
              <em class="wi wi-day-sunny fa-4x"></em>
            </div>
            <div class="col-lg-2 col-md-3 col-6 py-2 br d-flex align-items-center justify-content-center">
              <div>
                <div class="h1 m-0 text-bold">32&deg;</div>
                <div class="text-uppercase">Clear</div>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 d-none d-md-block py-2 text-center br">
              <div class="text-info text-sm">10 AM</div>
              <div class="text-muted text-md">
                <em class="wi wi-day-cloudy"></em>
              </div>
              <div class="text-info">
                <span class="text-muted">20%</span>
              </div>
              <div class="text-muted">27&deg;</div>
            </div>
            <div class="col-lg-2 col-md-3 d-none d-md-block py-2 text-center br">
              <div class="text-info text-sm">11 AM</div>
              <div class="text-muted text-md">
                <em class="wi wi-day-cloudy"></em>
              </div>
              <div class="text-info">
                <span class="text-muted">30%</span>
              </div>
              <div class="text-muted">28&deg;</div>
            </div>
            <div class="col-lg-2 py-2 text-center br d-none d-lg-block">
              <div class="text-info text-sm">12 PM</div>
              <div class="text-muted text-md">
                <em class="wi wi-day-cloudy"></em>
              </div>
              <div class="text-info">
                <span class="text-muted">20%</span>
              </div>
              <div class="text-muted">30&deg;</div>
            </div>
            <div class="col-lg-2 py-2 text-center d-none d-lg-block">
              <div class="text-info text-sm">1 PM</div>
              <div class="text-muted text-md">
                <em class="wi wi-day-sunny-overcast"></em>
              </div>
              <div class="text-info">
                <span class="text-muted">0%</span>
              </div>
              <div class="text-muted">30&deg;</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4">
        <!-- START card-->
        <div class="card border-0">
          <div class="card-body">
            <div class="d-flex">
              <h3 class="text-muted mt-0">300</h3>
              <em class="ml-auto text-muted fa fa-coffee fa-2x"></em>
            </div>
            <div class="py-4" data-sparkline="" data-type="line" data-height="80" data-width="100%" data-line-width="2" data-line-color="#7266ba" data-spot-color="#888" data-min-spot-color="#7266ba" data-max-spot-color="#7266ba" data-fill-color="" data-highlight-line-color="#fff"
              data-spot-radius="3" data-values="1,3,4,7,5,9,4,4,7,5,9,6,4" data-resize="true"></div>
            <p>
              <small class="text-muted">Actual progress</small>
            </p>
            <div class="progress progress-xs mb-3">
              <div class="progress-bar bg-info progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                <span class="sr-only">80% Complete</span>
              </div>
            </div>
          </div>
        </div>
        <!-- END card-->
      </div>
      <div class="col-xl-8">
        <div class="card card-default">
          <div class="card-header">
            <div class="px-2 float-right badge badge-danger">5</div>
            <div class="px-2 mr-2 float-right badge badge-success">12</div>
            <div class="card-title">Team messages</div>
          </div>
          <!-- START list group-->
          <div class="list-group" data-height="180" data-scrollable="">
            <!-- START list group item-->
            <div class="list-group-item list-group-item-action">
              <div class="media">
                <img class="align-self-start mx-2 circle thumb32" src="/userfiles/img/user/02.jpg" alt="Image">
                <div class="media-body text-truncate">
                  <p class="mb-1">
                    <strong class="text-primary">
                                   <span class="circle bg-success circle-lg text-left"></span>
                                   <span>Catherine Ellis</span>
                                </strong>
                  </p>
                  <p class="mb-1 text-sm">Cras sit amet nibh libero, in gravida nulla. Nulla...</p>
                </div>
                <div class="ml-auto">
                  <small class="text-muted ml-2">2h</small>
                </div>
              </div>
            </div>
            <!-- END list group item-->
            <!-- START list group item-->
            <div class="list-group-item list-group-item-action">
              <div class="media">
                <img class="align-self-start mx-2 circle thumb32" src="/userfiles/img/user/03.jpg" alt="Image">
                <div class="media-body text-truncate">
                  <p class="mb-1">
                    <strong class="text-primary">
                                   <span class="circle bg-success circle-lg text-left"></span>
                                   <span>Jessica Silva</span>
                                </strong>
                  </p>
                  <p class="mb-1 text-sm">Cras sit amet nibh libero, in gravida nulla. Nulla...</p>
                </div>
                <div class="ml-auto">
                  <small class="text-muted ml-2">3h</small>
                </div>
              </div>
            </div>
            <!-- END list group item-->
            <!-- START list group item-->
            <div class="list-group-item list-group-item-action">
              <div class="media">
                <img class="align-self-start mx-2 circle thumb32" src="/userfiles/img/user/09.jpg" alt="Image">
                <div class="media-body text-truncate">
                  <p class="mb-1">
                    <strong class="text-primary">
                                   <span class="circle bg-danger circle-lg text-left"></span>
                                   <span>Jessie Wells</span>
                                </strong>
                  </p>
                  <p class="mb-1 text-sm">Cras sit amet nibh libero, in gravida nulla. Nulla...</p>
                </div>
                <div class="ml-auto">
                  <small class="text-muted ml-2">4h</small>
                </div>
              </div>
            </div>
            <!-- END list group item-->
            <!-- START list group item-->
            <div class="list-group-item list-group-item-action">
              <div class="media">
                <img class="align-self-start mx-2 circle thumb32" src="/userfiles/img/user/12.jpg" alt="Image">
                <div class="media-body text-truncate">
                  <p class="mb-1">
                    <strong class="text-primary">
                                   <span class="circle bg-danger circle-lg text-left"></span>
                                   <span>Rosa Burke</span>
                                </strong>
                  </p>
                  <p class="mb-1 text-sm">Cras sit amet nibh libero, in gravida nulla. Nulla...</p>
                </div>
                <div class="ml-auto">
                  <small class="text-muted ml-2"> 1d</small>
                </div>
              </div>
            </div>
            <!-- END list group item-->
            <!-- START list group item-->
            <div class="list-group-item list-group-item-action">
              <div class="media">
                <img class="align-self-start mx-2 circle thumb32" src="/userfiles/img/user/10.jpg" alt="Image">
                <div class="media-body text-truncate">
                  <p class="mb-1">
                    <strong class="text-primary">
                                   <span class="circle bg-danger circle-lg text-left"></span>
                                   <span>Michelle Lane</span>
                                </strong>
                  </p>
                  <p class="mb-1 text-sm">Mauris eleifend, libero nec cursus lacinia...</p>
                </div>
                <div class="ml-auto">
                  <small class="text-muted ml-2"> 2d</small>
                </div>
              </div>
            </div>
            <!-- END list group item-->
          </div>
          <!-- END list group-->
          <!-- START card footer-->
          <div class="card-footer">
            <div class="input-group">
              <input class="form-control form-control-sm" type="text" placeholder="Search message ..">
              <span class="input-group-btn">
                          <button class="btn btn-secondary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                       </span>
            </div>
          </div>
          <!-- END card-footer-->
        </div>
      </div>
    </div>
  </div>
  <!-- END dashboard main content-->
  <!-- START dashboard sidebar-->
  <aside class="col-xl-3">
    <!-- START loader widget-->
    <div class="card card-default">
      <div class="card-body">
        <a class="text-muted float-right" href="#">
          <em class="fa fa-arrow-right"></em>
        </a>
        <div class="text-info">Average Monthly Uploads</div>
        <div class="text-center py-4">
          <div class="easypie-chart easypie-chart-lg" data-easypiechart data-percent="70" data-animate="{&quot;duration&quot;: &quot;800&quot;, &quot;enabled&quot;: &quot;true&quot;}" data-bar-color="#23b7e5" data-track-Color="rgba(200,200,200,0.4)" data-scale-Color="false"
            data-line-width="10" data-line-cap="round" data-size="145">
            <span>70%</span>
          </div>
        </div>
        <div class="text-center" data-sparkline="" data-bar-color="#23b7e5" data-height="30" data-bar-width="5" data-bar-spacing="2" data-values="5,4,8,7,8,5,4,6,5,5,9,4,6,3,4,7,5,4,7"></div>
      </div>
      <div class="card-footer">
        <p class="text-muted">
          <em class="fa fa-upload fa-fw"></em>
          <span>This Month</span>
          <span class="text-dark">1000 Gb</span>
        </p>
      </div>
    </div>
    <!-- END loader widget-->
    <!-- START messages and activity-->
    <div class="card card-default">
      <div class="card-header">
        <div class="card-title">Latest activities</div>
      </div>
      <!-- START list group-->
      <div class="list-group">
        <!-- START list group item-->
        <div class="list-group-item">
          <div class="media">
            <div class="align-self-start mr-2">
              <span class="fa-stack">
                          <em class="fa fa-circle fa-stack-2x text-purple"></em>
                          <em class="fas fa-cloud-upload-alt fa-stack-1x fa-inverse text-white"></em>
                       </span>
            </div>
            <div class="media-body text-truncate">
              <p class="mb-1">
                <a class="text-purple m-0" href="#">NEW FILE</a>
              </p>
              <p class="m-0">
                <small>
                  <a href="#">Bootstrap.xls</a>
                </small>
              </p>
            </div>
            <div class="ml-auto">
              <small class="text-muted ml-2">15m</small>
            </div>
          </div>
        </div>
        <!-- END list group item-->
        <!-- START list group item-->
        <div class="list-group-item">
          <div class="media">
            <div class="align-self-start mr-2">
              <span class="fa-stack">
                          <em class="fa fa-circle fa-stack-2x text-info"></em>
                          <em class="far fa-file-alt fa-stack-1x fa-inverse text-white"></em>
                       </span>
            </div>
            <div class="media-body text-truncate">
              <p class="mb-1">
                <a class="text-info m-0" href="#">NEW DOCUMENT</a>
              </p>
              <p class="m-0">
                <small>
                  <a href="#">Bootstrap.doc</a>
                </small>
              </p>
            </div>
            <div class="ml-auto">
              <small class="text-muted ml-2">2h</small>
            </div>
          </div>
        </div>
        <!-- END list group item-->
        <!-- START list group item-->
        <div class="list-group-item">
          <div class="media">
            <div class="align-self-start mr-2">
              <span class="fa-stack">
                          <em class="fa fa-circle fa-stack-2x text-danger"></em>
                          <em class="fa fa-exclamation fa-stack-1x fa-inverse text-white"></em>
                       </span>
            </div>
            <div class="media-body text-truncate">
              <p class="mb-1">
                <a class="text-danger m-0" href="#">BROADCAST</a>
              </p>
              <p class="m-0">
                <a href="#">Read</a>
              </p>
            </div>
            <div class="ml-auto">
              <small class="text-muted ml-2">5h</small>
            </div>
          </div>
        </div>
        <!-- END list group item-->
        <!-- START list group item-->
        <div class="list-group-item">
          <div class="media">
            <div class="align-self-start mr-2">
              <span class="fa-stack">
                          <em class="fa fa-circle fa-stack-2x text-success"></em>
                          <em class="far fa-clock fa-stack-1x fa-inverse text-white"></em>
                       </span>
            </div>
            <div class="media-body text-truncate">
              <p class="mb-1">
                <a class="text-success m-0" href="#">NEW MEETING</a>
              </p>
              <p class="m-0">
                <small>On
                  <em>10/12/2015 09:00 am</em>
                </small>
              </p>
            </div>
            <div class="ml-auto">
              <small class="text-muted ml-2">15h</small>
            </div>
          </div>
        </div>
        <!-- END list group item-->
        <!-- START list group item-->
        <div class="list-group-item">
          <div class="media">
            <div class="align-self-start mr-2">
              <span class="fa-stack">
                          <em class="fa fa-circle fa-stack-2x text-warning"></em>
                          <em class="fa fa-tasks fa-stack-1x fa-inverse text-white"></em>
                       </span>
            </div>
            <div class="media-body text-truncate">
              <p class="mb-1">
                <a class="text-warning m-0" href="#">TASKS COMPLETION</a>
              </p>
              <div class="progress progress-xs m-0">
                <div class="progress-bar bg-warning progress-bar-striped" role="progressbar" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100" style="width: 22%">
                  <span class="sr-only">22% Complete</span>
                </div>
              </div>
            </div>
            <div class="ml-auto">
              <small class="text-muted ml-2">1w</small>
            </div>
          </div>
        </div>
        <!-- END list group item-->
      </div>
      <!-- END list group-->
      <!-- START card footer-->
      <div class="card-footer">
        <a class="text-sm" href="#">Load more</a>
      </div>
      <!-- END card-footer-->
    </div>
    <!-- END messages and activity-->
  </aside>
  <!-- END dashboard sidebar-->
</div>
@endsection

@section('scripts')
<!-- SPARKLINE-->
<script src="/userfiles/vendor/jquery-sparkline/jquery.sparkline.js"></script>
<!-- FLOT CHART-->
<script src="/userfiles/vendor/flot/jquery.flot.js"></script>
<script src="/userfiles/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
<script src="/userfiles/vendor/flot/jquery.flot.resize.js"></script>
<script src="/userfiles/vendor/flot/jquery.flot.pie.js"></script>
<script src="/userfiles/vendor/flot/jquery.flot.time.js"></script>
<script src="/userfiles/vendor/flot/jquery.flot.categories.js"></script>
<script src="/userfiles/vendor/jquery.flot.spline/jquery.flot.spline.js"></script>
<!-- EASY PIE CHART-->
<script src="/userfiles/vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script>
<!-- MOMENT JS-->
<script src="/userfiles/vendor/moment/min/moment-with-locales.js"></script>

@endsection
