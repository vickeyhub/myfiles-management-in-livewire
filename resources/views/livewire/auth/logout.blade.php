<div>
    <dialog id="logoutModal" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Are you sure ?</h3>
            <p class="py-4">This action will destroy your session.</p>
            <div class="modal-action">
                <button class="btn btn-error btn-sm text-white" wire:click='logout'>Yes Logout</button>
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn btn-sm">Close</button>
                </form>
            </div>
        </div>
    </dialog>
</div>
