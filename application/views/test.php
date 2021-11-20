<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #064518;">
        <a class="navbar-brand font-weight-bold" href="<?php echo base_url('Raffle2'); ?>">
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
                                canvas not supported in your browser
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
                                                    <th>Department</th>
                                                </tr>
                                            </thead>
                                            <tbody id="display_player">
                                                <!-- AJAX HERE -->
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        <table id="winner_table" class="table table-sm table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th >winner_id</th>
                                                    <th >winners</th>
                                                    <th >department</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>

    <footer id="sticky-footer" class="flex-shrink-0 py-3 bg-light text-white-50">
        <div class="container text-center">
            <small>Created by <span class="text-primary">Ivan Ramos</span></small>
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

<script>
    $(document).ready(function() {
        var table = $('#winner_table').DataTable({
            'processing': false,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?php echo base_url('Test/empList'); ?>'
            },
            'columns': [{
                    data: 'winner_id'
                },
                {
                    data: 'winners'
                },
                {
                    data: 'department'
                }
                

            ]
        });
        setInterval(function() {
            table.ajax.reload(null, false); // user paging is not reset on reload
        }, 1000);
    });
</script>

</html>


//Wheel Functions
    let theWheel = new Winwheel({
        'numSegments': 10,
        'innerRadius': 50,
        'textFontSize': 1,
        'textAlignment': 'center',
        'textFontFamily': 'Arial',
        'strokeStyle': 'darkgreen',
        'segments': [{
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'textFontSize': 9,
                'text': 'CCS/COE/CAS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CTED/TCP'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'SHS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CCJE'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'GS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CBM/CAF'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'CHS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'College EMP'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'NTP EMP'
            },
            {
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'textFontSize': 8,
                'text': 'BED/GS/ICD EMP'
            }
        ],
        'animation': {
            'type': 'spinToStop',
            'duration': 5,
            'spins': 8,
            'callbackFinished': alertPrize
        },
        'pins': // Turn pins on.
        {
            'number': 10,
            'fillStyle': 'lightgreen',
            'outerRadius': 4,
        }
    });

    // Get canvas and span objects.
    let canvas = document.getElementById('canvas');

    // Specify click handler for canvas.
    canvas.onclick = function(e) {
        // Call the getSegmentAt function passing the mouse x and y from the event.
        let clickedSegment = theWheel.getSegmentNumberAt(e.clientX, e.clientY);
        if (clickedSegment == 1) {

        }
        // A pointer to the segment clicked is returned if the user clicked inside the wheel.

        // if (clickedSegment) {
        //     // Change background colour of the segment and update the wheel.
        //     //clickedSegment.fillStyle = 'yellow';
        //     //theWheel.draw();

        //     $('#segment1').modal('show');


        // }


    }

    //actions after selecting segment in the wheel
    function alertPrize(indicatedSegment) {
        if (indicatedSegment.text == 'CCS/COE/CAS') {
            $('#segment1').modal('show');
        } else if (indicatedSegment.text == 'CTED/TCP') {
            $('#segment2').modal('show');
        } else if (indicatedSegment.text == 'SHS') {
            $('#segment3').modal('show');
        } else if (indicatedSegment.text == 'CCJE') {
            $('#segment4').modal('show');
        } else if (indicatedSegment.text == 'GS') {
            $('#segment5').modal('show');
        } else if (indicatedSegment.text == 'CBM/CAF') {
            $('#segment6').modal('show');
        } else if (indicatedSegment.text == 'CHS') {
            $('#segment7').modal('show');
        } else if (indicatedSegment.text == 'College EMP') {
            $('#segment8').modal('show');
        } else if (indicatedSegment.text == 'NTP EMP') {
            $('#segment9').modal('show');
        } else if (indicatedSegment.text == 'BED/GS/ICD EMP') {
            $('#segment10').modal('show');
        } else if (indicatedSegment.text == 'NCF') {
            Swal.fire('Merry Christmas, please try again!')
        }

    }
    // //Add section
    // function addStudents() {
    //     function addNull1() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'darkgreen',
    //             'textFillStyle': 'white',
    //             'textFontSize': 10,
    //             'text': 'NCF'
    //         }, 1);
    //         theWheel.draw(); // Render changes.
    //     }

    //     function add1() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'white',
    //             'textFillStyle': 'darkgreen',
    //             'textFontSize': 10,
    //             'text': 'CCS/COE/CAS'
    //         }, 2);
    //         theWheel.draw(); // Render changes.
    //     }

    //     function add2() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'darkgreen',
    //             'textFillStyle': 'white',
    //             'textFontSize': 10,
    //             'text': 'CTED/TCP'
    //         }, 3);
    //         theWheel.draw(); // Render changes.
    //     }

    //     function add3() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'white',
    //             'textFillStyle': 'darkgreen',
    //             'textFontSize': 10,
    //             'text': 'SHS'
    //         }, 4);
    //         theWheel.draw(); // Render changes.
    //     }

    //     function add4() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'darkgreen',
    //             'textFillStyle': 'white',
    //             'textFontSize': 10,
    //             'text': 'CCJE'
    //         }, 5);
    //         theWheel.draw(); // Render changes.
    //     }

    //     function add5() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'white',
    //             'textFillStyle': 'darkgreen',
    //             'textFontSize': 10,
    //             'text': 'GS'
    //         }, 6);
    //         theWheel.draw(); // Render changes.
    //     }

    //     function add6() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'darkgreen',
    //             'textFillStyle': 'white',
    //             'textFontSize': 10,
    //             'text': 'CBM/CAF'
    //         }, 7);
    //         theWheel.draw(); // Render changes.
    //     }

    //     function add7() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'white',
    //             'textFillStyle': 'darkgreen',
    //             'textFontSize': 10,
    //             'text': 'CHS'
    //         }, 8);
    //         theWheel.draw(); // Render changes.
    //     }
    //     addNull1();
    //     add1();
    //     add2();
    //     add3();
    //     add4();
    //     add5();
    //     add6();
    //     add7();
    // }

    // function addEmployees() {
    //     function addEMP1() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'darkgreen',
    //             'textFillStyle': 'white',
    //             'textFontSize': 10,
    //             'text': 'College EMP'
    //         });
    //         theWheel.draw(); // Render changes.
    //     }

    //     function addEMP2() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'white',
    //             'textFillStyle': 'darkgreen',
    //             'textFontSize': 10,
    //             'text': 'NTP EMP'
    //         });
    //         theWheel.draw(); // Render changes.
    //     }

    //     function addEMP3() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'darkgreen',
    //             'textFillStyle': 'white',
    //             'textFontSize': 10,
    //             'text': 'BED/GS/ICD EMP'
    //         });
    //         theWheel.draw(); // Render changes.
    //     }

    //     function addNull() {
    //         $('#addSegment').modal('hide');
    //         theWheel.addSegment({
    //             'fillStyle': 'white',
    //             'textFillStyle': 'darkgreen',
    //             'textFontSize': 10,
    //             'text': 'NCF'
    //         });
    //         theWheel.draw(); // Render changes.
    //     }
    //     addNull();
    //     addEMP1();
    //     addEMP2();
    //     addEMP3();

    // }
    //Remove Section
    function removeStudents() {
        let theWheel = new Winwheel({
            'numSegments': 4,
            'innerRadius': 50,
            'textFontSize': 1,
            'textAlignment': 'center',
            'textFontFamily': 'Arial',
            'strokeStyle': 'darkgreen',
            'segments': [{
                    'fillStyle': ' white ',
                    'textFillStyle': 'darkgreen',
                    'textFontSize': 9,
                    'text': 'College EMP'
                },
                {
                    'fillStyle': ' darkgreen ',
                    'textFillStyle': 'white',
                    'textFontSize': 10,
                    'text': 'NTP EMP'
                },
                {
                    'fillStyle': ' white ',
                    'textFillStyle': 'darkgreen',
                    'textFontSize': 10,
                    'text': 'BED/GS/ICD EMP'
                },
                {
                    'fillStyle': ' darkgreen ',
                    'textFillStyle': 'white',
                    'textFontSize': 10,
                    'text': 'NCF'
                },

            ],
            'animation': {
                'type': 'spinToStop',
                'duration': 5,
                'spins': 8,
                'callbackFinished': alertPrize
            },
            'pins': // Turn pins on.
            {
                'number': 10,
                'fillStyle': 'lightgreen',
                'outerRadius': 4,
            }
        });
        $('#removeSegment').modal('hide');
        // theWheel.deleteSegment(1);
        // theWheel.deleteSegment(1);
        // theWheel.deleteSegment(1);
        // theWheel.deleteSegment(1);
        // theWheel.deleteSegment(1);
        // theWheel.deleteSegment(1);
        // theWheel.deleteSegment(1);
        // theWheel.addSegment({
        //     'fillStyle': 'white',
        //     'textFillStyle': 'darkgreen',
        //     'textFontSize': 10,
        //     'text': 'NCF'
        // });
        theWheel.draw();
    }

    function removeEmployees() {
        $('#removeSegment').modal('hide');
        theWheel.deleteSegment();
        theWheel.deleteSegment();
        theWheel.deleteSegment();
        theWheel.addSegment({
            'fillStyle': 'darkgreen',
            'textFillStyle': 'white',
            'textFontSize': 10,
            'text': 'NCF'
        });
        theWheel.draw();
    }




    'segments': [{
                'fillStyle': ''+test+'',
                'textFillStyle': 'darkgreen',
                'text': 'CCS/COE/CAS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'text': 'CTED/TCP'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'text': 'SHS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'text': 'CCJE'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'text': 'GS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'text': 'CBM/CAF'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'text': 'CHS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'text': 'College EMP'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'text': 'NTP EMP'
            },
            {
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'text': 'BED/GS/ICD EMP'
            }
        ],



        //Wheel Functions
    let theWheel = new Winwheel({
        'numSegments': countType(),
        'innerRadius': 85,
        'textFontSize': 15,
        'textAlignment': 'center',
        'textFontFamily': 'Arial',
        'strokeStyle': 'darkgreen',
        'segments': [{
                'fillStyle': 'white',
                'textFillStyle': 'darkgreen',
                'text': 'CCS/COE/CAS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'text': 'CTED/TCP'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'text': 'SHS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'text': 'CCJE'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'text': 'GS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'text': 'CBM/CAF'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'text': 'CHS'
            },
            {
                'fillStyle': ' darkgreen ',
                'textFillStyle': 'white',
                'text': 'College EMP'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'darkgreen',
                'text': 'NTP EMP'
            },
            {
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'text': 'BED/GS/ICD EMP'
            }
        ],
        'animation': {
            'type': 'spinToStop',
            'duration': 5,
            'spins': 8,
            'callbackFinished': alertPrize
        },
        'pins': // Turn pins on.
        {
            'number': 10,
            'fillStyle': 'lightgreen',
            'outerRadius': 4,
        }
    });

    // Get canvas and span objects.
    let canvas = document.getElementById('canvas');

    //Specify click handler for canvas.
    canvas.onclick = function(e) {
        // Call the getSegmentAt function passing the mouse x and y from the event.
        let clickedSegment = theWheel.getSegmentNumberAt(e.clientX, e.clientY);

        if (clickedSegment == 1) {
            $('#segment1').modal('show');
        } else if (clickedSegment == 2) {
            $('#segment2').modal('show');
        } else if (clickedSegment == 3) {
            $('#segment3').modal('show');
        } else if (clickedSegment == 4) {
            $('#segment4').modal('show');
        } else if (clickedSegment == 5) {
            $('#segment5').modal('show');
        } else if (clickedSegment == 6) {
            $('#segment6').modal('show');
        } else if (clickedSegment == 7) {
            $('#segment7').modal('show');
        } else if (clickedSegment == 8) {
            $('#segment8').modal('show');
        } else if (clickedSegment == 9) {
            $('#segment9').modal('show');
        } else if (clickedSegment == 10) {
            $('#segment10').modal('show');
        }
    }

    //actions after selecting segment in the wheel
    function alertPrize(indicatedSegment) {
        if (indicatedSegment.text == 'CCS/COE/CAS') {
            $('#segment1').modal('show');
        } else if (indicatedSegment.text == 'CTED/TCP') {
            $('#segment2').modal('show');
        } else if (indicatedSegment.text == 'SHS') {
            $('#segment3').modal('show');
        } else if (indicatedSegment.text == 'CCJE') {
            $('#segment4').modal('show');
        } else if (indicatedSegment.text == 'GS') {
            $('#segment5').modal('show');
        } else if (indicatedSegment.text == 'CBM/CAF') {
            $('#segment6').modal('show');
        } else if (indicatedSegment.text == 'CHS') {
            $('#segment7').modal('show');
        } else if (indicatedSegment.text == 'College EMP') {
            $('#segment8').modal('show');
        } else if (indicatedSegment.text == 'NTP EMP') {
            $('#segment9').modal('show');
        } else if (indicatedSegment.text == 'BED/GS/ICD EMP') {
            $('#segment10').modal('show');
        } else if (indicatedSegment.text == 'NCF') {
            Swal.fire('Merry Christmas, please try again!')
        }

    }
    //Add section
    function addStudents() {
        function addNull1() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'NCF'
            }, 1);
            theWheel.draw(); // Render changes.
        }

        function add1() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'white',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'CCS/COE/CAS'
            }, 2);
            theWheel.draw(); // Render changes.
        }

        function add2() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CTED/TCP'
            }, 3);
            theWheel.draw(); // Render changes.
        }

        function add3() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'white',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'SHS'
            }, 4);
            theWheel.draw(); // Render changes.
        }

        function add4() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CCJE'
            }, 5);
            theWheel.draw(); // Render changes.
        }

        function add5() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'white',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'GS'
            }, 6);
            theWheel.draw(); // Render changes.
        }

        function add6() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CBM/CAF'
            }, 7);
            theWheel.draw(); // Render changes.
        }

        function add7() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'white',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'CHS'
            }, 8);
            theWheel.draw(); // Render changes.
        }
        addNull1();
        add1();
        add2();
        add3();
        add4();
        add5();
        add6();
        add7();
    }

    function addEmployees() {
        function addEMP1() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'College EMP'
            });
            theWheel.draw(); // Render changes.
        }

        function addEMP2() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'white',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'NTP EMP'
            });
            theWheel.draw(); // Render changes.
        }

        function addEMP3() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'darkgreen',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'BED/GS/ICD EMP'
            });
            theWheel.draw(); // Render changes.
        }

        function addNull() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'white',
                'textFillStyle': 'darkgreen',
                'textFontSize': 10,
                'text': 'NCF'
            });
            theWheel.draw(); // Render changes.
        }
        addNull();
        addEMP1();
        addEMP2();
        addEMP3();

    }
    //Remove Section
    function removeStudents() {
        $('#removeSegment').modal('hide');
        theWheel.deleteSegment(1);
        theWheel.deleteSegment(1);
        theWheel.deleteSegment(1);
        theWheel.deleteSegment(1);
        theWheel.deleteSegment(1);
        theWheel.deleteSegment(1);
        theWheel.deleteSegment(1);
        theWheel.addSegment({
            'fillStyle': 'white',
            'textFillStyle': 'darkgreen',
            'textFontSize': 10,
            'text': 'NCF'
        });
        theWheel.draw();
    }

    function removeEmployees() {
        $('#removeSegment').modal('hide');
        theWheel.deleteSegment();
        theWheel.deleteSegment();
        theWheel.deleteSegment();
        theWheel.addSegment({
            'fillStyle': 'darkgreen',
            'textFillStyle': 'white',
            'textFontSize': 10,
            'text': 'NCF'
        });
        theWheel.draw();
    }