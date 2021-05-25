let auth = new Vue({
    el: "#appLogin",
    data: {
        user: {
            name: "",
            email: "",
            password: "",
            alamat: "",
            phone_number: "",
            tanggal_lahir: "",
            // gender: "",
            email: "",
        },
        logged_in: false,
        error: false,
        errorMessage: "",
        passwordFieldType: "password",
        carts: 0,
        phone_number: '+62 821-6854-0447',
        merchant_email: 'makeironie@gmail.com'
    },
    mounted() {
        this.logged_in = localStorage.getItem("email");
        // axios
        //     .get("/user/auth/check_user/" + this.logged_in)
        //     .then((response) => {
        //         // console.log(response.data);
        //         console.log(response.data.logged_in);
        //     })
        //     .catch(function (error) {
        //         if (error.response) {
        //             // Request made and server responded
        //             // console.log(error.response.data);
        //             // console.log(error.response.status);
        //             // console.log(error.response.headers);
        //             console.log(error.response.data.logged_in);
        //         } else if (error.request) {
        //             // The request was made but no response was received
        //             console.log(error.request);
        //         } else {
        //             // Something happened in setting up the request that triggered an Error
        //             console.log("Error", error.message);
        //         }
        //     });
        this.cart_count();
    },
    created() {
        axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    },
    methods: {
        loginMethod() {
            if (this.user.email == "" || this.user.password == "") {
                this._data.error = true;
                this._data.errorMessage = "Harap lengkapi data";
            } else {
                axios
                    .post("/user/auth/login", {
                        email: this.user.email,
                        password: this.user.password,
                    })
                    .then(function (response) {
                        if (response.data.code == 201) {
                            localStorage.setItem("id", response.data.id);
                            localStorage.setItem("email", response.data.email);
                            localStorage.setItem("name", response.data.name);
                            localStorage.setItem('token', response.data.token);
                            login.reloadPage();
                        }
                    })
                    .catch(function (error) {
                        if (error.response) {
                            // Request made and server responded
                            //   console.log(error.response.data);
                            //   console.log(error.response.status);
                            //   console.log(error.response.headers);
                            auth._data.error = true;
                            auth._data.errorMessage = error.response.data.message;
                        } else if (error.request) {
                            // The request was made but no response was received
                            console.log(error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log("Error", error.message);
                        }
                    });
            }
        },
        register: function () {
            if (
                this.user.name == "" ||
                this.user.email == "" ||
                this.user.password == "" ||
                this.user.alamat == "" ||
                this.user.phone_number == "" ||
                this.user.tanggal_lahir == ""
            ) {
                this.error = true;
                this.errorMessage = "Harap lengkapi data";
            } else if (this.validateEmail(this.user.email)) {
                axios
                    .post("/user/auth/register", {
                        name: this.user.name,
                        email: this.user.email,
                        password: this.user.password,
                        alamat: this.user.alamat,
                        no_hp: this.user.phone_number,
                        tanggal_lahir: this.user.tanggal_lahir,
                    })
                    .then(function (response) {
                        Swal.fire({
                            icon: "success",
                            title: `${response.data.message} Silahkan Login`,
                        });
                    })
                    .catch(function (error) {
                        if (error.response) {
                            // // Request made and server responded
                            console.log(error.response.data);
                            console.log(error.response.status);
                            console.log(error.response.headers);
                            alert("Email sudah terdaftar");
                        } else if (error.request) {
                            // The request was made but no response was received
                            console.log(error.request);
                            // alert('Email sudah terdaftar');
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            console.log("Error", error.message);
                            alert(error.message);
                        }
                    });
            }
        },
        logout: function () {
            Swal.fire({
                title: "Keluar ?",
                confirmButtonText: `Ya`,
                showDenyButton: true,
                denyButtonText: `Tidak`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    localStorage.removeItem("email");
                    localStorage.removeItem("id");
                    localStorage.removeItem("name");
                    this.reloadPage();
                    window.location.href = "/";
                }
            });
        },
        reloadPage() {
            window.location.reload();
        },
        cart_count() {
            const id_customer = localStorage.getItem("id");
            axios.get("/user/cart/count/" + id_customer).then((response) => {
                this.carts = response.data;
            });
        },
        validateEmail(email) {
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
                return (true)
            }
            alert('Email yang dimasukkan tidak valid');
            return (false)
        },
        loginTest: function () {
            alert('jalan');
        }
    },
});