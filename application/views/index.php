<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #064518;">
        <a class="navbar-brand font-weight-bold" href="<?php echo base_url('Raffle'); ?>">
            <img src="<?php echo base_url('img/ncf-logo.png'); ?>" width="30" height="30" class="d-inline-block align-top" alt="ncf logo">
            NAGA COLLEGE FOUNDATION, INC.
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Music
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#" onclick="play_music()"><i class="fas fa-play mr-2"></i>Play</a>
                        <a class="dropdown-item" href="#" onclick="pause_music()"><i class="fas fa-pause mr-2"></i>Pause</a>
                        <a class="dropdown-item" href="#" onclick="stop_music()"><i class="fas fa-stop mr-2"></i>Stop</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Roulette
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addSegment"><i class="fa fa-plus mr-2"></i>Add</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#removeSegment"><i class="fas fa-remove mr-2"></i>Remove</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#modal_add_player">Add Player</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="reset()">Reset</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        Fullscreen <i class="fas fa-expand-arrows-alt ml-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Router/logout'); ?>">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content-section mt-5 container">
        <div class="card card-outline card-success">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Column for wheel -->
                        <div id="canvasContainer">
                            <img id="prizePointer" class="mb-1" src="<?php echo base_url('img/pointer.png'); ?>" />
                            <canvas id='canvas' class="container-fluid" height="280px">
                                Canvas not supported, use another browser.
                            </canvas>
                            <button id="bigButton" class="btn btn-success" onclick="theWheel.startAnimation(); this.disabled=true;">Spin</button>
                            <a href="javascript:void(0);" onclick="theWheel.stopAnimation(false); theWheel.rotationAngle=0; theWheel.draw();  bigButton.disabled=false;">Reset</a>
                        </div>

                    </div>
                    <!-- Column for table -->
                    <div class="col-md-6">
                        <div class="card card-success card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Players</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Winners</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <table id="player_table" class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Players</th>
                                                    <th>Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="display_player">
                                                <!-- AJAX HERE -->
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        <table id="winner_table" class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Winners</th>
                                                    <th>Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="display_winner">
                                                <!-- AJAX HERE -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>



    <!-- jQuery -->
    <script src="<?php echo base_url('adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url('adminlte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/jszip/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('adminlte/dist/js/adminlte.min.js'); ?>"></script>
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Wheel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script src="<?php echo base_url('js/Winwheel.js'); ?>"></script>
    <!-- Confetti -->
    <script src="<?php echo base_url('js/confetti.js'); ?>"></script>


</body>



<!-- ===== This is the Modal ===== -->

<!-- Modal for adding segment in roulette -->
<div class="modal" id="addSegment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Category to Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button class="btn btn-block bg-gradient-success btn-lg" onclick="addStudents()">Students</button>
                <button class="btn btn-block bg-gradient-success btn-lg" onclick="addEmployees()">Employees</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal for adding segment in roulette -->

<!-- Modal for removing segment in roulette -->
<div class="modal" id="removeSegment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Category to Remove</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button class="btn btn-block bg-gradient-success btn-lg" onclick="removeStudents()">Students</button>
                <button class="btn btn-block bg-gradient-success btn-lg" onclick="removeEmployees()">Employees</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal for removing segment in roulette -->

<!-- The Modal For Update -->
<div class="modal fade" id="modal_update_player">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Player</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="container">
                <form id="updateplayerform" method="post">
                    <div class="form-group">
                        <label for="player_id">Player ID:</label>
                        <input type="text" class="form-control" id="player_id" name="player_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="player_name">PLayer Name:</label>
                        <input type="text" class="form-control" id="player_name" name="player_name" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" name="type_id" id="type_id" required>
                            <option value=""></option>
                            <?php foreach ($typex as $var1) { ?>
                                <option value="<?php echo $var1->type_id; ?>" id="<?php echo $var1->type_id; ?>"><?php echo $var1->type_code; ?></option>
                            <?php }; ?>

                        </select>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- The Modal For Create -->
<div class="modal fade" id="modal_add_player">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Player</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="container">
                <form id="saveplayerform" method="post">
                    <div class="form-group">
                        <label for="player_name">PLayer Name:</label>
                        <input type="text" class="form-control" id="player_namex" name="player_namex" required>
                    </div>
                    <div class="form-group">
                        <label for="type_id1">Type:</label>
                        <select class="form-control" name="type_id1" id="type_id1" required>
                            <option value=""></option>
                            <?php foreach ($typex as $var1) { ?>
                                <option value="<?php echo $var1->type_id; ?>" id="<?php echo $var1->type_id; ?>"><?php echo $var1->type_code; ?></option>
                            <?php }; ?>
                        </select>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for CCS/COE/CAS -->
<div class="modal fade" id="segment1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>College of Computer Studies</h2>
                <h2>College of Engineering</h2>
                <h2>College of Arts and Sciences</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment1()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for CTED/TCP -->
<div class="modal fade" id="segment2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>College of Teacher Education</h2>
                <h2>Teacher Certificate Program</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment2()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for SHS -->
<div class="modal fade" id="segment3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>Senior High School</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment3()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for CCJE -->
<div class="modal fade" id="segment4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>College of Criminal Justice Education</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment4()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for GS -->
<div class="modal fade" id="segment5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>Graduate Studies</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment5()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for CBA -->
<div class="modal fade" id="segment6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>College of Business and Accountancy</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment6()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for CHS -->
<div class="modal fade" id="segment7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>College of Health and Sciences</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment7()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for College Employee -->
<div class="modal fade" id="segment8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>College Employees</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment8()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for NTP Employee -->
<div class="modal fade" id="segment9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>Non Teaching Personnel</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment9()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for BED/GS/ICD Employee -->
<div class="modal fade" id="segment10" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Selecting Player From</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>Basic Education Employees</h2>
                <h2>Graduate Studies Employees</h2>
                <h2>ICD Employees</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="select_random_segment10()">Draw</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for selecting random player -->
<div class="modal fade" id="mymodal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title " id="mymodal">Congratulations to...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-white">
                <div id="modal_table1">
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" onclick="savewinner()" class="btn btn-success text-center">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- ===== /This is the Modal ===== -->