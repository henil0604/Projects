<!-- Modal -->
<div class="modal fade" id="addanswerModal" role="dialog" aria-labelledby="addanswerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addanswerModalLabel">Give Answere</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Answer</label>
                        <textarea name="ans" class="form-control" rows="7" require="" style="min-height: 100px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addanswer">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>