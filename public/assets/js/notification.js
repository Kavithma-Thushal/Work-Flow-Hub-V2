function successNotification(message) {
    Swal.fire({
        text: message,
        icon: 'success',
        background: '#d4edda',
        color: '#155724',
        confirmButtonColor: '#28a745',
        timer: 4000,
        timerProgressBar: true,
        position: 'top-end',
        toast: true
    });
}

function errorNotification(message) {
    Swal.fire({
        text: message,
        icon: 'error',
        background: '#f8d7da',
        color: '#721c24',
        confirmButtonColor: '#dc3545',
        timer: 4000,
        timerProgressBar: true,
        position: 'top-end',
        toast: true
    });
}

function confirmDeletion(callback) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this employee!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            callback();
        }
    });
}
