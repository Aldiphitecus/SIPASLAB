document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('modalHapus');
    var deleteForm = document.getElementById('deleteForm');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var idPemeriksaan = button.getAttribute('data-id');
        deleteForm.action = 'hapus/' + idPemeriksaan;
    });
});