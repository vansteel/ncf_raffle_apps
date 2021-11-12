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
                    output += '<td><a href="javascript:void(0);" class="updateplayer ml-3" data-player_id="' + data[i].player_id + '" data-player_name="' + data[i].player_name + '" data-type_id="' + data[i].type_id + '"> <i class="fa fa-edit mr-2 funcbtn"></i></a><a href="javascript:void(0);" class="deleteplayer" data-player_id="' + data[i].player_id + '"><i class="fa fa-trash-o text-danger"></i></a></td>';
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
                    output += '<td><a href="javascript:void(0);" class="deletewinner" data-winner_id="' + data[i].winner_id + '"><i class="ml-4 fa fa-trash-o text-danger"></i></a></td>';
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

    //Wheel
    let theWheel = new Winwheel({
        'numSegments': 10,
        'segments': [{
                'fillStyle': ' #d6de21 ',
                'textFontSize': 10,
                'text': 'CCS/COE/CAS'
            },
            {
                'fillStyle': ' #ea82ef ',
                'textFontSize': 10,
                'text': 'CTED/CTF'
            },
            {
                'fillStyle': ' #e7f5f5 ',
                'textFontSize': 10,
                'text': 'SHS'
            },
            {
                'fillStyle': ' #c4d13d ',
                'textFontSize': 10,
                'text': 'CCJE'
            },
            {
                'fillStyle': ' #899292 ',
                'textFontSize': 10,
                'text': 'GS'
            },
            {
                'fillStyle': ' #cc6a52 ',
                'textFontSize': 10,
                'text': 'CBA'
            },
            {
                'fillStyle': ' #9773dc ',
                'textFontSize': 10,
                'text': 'CHS'
            },
            {
                'fillStyle': ' #73afdd ',
                'textFontSize': 10,
                'text': 'College EMP'
            },
            {
                'fillStyle': ' #956565 ',
                'textFontSize': 10,
                'text': 'NTP EMP'
            },
            {
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'BED/GS/ICD EMP'
            }
        ],
        'animation': // Note animation properties passed in constructor parameters.
        {
            'type': 'spinToStop', // Type of animation.
            'duration': 5, // How long the animation is to take in seconds.
            'spins': 8, // The number of complete 360 degree rotations the wheel is to do.
            'callbackFinished': 'alertPrize()'
        }
    });

    function alertPrize() {
        // Call getIndicatedSegment() function to return pointer to the segment pointed to on wheel.
        let winningSegment = theWheel.getIndicatedSegment();

        // Basic alert of the segment text which is the prize name.
        alert("You have won " + winningSegment.text + "!");
    }
    //Add section
    function addStudents() {
        function add1() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'CCS/COE/CAS'
            }, 1);
            theWheel.draw(); // Render changes.
        }

        function add2() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'CTED/CTF'
            }, 2);
            theWheel.draw(); // Render changes.
        }

        function add3() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'SHS'
            }, 3);
            theWheel.draw(); // Render changes.
        }
        function add4() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'CCJE'
            }, 4);
            theWheel.draw(); // Render changes.
        }
        function add5() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'GS'
            }, 5);
            theWheel.draw(); // Render changes.
        }
        function add6() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'CBA'
            }, 6);
            theWheel.draw(); // Render changes.
        }
        function add7() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'CHS'
            }, 7);
            theWheel.draw(); // Render changes.
        }
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
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'College EMP'
            });
            theWheel.draw(); // Render changes.
        }

        function addEMP2() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'NTP EMP'
            });
            theWheel.draw(); // Render changes.
        }

        function addEMP3() {
            $('#addSegment').modal('hide');
            theWheel.addSegment({
                'fillStyle': '#eae56f',
                'textFontSize': 10,
                'text': 'BED/GS/ICD EMP'
            });
            theWheel.draw(); // Render changes.
        }
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
        theWheel.draw();
    }

    function removeEmployees() {
        $('#removeSegment').modal('hide');
        theWheel.deleteSegment();
        theWheel.deleteSegment();
        theWheel.deleteSegment();
        theWheel.draw();
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

    $('#player_table').on('dblclick', '.updateplayer', function() {
        //GET THE DATA
        var player_id = $(this).data('player_id');
        var player_name = $(this).data('player_name');
        var type_id = $(this).data('type_id');
        //CAPTURE THE VALUE
        $('#player_id').val(player_id);
        $('#player_name').val(player_name);
        $('#type_id').val(type_id);


        if (confirm("Are you sure you want to update this user?")) {

            $('#modal_update_player').modal('show');


        }

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
                alert("NEW USER ADDED SUCCESSFULLY!");
                player_list();
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
</script>

</html>