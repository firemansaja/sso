function logout() {
    Swal.fire({
        title: 'Logout',
        text: "Apakah anda yakin ingin keluar dari aplikasi ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!',
        cancelButtonText: 'Tidak jadi'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('logout') }}"
        }
    })
}
