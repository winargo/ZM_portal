<div class="col-md-12">
    <div class="card-box">
        <h4 class="m-b-20">Audit Trail</h4>
        <table class="table m-0" id="datatable">
            <thead>
                <tr>
                    <th>Start Effective Date</th>
                    <th>Field</th>
                    <th>Old Value</th>
                    <th>New Value</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($auditTrails as $auditTrail) :?>
                <tr>
                    <td><?php echo $auditTrail->creationDate === null ? '' : DateTime::createFromFormat('Y-m-d\TH:i:s.uO', $auditTrail->creationDate)->add(new DateInterval('PT7H'))->format('F j, Y H:i')?></td>
                    <td><?php echo $auditTrail->field?></td>
                    <td><?php echo $auditTrail->valueBefore?></td>
                    <td><?php echo $auditTrail->valueAfter?></td>
                    <td><?php echo $auditTrail->userApp?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
