<!DOCTYPE html>
<html>

<head>
    
</head>

<body>

    <div><a href="#myModal" data-toggle="modal" id="1" data-target="#edit-modal">Edit 1</a></div>
    <div><a href="#myModal" data-toggle="modal" id="2" data-target="#edit-modal">Edit 2</a></div>
    <div><a href="#myModal" data-toggle="modal" id="3" data-target="#edit-modal">Edit 3</a></div>

    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body edit-content">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#edit-modal').on('show.bs.modal', function(e) {
            
            var $modal = $(this),
                esseyId = e.relatedTarget.id;
            
//            $.ajax({
//                cache: false,
//                type: 'POST',
//                url: 'backend.php',
//                data: 'EID='+essay_id,
//                success: function(data) 
//                {
                    $modal.find('.edit-content').html(esseyId);
//                }
//            });
            
        })
    </script>

</body>

</html>
