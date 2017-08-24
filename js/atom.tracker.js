function build(mode) {
    $('#log').load('scripts/log.php?mode='+mode);
    tally();
}
function tally() {
    $('#tally').load('scripts/log.php?mode=tally');
}

$(function () {

    build('build');

    setInterval(function () {
        var mode = $('#btn-mode').data('mode');
        if (mode == 'restore'){
             build('build');
        }else{            
             build('restore');
        }
       
           

    }, 30000);

    $('#btn-mode').on('click', function (event) {
        event.preventDefault();
        var mode = $(this).data('mode');
        if (mode == 'restore') {
            $('#lbl-mode').html('Live');
            build('restore');
            $(this).data('mode','live');
        } else {
             build('build');
              $('#lbl-mode').html('Restore');
             $(this).data('mode','restore');
        }
    });

    // New Task Form:
    $('#form-new').submit(function (event) {
        event.preventDefault();
        var form = $(this);
        //var task = $('#task').val();
        //console.log(task);
        var data = form.serialize();
        $.ajax({
            url: 'scripts/log.php?mode=new',
            data: data,
            success: function(data) {
                build('build');
                $("#task").val("");
            }
        });
    }); // END #form-new on submit

    $('#log').on('click', '.btn-stop', function () {
        var id = $(this).data('id');
        $.ajax({
            url: 'scripts/log.php?mode=stop&id=' + id,
            success: function () {
                build('build');

            }
        });
    });
    // Restore Task:

    //Remove Task
    $("#log").on('click', '.btn-remove', function () {
        var id = $(this).data('id');
        $.ajax({
            url: 'scripts/log.php?mode=remove&id=' + id,
            success: function () {
                build('build');

            }
        });

    });
    
    //Active task
    $("#log").on('click', '.btn-restore', function () {
        var id = $(this).data('id');
        $.ajax({
            url: 'scripts/log.php?mode=status&id=' + id,
            success: function () {
                build('restore');

            }
        });

    });

}); // END Document Ready
