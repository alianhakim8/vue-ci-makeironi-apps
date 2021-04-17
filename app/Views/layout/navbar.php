<script type="text/x-template" id="modal-template">
    <transition name="modal">
    <div class="modal-mask"  @click.self>
        <div class="modal-wrapper">
            <div class="modal-container">

                <!-- <div class="modal-header">
                    <slot name="header">
                        
                    </slot>
                </div> -->

                <div class="modal-body">
                    <slot name="body">
                   
                    </slot>
                </div>

                <!-- <div class="modal-footer">
                    <slot name="footer">
                        default footer
                        <button class="modal-default-button" @click="$emit('close')">
                            OK
                        </button>
                    </slot>
                </div> -->
            </div>
        </div>
    </div>
</transition>
</script>

<script type="text/x-template" id="modal-template-register">
    <transition name="modal">
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">

                <!-- <div class="modal-header">
                    <slot name="header">
                        
                    </slot>
                </div> -->

                <div class="modal-body">
                    <slot name="body">
                   
                    </slot>
                </div>

                <!-- <div class="modal-footer">
                    <slot name="footer">
                        default footer
                        <button class="modal-default-button" @click="$emit('close')">
                            OK
                        </button>
                    </slot>
                </div> -->
            </div>
        </div>
    </div>
</transition>
</script>

<!-- first navbar -->

<div id="appLogin">
    <nav class="navbar navbar-expand-lg navbar-light top-nav">
        <div class="container">
            <p id="phone-number">+62 851 5645 xxxx</p>
            <p id="response-text">Fast Response : 08.00 - 21.00 WIB</p>
            <p id="email">makeironi.web@makeironi.com</p>
        </div>
    </nav>

    <!-- second navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-green p-4">
        <div class="container">
            <a class="navbar-brand" href="/">Make I Roni</a>
            <button class="navbar-toggler order-first" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">About</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a id="show-modal" @click="showModal = true" class="nav-link login-link"><strong>Login</strong></a>
                    </li>
                    <li class="cart-desktop">
                        <button type="button" class="btn btn-yellow">Cart <span class="badge text-dark">0</span></button>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto cart-mobile">
                <li>
                    <button type="button" class="btn btn-yellow"><span class="badge badge-dark">0</span></button>
                </li>
            </ul>
        </div>
        <modal v-if="showModal" @close="showModal = false">

            <div slot="body">
                <button class="modal-default-button" @click='hide'>x</button>
                <h3 class="mb-3">Login</h3>
                <hr>
                <input type=" text" placeholder="Email" class="form-control" v-model='formLogin.email'>
                <input type="password" placeholder="Password" class="form-control mt-3 mb-3" v-model='formLogin.password'>
                <button class="btn btn-warning w-100" @click='login'>Login</button>
                <button class="btn btn dark w-100" id="show-modal-register" @click="hideLogin">Register</button>
                <div class="text-center">
                    <p>Or</p>
                    <button class="btn btn-light"><i class="fa fa-google"></i> Sign in with Google</button>
                </div>
            </div>

        </modal>

        <modal v-if="showModalRegister" @close="showModalRegister = false">

            <div slot="body">
                <button class="modal-default-button" @click='hide'>X</button>

                <h3 class="mb-3">Register</h3>
                <hr>
                <input type=" text" placeholder="Name" class="form-control mt-3 mb-3">
                <input type=" text" placeholder="Email" class="form-control">
                <input type="password" placeholder="Password" class="form-control mt-3 mb-3">
                <input type="text-area" placeholder="Alamat" class="form-control mt-3 mb-3">
                <input type="text" placeholder="No.Hp" class="form-control mt-3 mb-3">
                <input type="date" placeholder="Tanggal Lahir" class="form-control mt-3 mb-3">
                <button class="btn btn-warning w-100">Register</button>
                <div class="text-center">
                    <p>Or</p>
                    <button class="btn btn-light"><i class="fa fa-google"></i> Sign in with Google</button>
                </div>
            </div>

        </modal>
</div>
</nav>
</div>

<script>
    // register modal component
    Vue.component("modal", {
        template: "#modal-template"
    });
    Vue.component("modal", {
        template: "#modal-template-register"
    });

    // start app
    new Vue({
        el: "#appLogin",
        data: {
            showModal: false,
            showModalRegister: false,
            formLogin: {
                name: null,
                email: null,
                password: null,
                alamat: null,
                noHP: null,
                tanggalLahir: null
            }
        },
        methods: {
            hideLogin() {
                this.showModal = false;
                this.showModalRegister = true;
            },
            hide() {
                this.showModal = false;
                this.showModalRegister = false
                this.formLogin.email = ''
                this.formLogin.password = ''
            },
            login() {
                alert(this.formLogin.email);
            },
            register() {

            }
        }
    });
</script>