<script>
    $(document).ready(function() {
        $('#player_table').DataTable();
    });
    player_list();

    function player_list() {
        $.ajax({
            type: "ajax",
            url: "<?php echo base_url('Raffle/display_player_list'); ?>",
            async: false,
            dataType: 'json',
            success: function(data) {
                var output;
                for (var i = 0; i < data.length; i++) {
                    output += '<tr id="' + data[i].player_id + '">';
                    output += '<td>' + data[i].player_id + '</td>';
                    output += '<td>' + data[i].player_name + '</td>';
                    output += '<td>' + data[i].type_code + '</td>';
                    output += '<td><a href="javascript:void(0);" class="updateplayer ml-1" data-player_id="' + data[i].player_id + '" data-player_name="' + data[i].player_name + '" data-type_id="' + data[i].type_id + '"> <i class="fa fa-edit mr-1"></i></a><a href="javascript:void(0);" class="deleteplayer" data-player_id="' + data[i].player_id + '"><i class="fa fa-trash-o text-danger"></i></a></td>';
                    output += '</tr>';
                }
                $('#display_player').html(output);
            },
            error: function() {
                alert('error');
            }
        });
    };

    $(document).ready(function() {
        $('#winner_table').DataTable();
    });
    //Display winner list
    winner_list();

    function winner_list() {
        $.ajax({
            type: "ajax",
            url: "<?php echo base_url('Raffle/display_winner_list'); ?>",
            async: false,
            dataType: 'json',
            success: function(data) {
                var output;
                for (var i = 0; i < data.length; i++) {
                    output += '<tr id="' + data[i].winner_id + '">';
                    output += '<td>' + data[i].winner_id + '</td>';
                    output += '<td>' + data[i].player_name + '</td>';
                    output += '<td>' + data[i].type_code + '</td>';
                    output += '<td><a href="javascript:void(0);" class="deletewinner ml-2" data-winner_id="' + data[i].winner_id + '"><i class="ml-4 fa fa-trash-o text-danger"></i></a></td>';
                    output += '</tr>';
                }
                $('#display_winner').html(output);
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });
    }

    //Background Music
    const music = new Audio();
    music.src = "<?php echo base_url('audio/bg-music-free.mp3'); ?>";
    music.loop;
    music.volume = 0.1;

    function play_music() {
        music.play();
    }

    function pause_music() {
        music.pause();
    }

    function stop_music() {
        music.pause();
        music.currentTime = 0;
    }

    //Animation Effects
    const applause = new Audio();
    applause.src = "<?php echo base_url('audio/applause-free.mp3'); ?>";

    //Reset Button
    function reset() {
        Swal.fire({
            title: 'Reset Winner List?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    dataType: "JSON",
                    url: "<?php echo base_url('Raffle/reset_winner_list'); ?>",
                    success: function(data) {
                        //winner_list();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Reset Success',
                            text: 'Please reload your webpage',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                });
            }
        })
    }

    //colors for wheel
    var primary = '#ffff4d';
    var secondary = '#004d00';
    var stroke = 'silver';

    allWheel();
    //Wheel Functions for All Category
    function allWheel() {

        let theWheel = new Winwheel({
            'numSegments': 12,
            'innerRadius': 85,
            'textFontSize': 15,
            'textAlignment': 'center',
            'textFontFamily': 'Arial',
            'strokeStyle': ''+stroke+'',
            'segments': [{
                    'fillStyle': '' + primary + '',
                    'textFillStyle': '' + secondary + '',
                    'text': 'CCS/COE/CAS'
                },
                {
                    'fillStyle': ' ' + secondary + ' ',
                    'textFillStyle': '' + primary + '',
                    'text': 'CTED/TCP'
                },
                {
                    'fillStyle': ' ' + primary + ' ',
                    'textFillStyle': '' + secondary + '',
                    'text': 'SHS'
                },
                {
                    'fillStyle': ' ' + secondary + ' ',
                    'textFillStyle': '' + primary + '',
                    'text': 'CCJE'
                },
                {
                    'fillStyle': ' ' + primary + ' ',
                    'textFillStyle': '' + secondary + '',
                    'text': 'GS'
                },
                {
                    'fillStyle': ' ' + secondary + ' ',
                    'textFillStyle': '' + primary + '',
                    'text': 'CBM/CAF'
                },
                {
                    'fillStyle': ' ' + primary + ' ',
                    'textFillStyle': '' + secondary + '',
                    'text': 'CHS'
                },
                {
                    'fillStyle': ' ' + secondary + ' ',
                    'textFillStyle': '' + primary + '',
                    'text': 'College EMP'
                },
                {
                    'fillStyle': ' ' + primary + ' ',
                    'textFillStyle': '' + secondary + '',
                    'text': 'NTP EMP'
                },
                {
                    'fillStyle': '' + secondary + '',
                    'textFillStyle': '' + primary + '',
                    'text': 'BED/GS/ICD EMP'
                },
                {
                    'fillStyle': ' ' + primary + ' ',
                    'textFillStyle': '' + secondary + '',
                    'text': 'Click to Spin'
                },
                {
                    'fillStyle': '' + secondary + '',
                    'textFillStyle': '' + primary + '',
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
                'number': 12,
                'fillStyle': 'lightgreen',
                'outerRadius': 5,
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
            } else if (clickedSegment == 11) {
                theWheel.startAnimation();
                theWheel.rotationAngle = 0;
            } else if (clickedSegment == 12) {
                Swal.fire('Merry Christmas, please try again!')
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
            } else Swal.fire('Try Again!');
        }
    }

    //Wheel function for Student
    function studentWheel() {
        let theWheel = new Winwheel({
            'numSegments': 8,
            'innerRadius': 85,
            'textFontSize': 15,
            'textAlignment': 'center',
            'textFontFamily': 'Arial',
            'strokeStyle': ''+stroke+'',
            'segments': [{
                    'fillStyle': ''+primary+'',
                    'textFillStyle': ''+secondary+'',
                    'text': 'CCS/COE/CAS'
                },
                {
                    'fillStyle': ' '+secondary+' ',
                    'textFillStyle': ''+primary+'',
                    'text': 'CTED/TCP'
                },
                {
                    'fillStyle': ' '+primary+' ',
                    'textFillStyle': ''+secondary+'',
                    'text': 'SHS'
                },
                {
                    'fillStyle': ' '+secondary+' ',
                    'textFillStyle': ''+primary+'',
                    'text': 'CCJE'
                },
                {
                    'fillStyle': ' '+primary+' ',
                    'textFillStyle': ''+secondary+'',
                    'text': 'GS'
                },
                {
                    'fillStyle': ' '+secondary+' ',
                    'textFillStyle': ''+primary+'',
                    'text': 'CBM/CAF'
                },
                {
                    'fillStyle': ' '+primary+' ',
                    'textFillStyle': ''+secondary+'',
                    'text': 'CHS'
                },
                {
                    'fillStyle': ' '+secondary+' ',
                    'textFillStyle': ''+primary+'',
                    'text': 'Click To Spin'
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
                'number': 8,
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
                theWheel.startAnimation();
                theWheel.rotationAngle = 0;
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
            } else Swal.fire('Merry Christmas, please try again!')
        }
    }

    //Wheel function for employee
    function employeeWheel() {
        let theWheel = new Winwheel({
            'numSegments': 4,
            'innerRadius': 85,
            'textFontSize': 15,
            'textAlignment': 'center',
            'textFontFamily': 'Arial',
            'strokeStyle': ''+stroke+'',
            'segments': [{
                    'fillStyle': ''+primary+'',
                    'textFillStyle': ''+secondary+'',
                    'text': 'College EMP'
                },
                {
                    'fillStyle': ' '+secondary+' ',
                    'textFillStyle': ''+primary+'',
                    'text': 'NTP EMP'
                },
                {
                    'fillStyle': ' '+primary+' ',
                    'textFillStyle': ''+secondary+'',
                    'text': 'BED/GS/ICD EMP'
                },
                {
                    'fillStyle': ' '+secondary+' ',
                    'textFillStyle': ''+primary+'',
                    'text': 'Click To Spin'
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
                'number': 4,
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
                $('#segment8').modal('show');
            } else if (clickedSegment == 2) {
                $('#segment9').modal('show');
            } else if (clickedSegment == 3) {
                $('#segment10').modal('show');
            } else if (clickedSegment == 4) {
                theWheel.startAnimation();
                theWheel.rotationAngle = 0;
            }
        }

        //actions after selecting segment in the wheel
        function alertPrize(indicatedSegment) {
            if (indicatedSegment.text == 'College EMP') {
                $('#segment8').modal('show');
            } else if (indicatedSegment.text == 'NTP EMP') {
                $('#segment9').modal('show');
            } else if (indicatedSegment.text == 'BED/GS/ICD EMP') {
                $('#segment10').modal('show');
            } else Swal.fire('Merry Christmas, please try again!')
        }
    }

    //Delete specific player
    $('#display_player').on('click', '.deleteplayer', function() {
        var player_id = $(this).data('player_id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        player_id: player_id
                    },
                    url: "<?php echo base_url('Raffle/delete_player'); ?>",
                    success: function(data) {
                        player_list();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Deletion Success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                });
            }
        })
        return false;
    });

    //Delete specific winner
    $('#display_winner').on('click', '.deletewinner', function() {
        var winner_id = $(this).data('winner_id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        winner_id: winner_id
                    },
                    url: "<?php echo base_url('Raffle/delete_winner'); ?>",
                    success: function(data) {
                        winner_list();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Deletion Success',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                });
            }
        })
        return false;
    });

    $('#player_table').on('click', '.updateplayer', function() {
        //GET THE DATA
        var player_id = $(this).data('player_id');
        var player_name = $(this).data('player_name');
        var type_id = $(this).data('type_id');
        //CAPTURE THE VALUE
        $('#player_id').val(player_id);
        $('#player_name').val(player_name);
        $('#type_id').val(type_id);

        Swal.fire({
            title: 'Update Player',
            text: "you sure you want to update this player?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#modal_update_player').modal('show');
            }
        })
        return false;
    });

    //------------------------------------------------------THIS CODE WILL UPDATE THE USER INFORMATION-----------------------------------------------------//

    $('#updateplayerform').submit('click', function() {
        //CAPTURE THE UPDATED VALUE
        var player_id = $('#player_id').val();
        var player_name = $('#player_name').val();
        var type_id = $('#type_id').val();
        $.ajax({

            type: "POST",
            dataType: "JSON",
            data: {
                player_id: player_id,
                player_name: player_name,
                type_id: type_id,
            },
            url: "<?php echo base_url('Raffle/update_player'); ?>",
            success: function(data) {
                $('#modal_update_player').modal('hide');
                player_list();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Update Success',
                    showConfirmButton: false,
                    timer: 1000
                })
            },
            error: function(data) {
                alert("ERROR");
            }

        });

        return false;
    });

    //------------------------------------------------------THIS CODE WILL CREATE A NEW USER-----------------------------------------------------//

    $('#saveplayerform').submit('click', function() {
        //CAPTURE THE VALUE
        var player_name = $('#player_namex').val();
        var type_id = $('#type_id1').val();
        $.ajax({

            type: "POST",
            dataType: "JSON",
            data: {
                player_name: player_name,
                type_id: type_id,
            },
            url: "<?php echo base_url('Raffle/save_player'); ?>",
            success: function(data) {
                $('#modal_add_player').modal('hide');
                player_list();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Added Successfully',
                    showConfirmButton: false,
                    timer: 1000
                })
                clearuser();
            },
            error: function(data) {
                alert("ERROR");
            }

        });

        return false;
    });

    //Clear
    function clearuser() {
        $('#player_namex').val('');
        $('#type_id1').val('');
    }

    //Select random player from segment 1
    function select_random_segment1() {
        $('#segment1').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment1'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 2
    function select_random_segment2() {
        $('#segment2').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment2'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 3
    function select_random_segment3() {
        $('#segment3').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment3'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 4
    function select_random_segment4() {
        $('#segment4').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment4'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 5
    function select_random_segment5() {
        $('#segment5').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment5'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 6
    function select_random_segment6() {
        $('#segment6').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment6'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 7
    function select_random_segment7() {
        $('#segment7').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment7'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 8
    function select_random_segment8() {
        $('#segment8').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment8'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 9
    function select_random_segment9() {
        $('#segment9').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment9'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Select random player from segment 10
    function select_random_segment10() {
        $('#segment10').modal('hide');
        $('#mymodal1').modal('show');
        for (var time = 0; time < 35; time++) {
            var interval = 0;
            start();

            function start() {
                setTimeout(function() {
                    $.ajax({
                        type: "ajax",
                        url: "<?php echo base_url('Raffle/select_random_segment10'); ?>",
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var output;
                            for (var i = 0; i < data.length; i++) {
                                output += '<tr id="' + data[i].player_id + '">';
                                output += '<td>';
                                output += '<form id="savewinnerform" method="post" class="">';
                                output += '<div class="form-row style="font-size:24px;"">';
                                output += '<div class="col-1">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-9">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash text-center" type="text" id="save_player_name" value="' + data[i].player_name + '" style="font-size:36px;">';
                                output += '</div>';
                                output += '<div class="col-2">';
                                output += '<input readonly class="form-control-plaintext animate__animated animate__infinite animate__flash" type="text" id="save_type_code" value="' + data[i].type_code + '">';
                                output += '</div>';
                                output += '</div>';
                                output += '</form>';
                                output += '</td>';
                                output += '</tr>';
                            }
                            $('#modal_table1').html(output);
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    });
                    setTimeout(function() {
                        interval = 60;
                        setInterval(function() {}, interval = 1000);
                    }, interval = 1000)
                })
            }
        }
        // start
        const startA = () => {
            setTimeout(function() {
                confetti.start()
                applause.play()
            }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        };
        //  Stop
        const stopA = () => {
            setTimeout(function() {
                confetti.stop()
            }, 5000); // 5000 is time that after 5 second stop the confetti ( 5000 = 5 sec)
        };
        startA();
        stopA();

    }

    //Save selected random player in winner list
    function savewinner() {
        var player_id = $('#save_player_id').val();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: {
                player_id: player_id
            },
            url: "<?php echo base_url('Raffle/save_winner'); ?>",
            success: function(data) {
                winner_list();
                $('#mymodal1').modal('hide');
                $('#mymodal2').modal('hide');
                $('#mymodal3').modal('hide');
                $('#mymodal4').modal('hide');
                $('#mymodal5').modal('hide');
                $('#mymodal6').modal('hide');
                $('#mymodal7').modal('hide');
            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });
    }
</script>

</html>