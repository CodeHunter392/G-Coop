<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

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
            </div>

        </div>


        <div class="row">

            <section class="col-lg-7 connectedSortable ui-sortable">

                <div class="card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Sales
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">

                            <div class="chart tab-pane active" id="revenue-chart"
                                style="position: relative; height: 300px;">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="revenue-chart-canvas" height="300"
                                    style="height: 300px; display: block; width: 573px;" width="573"
                                    class="chartjs-render-monitor"></canvas>
                            </div>

                        </div>
                    </div>
                </div>

            </section>


            <section class="col-lg-5 connectedSortable ui-sortable">

                <div class="card">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Sales
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li>
                                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">

                            <div class="chart tab-pane active" id="revenue-chart"
                                style="position: relative; height: 300px;">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="revenue-chart-canvas" height="300"
                                    style="height: 300px; display: block; width: 573px;" width="573"
                                    class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                <canvas id="sales-chart-canvas" height="0"
                                    style="height: 0px; display: block; width: 0px;" class="chartjs-render-monitor"
                                    width="0"></canvas>
                            </div>
                        </div>
                    </div>
                </div>







            </section>
            <section class="col-12">
                <div class="card bg-gradient-info">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-th mr-1"></i>
                            Sales Graph
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas class="chart chartjs-render-monitor" id="line-chart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 394px;"
                            width="394" height="250"></canvas>
                    </div>

                    <div class="card-footer bg-transparent">
                        <div class="row">
                            <div class="col-4 text-center">
                                <div style="display:inline;width:60px;height:60px;"><canvas width="60"
                                        height="60"></canvas><input type="text" class="knob" data-readonly="true"
                                        value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC"
                                        readonly="readonly"
                                        style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                                </div>
                                <div class="text-white">Mail-Orders</div>
                            </div>

                            <div class="col-4 text-center">
                                <div style="display:inline;width:60px;height:60px;"><canvas width="60"
                                        height="60"></canvas><input type="text" class="knob" data-readonly="true"
                                        value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC"
                                        readonly="readonly"
                                        style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                                </div>
                                <div class="text-white">Online</div>
                            </div>

                            <div class="col-4 text-center">
                                <div style="display:inline;width:60px;height:60px;"><canvas width="60"
                                        height="60"></canvas><input type="text" class="knob" data-readonly="true"
                                        value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC"
                                        readonly="readonly"
                                        style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                                </div>
                                <div class="text-white">In-Store</div>
                            </div>

                        </div>

                    </div>

                </div>
            </section>

        </div>

    </div>
</section>
