    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
            </div>
           <div class="modal-body">
                <p>Are you sure want to delete {{$deletename}} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModalDelete()"  class="btn btn-secondary close-btn">Cancel</button>
                <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal">Yes, Delete</button>
            </div>
        </div>
    </div>
