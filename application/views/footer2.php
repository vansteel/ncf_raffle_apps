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
            dom: 'Bfrtip',
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
                }


            ]
        });
        setInterval(function() {
            table.ajax.reload(null, false); // user paging is not reset on reload
        }, 1000);
    });

    //Background Music
    const music = new Audio();
    music.src = "<?php echo base_url('audio/music_draw.mp3'); ?>";
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
    //const applause = new Audio();
    //applause.src = "<?php echo base_url('audio/applause.mp3'); ?>";

    //Wheel Functions
    let theWheel = new Winwheel({
        'numSegments': 10,
        'innerRadius': 50,
        'textFontSize': 1,
        'textAlignment': 'center',
        'textFontFamily': 'Arial',
        'strokeStyle' : 'darkgreen',
        'segments': [{
                'fillStyle': ' white ',
                'textFillStyle': 'green',
                'textFontSize': 9,
                'text': 'CCS/COE/CAS'
            },
            {
                'fillStyle': ' green ',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CTED/TCP'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'green',
                'textFontSize': 10,
                'text': 'SHS'
            },
            {
                'fillStyle': ' green ',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CCJE'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'green',
                'textFontSize': 10,
                'text': 'GS'
            },
            {
                'fillStyle': ' green ',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CBA'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'green',
                'textFontSize': 10,
                'text': 'CHS'
            },
            {
                'fillStyle': ' green ',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'College EMP'
            },
            {
                'fillStyle': ' white ',
                'textFillStyle': 'green',
                'textFontSize': 10,
                'text': 'NTP EMP'
            },
            {
                'fillStyle': 'green',
                'textFillStyle': 'white',
                'textFontSize': 8,
                'text': 'BED/GS/ICD EMP'
            }
        ],
        'animation': 
        {
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
        } else if (indicatedSegment.text == 'CBA') {
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
                'fillStyle': 'green',
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
                'textFillStyle': 'green',
                'textFontSize': 10,
                'text': 'CCS/COE/CAS'
            }, 2);
            theWheel.draw(); // Render changes.
        }

        function add2() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'green',
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
                'textFillStyle': 'green',
                'textFontSize': 10,
                'text': 'SHS'
            }, 4);
            theWheel.draw(); // Render changes.
        }

        function add4() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'green',
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
                'textFillStyle': 'green',
                'textFontSize': 10,
                'text': 'GS'
            }, 6);
            theWheel.draw(); // Render changes.
        }

        function add6() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'green',
                'textFillStyle': 'white',
                'textFontSize': 10,
                'text': 'CBA'
            }, 7);
            theWheel.draw(); // Render changes.
        }

        function add7() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'white',
                'textFillStyle': 'green',
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
                'fillStyle': 'green',
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
                'textFillStyle': 'green',
                'textFontSize': 10,
                'text': 'NTP EMP'
            });
            theWheel.draw(); // Render changes.
        }

        function addEMP3() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': 'green',
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
                'textFillStyle': 'green',
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
            'textFillStyle': 'green',
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
            'fillStyle': 'green',
            'textFillStyle': 'white',
            'textFontSize': 10,
            'text': 'NCF'
        });
        theWheel.draw();
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