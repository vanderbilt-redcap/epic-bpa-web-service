<style>
    .epic-bpa-table-header{
        margin-top: 50px;
    }

    .server-url-input, .epic-bpa-table textarea{
        color: #656565;
        padding: 3px 4px;
    }

    .server-url-input{
        width: 800px;
    }

    .epic-bpa-table td:first-child{
        width: 175px;
    }

    .epic-bpa-table textarea{
        width: 100%;
        height: 200px;
    }
</style>

<h3>Epic BPA Web Service Test</h3>

Please configure Epic to post to the following endpoint:<br>
<br>
<input class='server-url-input' value="<?=$module->getUrl('service.php', true)?>" onclick='this.select()' readonly>

<h5 class='epic-bpa-table-header'>POSTed Data Log</h5>
<table class='table epic-bpa-table'>
    <tr>
        <th>Date & Time</th>
        <th>Post Data</th>
    </tr>

    <?php
    $result = $module->queryLogs("
        select timestamp, data
        where message = '" . $module::DATA_POSTED_MESSAGE . "'
        order by log_id desc
    ");
    $rowsExist = false;
    while($row = $result->fetch_assoc()){
        $rowsExist = true;

        ?>
        <tr>
            <td><?=$row['timestamp']?></td>
            <td><textarea readonly onclick='this.select()'><?=htmlentities($row['data'])?></textarea></td>
        </tr>
        <?php
    }

    if(!$rowsExist){
        ?>
        <tr>
            <td></td>
            <td>No data has been posted.</td>
        </tr>
        <?php
    }

    ?>
</table>