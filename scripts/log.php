<?php
include('functions.php');
$log = 'data.json'; // Path to log
$json = file_get_contents($log); // Load log contents
$data = json_decode($json, 1); // Convert JSON to array
if (is_array($data)) {
    krsort($data); //ordenar array ultimo en entrar primero en la lista
}

switch ($_GET['mode']) {
    
    case 'status':
        $id = $_GET['id'];
        $data[$id]['status'] = 1;
        save($data);
        break;
    case 'remove':
        $id = $_GET['id'];
        $data[$id]['status'] = 2;
        save($data);
        break;
    case 'stop':
        $id = $_GET['id'];
        $data[$id]['date_end'] = time();
        save($data);
        break;
    case 'new':
        $time = time();
        $data[$time]['id'] = $time;
        $data[$time]['name'] = $_GET['task'];
        $data[$time]['date_start'] = $time;
        $data[$time]['date_end'] = '';
        $data[$time]['status'] = 1;
        save($data);

        break;
    case 'tally':
        if (is_array($data)) {
            $count = 0;
            foreach ($data as $task) {
                if ($task['status'] == 1) {
                    if ($task['date_end'] == "") {
                        $task['date_end'] = time();
                    }
                    $count = $count + ($task['date_end'] - $task['date_start']);
                }
            }
        }
        echo time_nice($count);

        break;

    case 'build':
        if (is_array($data)) {

            foreach ($data as $task) {

                if ($task['status'] == 1) {
                    ?>
                    <tr>
                        <td><?= $task['name'] ?></td>
                        <td><?= dateNice($task['date_start']) ?></td>
                        <td><?php
                            if ($task['date_end'] != "") {
                                echo dateNice($task['date_end']);
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($task['date_end'] == "") {
                                echo time_nice(time() - $task['date_start']);
                            } else {
                                echo time_nice($task['date_end'] - $task['date_start']);
                            }
                            ?>
                        </td>
                        <td class="btn-col"><button data-id="<?= $task['id'] ?>" class="btn btn-xs btn-primary btn-stop" <?=($task['date_end'] != '')?'disabled':'' ?>><?= i('stop') ?></button></td>
                        <td class="btn-col"><button data-id="<?= $task['id'] ?>" class="btn btn-xs btn-danger  btn-remove"><?= i('times') ?></button></td>
                    </tr>
                    <?php
                }
            }
        }
        break;
        
        case 'restore':
        if (is_array($data)) {

            foreach ($data as $task) {

                if ($task['status'] == 2) {
                    ?>
                    <tr>
                        <td><?= $task['name'] ?></td>
                        <td><?= dateNice($task['date_start']) ?></td>
                        <td><?php
                            if ($task['date_end'] != "") {
                                echo dateNice($task['date_end']);
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($task['date_end'] == "") {
                                echo time_nice(time() - $task['date_start']);
                            } else {
                                echo time_nice($task['date_end'] - $task['date_start']);
                            }
                            ?>
                        </td>
                        <td class="btn-col"></td>
                        <td class="btn-col"><button data-id="<?= $task['id'] ?>" class="btn btn-xs btn-info  btn-restore"><?= i('refresh') ?></button></td>
                    </tr>
                    <?php
                }
            }
        }
        break;
}
