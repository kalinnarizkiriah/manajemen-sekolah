document.addEventListener("DOMContentLoaded", function() {
    // 1. Pencarian data pada tabel (Profil Guru & Jadwal Guru)
    const searchInput = document.getElementById("searchData");
    const tableRows = document.querySelectorAll("#daftarGuru tr, #daftarJadwal tr, #daftarSiswa tr, #daftarAbsensi tr");
    if (searchInput) {
        searchInput.addEventListener("input", function() {
            const keyword = this.value.toLowerCase().trim();

            tableRows.forEach(function(row) {
                const cell = row.querySelector("td:nth-child(2)");
                const namaGuru = cell ? cell.textContent.toLowerCase() : "";

                row.style.display = namaGuru.includes(keyword) ? "" : "none";
            });
        });
    }

    // 2. Validasi nomor telepon
    const telpInput = document.getElementById("no_telepon");

    if (telpInput) {
        telpInput.addEventListener("input", function() {
            if (this.value !== "" && Number(this.value) < 0) {
                this.setCustomValidity("Nomor telepon tidak boleh kurang dari nol.");
            } else {
                this.setCustomValidity("");
            }
        });
    }
});