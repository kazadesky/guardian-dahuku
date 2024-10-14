const passwordShow = (event) => {
    event.preventDefault();
    const inputPassword = document.getElementById("password");
    const iconInput = document.getElementById("icon_pass");

    if (inputPassword.type === "password") {
        inputPassword.type = "text";
        iconInput.innerText = "visibility_off";
        event.classList = "text-sky-600";
    } else {
        inputPassword.type = "password";
        iconInput.innerText = "visibility";
    }
};

const passwordConfirmShow = (event) => {
    event.preventDefault();
    const inputPassword = document.getElementById("password_confirmation");
    const iconInput = document.getElementById("icon_confirm");

    if (inputPassword.type === "password") {
        inputPassword.type = "text";
        iconInput.innerText = "visibility_off";
        event.classList = "text-sky-600";
    } else {
        inputPassword.type = "password";
        iconInput.innerText = "visibility";
    }
};

const profilePreview = (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (event) {
        document.getElementById('preview').src = event.target.result;
        const previewFigure = document.getElementById('preview-figure')
        previewFigure.classList.remove("hidden");
        previewFigure.classList.add("flex");
    };
    reader.readAsDataURL(file);
}

const showMenu = (event) => {
    event.preventDefault();
    const sidebar = document.getElementById('sidebar');
    const dropdown = document.getElementById('dropdown-nav');
    const modalFilter = document.getElementById("modal-filter");

    if (sidebar) {
        sidebar.classList.add('active');
        dropdown.classList.add('hidden');
        // modalFilter.classList.add('hidden');
    }
}

const hideMenu = () => {
    document.getElementById('sidebar').classList.remove('active');
}

const toggleDropdown = (event) => {
    event.preventDefault();
    const dropdown = document.getElementById('dropdown-nav');
    const sidebar = document.getElementById('sidebar');
    const modalFilter = document.getElementById("modal-filter");
    if (dropdown.classList.contains('hidden')) {
        dropdown.classList.remove('hidden');
        dropdown.classList.add('flex');
        sidebar.classList.remove('active');
        // modalFilter.classList.add('hidden');
    } else {
        dropdown.classList.remove('flex');
        dropdown.classList.add('hidden');
    }
};

const bannerAlert = document.getElementById('banner-alert');
if (bannerAlert && !bannerAlert.classList.contains('hidden')) {
    setTimeout(() => {
        bannerAlert.classList.add("hidden");
    }, 5000);
}

const alertDanger = document.querySelector('#alert-danger');
if (alertDanger && !alertDanger.classList.contains('hidden')) {
    setTimeout(() => {
        alertDanger.classList.add('hidden');
    }, 5000);
}
