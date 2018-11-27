<template>
    <div class="container-fluid">
        <div class="page-header">
            <h4 class="page-title"><i class="flaticon-home"></i> Dashboard</h4>
            <div class="btn-group btn-group-page-header ml-auto">
                <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="la la-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu">
                    <div class="arrow"></div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-users"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Users</p>
                                    <h4 class="card-title">{{ users.length }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-danger card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-delivery-truck"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Drivers</p>
                                    <h4 class="card-title">{{ users.length }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-graph"></i>

                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Order</p>
                                    <h4 class="card-title">1303</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-profile-1"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Business</p>
                                    <h4 class="card-title">$ 1,345</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Provider</p>
                                    <h4 class="card-title">576</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Users Statistics</div>
                            <div class="card-tools">
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                    <span class="btn-label">
                                        <i class="la la-pencil"></i>
                                    </span> Export
                                </a>
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                    <span class="btn-label">
                                        <i class="la la-print"></i>
                                    </span> Print
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users Percentage</h4>
                        <p class="card-category">
                            Users percentage this month</p>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="usersChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <h4 class="card-title">Users Geolocation</h4>
                            <div class="card-tools">
                                <a href="#" class="btn btn-primary btn-icon-only"><span class="icon flaticon-down-arrow"></span></a>
                                <a href="#" class="btn btn-primary btn-icon-only"><span class="icon flaticon-repeat"></span></a>
                                <a href="#" class="btn btn-primary btn-icon-only"><span class="icon flaticon-cross"></span></a>
                            </div>
                        </div>
                        <p class="card-category">
                            Map of the distribution of users around the world</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive table-hover table-sales">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="assets/img/flags/id.png" alt="indonesia">
                                                    </div>
                                                </td>
                                                <td>Indonesia</td>
                                                <td class="text-right">
                                                    2.320
                                                </td>
                                                <td class="text-right">
                                                    42.18%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="assets/img/flags/us.png" alt="united states">
                                                    </div>
                                                </td>
                                                <td>USA</td>
                                                <td class="text-right">
                                                    240
                                                </td>
                                                <td class="text-right">
                                                    4.36%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="assets/img/flags/au.png" alt="australia">
                                                    </div>
                                                </td>
                                                <td>Australia</td>
                                                <td class="text-right">
                                                    119
                                                </td>
                                                <td class="text-right">
                                                    2.16%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="assets/img/flags/ru.png" alt="russia">
                                                    </div>
                                                </td>
                                                <td>Russia</td>
                                                <td class="text-right">
                                                    1.081
                                                </td>
                                                <td class="text-right">
                                                    19.65%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="assets/img/flags/cn.png" alt="china">
                                                    </div>
                                                </td>
                                                <td>China</td>
                                                <td class="text-right">
                                                    1.100
                                                </td>
                                                <td class="text-right">
                                                    20%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="assets/img/flags/br.png" alt="brazil">
                                                    </div>
                                                </td>
                                                <td>Brasil</td>
                                                <td class="text-right">
                                                    640
                                                </td>
                                                <td class="text-right">
                                                    11.63%
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mapcontainer">
                                    <div id="map-example" class="vmap"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-md-4 mt-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <p class="fw-mediumbold mt-1">My Balance</p>
                        <h4 class="text-primary"><b>$ 3,018</b></h4>
                        <a href="#" class="btn btn-primary btn-full text-left mt-3 mb-3"><i class="la la-plus"></i> Add Balance</a>
                    </div>
                    <div class="card-footer mt-auto">
                        <ul class="nav">
                            <li class="nav-item"><a class="btn btn-default btn-link" href="#"><i class="la la-history"></i> History</a></li>
                            <li class="nav-item ml-auto"><a class="btn btn-default btn-link" href="#"><i class="la la-refresh"></i> Refresh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="progress-card">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Profit</span>
                                <span class="text-muted fw-bold"> $3K</span>
                            </div>
                            <div class="progress mb-2" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="78%"></div>
                            </div>
                        </div>
                        <div class="progress-card">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Orders</span>
                                <span class="text-muted fw-bold"> 576</span>
                            </div>
                            <div class="progress mb-2" style="height: 7px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="65%"></div>
                            </div>
                        </div>
                        <div class="progress-card">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Tasks Complete</span>
                                <span class="text-muted fw-bold"> 70%</span>
                            </div>
                            <div class="progress mb-2" style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="70%"></div>
                            </div>
                        </div>
                        <div class="progress-card">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Open Rate</span>
                                <span class="text-muted fw-bold"> 60%</span>
                            </div>
                            <div class="progress mb-2" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-3">
                <div class="card card-stats">
                    <div class="card-body">
                        <p class="fw-mediumbold mt-1">Statistic</p>
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center icon-warning">
                                    <i class="la la-pie-chart text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Number</p>
                                    <h4 class="card-title">150GB</h4>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-heart-o text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Followers</p>
                                    <h4 class="card-title">+45K</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card card-tasks">
                    <div class="card-header ">
                        <div class="card-head-row">
                            <h4 class="card-title">Tasks</h4>
                            <div class="card-tools">
                                <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home" data-toggle="pill" href="#pills-home" role="tab" aria-selected="true">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile" data-toggle="pill" href="#pills-profile" role="tab" aria-selected="false">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact" data-toggle="pill" href="#pills-contact" role="tab" aria-selected="false">Month</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-full-width">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input  select-all-checkbox" type="checkbox" data-select="checkbox" data-target=".task-select">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </th>
                                        <th>Task</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input task-select" type="checkbox">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>Planning new project structure</td>
                                        <td class="td-actions text-center">
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link btn-primary">
                                                    <i class="la la-edit"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-danger">
                                                    <i class="la la-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input task-select" type="checkbox">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>Update Fonts</td>
                                        <td class="td-actions text-center">
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link btn-primary">
                                                    <i class="la la-edit"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-danger">
                                                    <i class="la la-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input task-select" type="checkbox">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>Add new Post
                                        </td>
                                        <td class="td-actions text-center">
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link btn-primary">
                                                    <i class="la la-edit"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-danger">
                                                    <i class="la la-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input task-select" type="checkbox">
                                                    <span class="form-check-sign"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>Finalise the design proposal</td>
                                        <td class="td-actions text-center">
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link btn-primary">
                                                    <i class="la la-edit"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-danger">
                                                    <i class="la la-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="stats">
                            <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Task Progress</h4>
                    </div>
                    <div class="card-body">
                        <div id="task-complete" class="chart-circle mt-4 mb-3"></div>
                    </div>
                    <div class="card-footer">
                        <div class="legend"><i class="la la-circle text-primary"></i> Completed</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="card-title">Suggested People</div>
                        <div class="card-list">
                            <div class="item-list">
                                <img src="assets/img/jm_denis.jpg" alt="denis" class="small-pic">
                                <div class="info-user ml-3">
                                    <div class="username">Jimmy Denis</div>
                                    <div class="status">Graphic Designer</div>
                                </div>
                                <a href="#" class="btn btn-add">
                                    <i class="la la-plus"></i>
                                </a>
                            </div>
                            <div class="item-list">
                                <img src="assets/img/chadengle.jpg" alt="chad" class="small-pic">
                                <div class="info-user ml-3">
                                    <div class="username">Chad</div>
                                    <div class="status">CEO Zeleaf</div>
                                </div>
                                <a href="#" class="btn btn-add">
                                    <i class="la la-plus"></i>
                                </a>
                            </div>
                            <div class="item-list">
                                <img src="assets/img/mlane.jpg" alt="john doe" class="small-pic">
                                <div class="info-user ml-3">
                                    <div class="username">Jhon doe</div>
                                    <div class="status">Content Writer</div>
                                </div>
                                <a href="#" class="btn btn-add">
                                    <i class="la la-plus"></i>
                                </a>
                            </div>
                            <div class="item-list">
                                <img src="assets/img/talha.jpg" alt="talha" class="small-pic">
                                <div class="info-user ml-3">
                                    <div class="username">Talha</div>
                                    <div class="status">Front End Designer</div>
                                </div>
                                <a href="#" class="btn btn-add">
                                    <i class="la la-plus"></i>
                                </a>
                            </div>
                            <div class="item-list">
                                <img src="assets/img/sauro.jpg" alt="sauro" class="small-pic">
                                <div class="info-user ml-3">
                                    <div class="username">Sauro</div>
                                    <div class="status">Back End Developer</div>
                                </div>
                                <a href="#" class="btn btn-add">
                                    <i class="la la-plus"></i>
                                </a>
                            </div>
                            <div class="item-list">
                                <img src="assets/img/arashmil.jpg" alt="arash mil" class="small-pic">
                                <div class="info-user ml-3">
                                    <div class="username">Arash Mil</div>
                                    <div class="status">Content Writer</div>
                                </div>
                                <a href="#" class="btn btn-add">
                                    <i class="la la-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'home',
        created() {
            this.$store.dispatch('getUsersList');
        },
        methods: {

        },
        computed: {
            currentUser() {
                return this.$store.getters.currentUser
            },
            users() {
                return this.$store.getters.users;
            }
        }
    }
</script>
