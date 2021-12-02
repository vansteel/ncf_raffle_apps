<script>
    //Display player list
    $(document).ready(function() {
        var table = $('#player_table').DataTable({
            'processing': false,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?php echo base_url('Raffle2/playerList'); ?>'
            },
            'columns': [{
                    data: 'player_id'
                },
                {
                    data: 'player'
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

    //Display winner list
    $(document).ready(function() {
        var table = $('#winner_table').DataTable({
            dom: 'lfrtiB',
            'buttons': [
                'copy', 'excel', 'pdf', 'print'
            ],
            'processing': false,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?php echo base_url('Raffle2/winnerList'); ?>'
            },
            'columns': [{
                    data: 'winner_id'
                },
                {
                    data: 'winner'
                },
                {
                    data: 'department'
                },
            ]
        });
        setInterval(function() {
            table.ajax.reload(null, false); // user paging is not reset on reload
        }, 1000);
    });

    //Background Music
    const music = new Audio();
    music.src = "<?php echo base_url('audio/bg-music-free.mp3'); ?>";
    music.volume = 0.1;

    function play_music() {
        music.play();
        music.loop = true;
    }

    function pause_music() {
        music.pause();
    }

    function stop_music() {
        music.pause();
        music.currentTime = 0;
    }

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

    //Animation Effects
    const applause = new Audio();
    applause.src = "<?php echo base_url('audio/applause-free.mp3'); ?>";

    //Assign numSegments from sql
    function countType() {
        var test;
        $.ajax({
            type: "ajax",
            url: "<?php echo base_url('Raffle2/total_segment'); ?>",
            async: false,
            dataType: 'json',
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    test = data[i].counter;
                };
            }
        });
        return test;
    }

    // function display_segment() {
    //     var segmentName;
    //     $.ajax({
    //         type: "ajax",
    //         url: "<?php echo base_url('Raffle2/segment_name'); ?>",
    //         async: false,
    //         dataType: 'json',
    //         success: function(data) {
    //             for (var i = 0; i < data.length; i++) {
    //                 segmentName = data[i].type_code;
    //             }

    //         }
    //     });
    //     alert(segmentName)
    //     return segmentName;
    // }

    //colors for wheel
    //#ffff4d
    //#004d00
    var primary = '#006600';
    var secondary = 'white';
    var stroke = 'black';

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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
        }
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                                output += '<div class="">';
                                output += '<input class="form-control-plaintext animate__animated animate__infinite animate__flash" type="hidden" id="save_player_id" value="' + data[i].player_id + '" readonly >';
                                output += '</div>';
                                output += '<div class="col-10">';
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
            }, 0001); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
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
                //winner_list();
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