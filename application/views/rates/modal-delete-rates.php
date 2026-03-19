<div id="deleteModal<?php echo $id?>" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete <?php echo $name?></h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12 text-center">
                    <form action="rates/delete" method="post" style="display:inline">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="hidden" name="apiId" value="<?php echo $id?>">
                        <input type="hidden" name="category" value="<?php echo $category?>">
                        <input type="hidden" name="partnerId" value="<?php echo $partnerId?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>