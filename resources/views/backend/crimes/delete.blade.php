<!-- DELETE MODAL SECTION -->
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="deleteContent">
					@lang('backend.delete_message'): <span class="dname"></span>?
				</div>
                <div class="modal-footer">
                    <button type="button" id="deltbtn" value="" class="btn btn-danger delete-crime" data-dismiss="modal">
                        <span class='glyphicon glyphicon-trash'></span> @lang('backend.delete')
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> @lang('backend.close')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>