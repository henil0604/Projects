<!-- Modal -->
<div class="modal fade" id="addquestionModal" role="dialog" aria-labelledby="addquestionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addquestionModalLabel">Add Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" type="text" class="form-control" require="">
                    </div>
                    <div class="form-group">
                        <label>Discription</label>
                        <textarea name="desc" class="form-control" rows="5" require="" style="min-height: 100px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addQuestion">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>