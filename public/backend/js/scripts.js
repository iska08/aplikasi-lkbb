/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        if (localStorage.getItem("sb|sidebar-toggle") === "true") {
            document.body.classList.toggle("sb-sidenav-toggled");
        }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
        document.getElementById("hidden").style.display = "inline-block";
        document.getElementById("showed").style.display = "none";
    } else {
        x.type = "password";
        document.getElementById("hidden").style.display = "none";
        document.getElementById("showed").style.display = "inline-block";
    }
}

function myFunction2() {
    var x = document.getElementById("password_confirmation");
    if (x.type === "password") {
        x.type = "text";
        document.getElementById("hide").style.display = "inline-block";
        document.getElementById("show").style.display = "none";
    } else {
        x.type = "password";
        document.getElementById("hide").style.display = "none";
        document.getElementById("show").style.display = "inline-block";
    }
}

const btnLogout = document.querySelector(".btnLogout");

if (btnLogout) {
    btnLogout.addEventListener("click", function (event) {
        event.preventDefault();

        Swal.fire({
            title: "Apakah Anda Yakin Ingin Keluar?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Batal!",
            confirmButtonText: "Ya, Keluar!",
        }).then((result) => {
            if (result.isConfirmed) {
                btnLogout.parentElement.submit();
            }
        });
    });
}

const btnDelJenis = document.querySelectorAll(".btnDelJenis");

if (btnDelJenis) {
    btnDelJenis.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            const object = this.dataset.object;

            event.preventDefault();

            Swal.fire({
                title: `Menghapus Jenis Aba-aba "${object}" Akan Menghapus Aba-aba Jenis "${object}" Juga?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batal!",
                confirmButtonText: "Ya, Hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    btn.parentElement.submit();
                }
            });
        });
    });
}

const btnDelPeserta = document.querySelectorAll(".btnDelPeserta");

if (btnDelPeserta) {
    btnDelPeserta.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            const object = this.dataset.object;

            event.preventDefault();

            Swal.fire({
                title: `Menghapus Peserta "${object}" Akan Menghapus Data Anggota Pleton "${object}" Juga?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batal!",
                confirmButtonText: "Ya, Hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    btn.parentElement.submit();
                }
            });
        });
    });
}

const btnDelete = document.querySelectorAll(".btnDelete");

if (btnDelete) {
    btnDelete.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            const object = this.dataset.object;

            event.preventDefault();

            Swal.fire({
                title: `Apakah Anda Yakin Ingin Menghapus ${object}?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batal!",
                confirmButtonText: "Ya, Hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    btn.parentElement.submit();
                }
            });
        });
    });
}
