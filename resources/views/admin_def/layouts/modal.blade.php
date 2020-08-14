<div class="modal fade{{ isset($modal_class) ? ' ' . $modal_class : '' }}" id="">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-ajax">
                    @yield('modal')
                </div>
            </div>
        </div>
    </div>
</div>