function submitForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    var successMessage = document.getElementById('success-message');

    if (name && email && message) {
        // Simpan logika pengiriman formulir ke server di sini
        // Misalnya, Anda bisa menggunakan AJAX atau mengarahkan pengguna ke halaman "Terima kasih"

        // Contoh sederhana untuk menampilkan pesan sukses
        successMessage.innerHTML = 'Form submitted successfully!';
        clearForm();
    } else {
        successMessage.innerHTML = 'Please fill in all fields.';
    }
}

function clearForm() {
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('message').value = '';
    setTimeout(function () {
        document.getElementById('success-message').innerHTML = '';
    }, 3000);
}
