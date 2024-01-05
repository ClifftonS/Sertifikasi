<div class="modal fade" id="Deletebuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-confirm">
        <div class="modal-content">
            <form method="post" action="/deletebuku">
                @csrf
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="fa-solid fa-x" style="height: 100%; weight:100%;"></i>
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <input type="hidden" name="idDelete" id="idDelete">
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary"aria-label="Close"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#Deletebuku').on('show.bs.modal', function(e) {
        var idbuku = $(e.relatedTarget).data('id').idbuku;
        $(e.currentTarget).find('input[id="idDelete"]').val(idbuku);
    });
</script>
