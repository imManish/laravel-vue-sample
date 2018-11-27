<template>
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center"><img src="assets/img/wasel_logo.png" class="img-fluid"></h3>
            <form class="login-form" @submit.prevent="authenticate">
                <div class="form-group" v-if="authError">
                    <p class="error">
                        {{ authError }}
                    </p>
                </div>
                <div class="form-group form-floating-label">
                    <input id="email" v-model="form.email" type="text" class="form-control input-border-bottom" required>
                    <label for="email" class="placeholder">Username</label>
                    <template v-if="errors">
                            <span v-for="(fieldsError, fieldName) in errors" :key="fieldName">
                                    <template v-if="fieldName == 'email'">
                                    <p class="errors" ><strong>{{ fieldsError.join('\n') }} </strong></p>
                                    </template>
                            </span>
                    </template>
                </div>
                <div class="form-group form-floating-label">
                    <input id="password" v-model="form.password" type="password" class="form-control input-border-bottom" required>
                    <label for="password" class="placeholder">Password</label>
                    <div class="show-password">
                        <i class="flaticon-interface"></i>
                    </div>
                        <template v-if="errors">
                            <span v-for="(fieldsError, fieldName) in errors" :key="fieldName">
                                <template v-if="fieldName == 'password'">
                                <p class="errors" ><strong>{{ fieldsError.join('\n') }} </strong></p>
                                </template>
                            </span>
                        </template>
                    </div>
                <div class="row form-sub m-0">
                    <div class="col col-md-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme">Remember Me</label>
                        </div>
                    </div>
                    <div class="col col-md-6 login-forget">
                        <a href="#" class="link">Forget Password ?</a>
                    </div>
                </div>
                <div class="form-action">
                    <input type="submit" class="btn btn-primary btn-rounded btn-login" value="Sign In" />
                    <!--<a type="submit"  href="#" class="btn btn-primary btn-rounded btn-login">Sign In</a>-->
                </div>

            </form>
    </div>
</div>
</template>

<script>
    import {
        login
    } from "../../helpers/auth";
    import validate from "validate.js";

    export default {
        name: "login",
        data() {
            return {
                form: {
                    email: "",
                    password: ""
                },
                error: null,
                errors: null
            };
        },
        methods: {
            authenticate() {
                this.errors = null;
                const constraints = this.getConstraints();
                const errors = validate(this.$data.form, constraints);
                if (errors) {
                    this.errors = errors;
                    return;
                }

                this.$store.dispatch("login");

                login(this.$data.form)
                    .then(res => {
                        this.$store.commit("loginSuccess", res.data);
                        this.$router.push({
                            path: "/"
                        });
                    })
                    .catch(error => {
                        this.$store.commit("loginFailed", {
                            error
                        });
                    });
            },
            getConstraints() {
                return {
                    password: {
                        presence: true,
                        length: {
                            minimum: 6,
                            message: "Must be at least 6 characters long"
                        }
                    },
                    email: {
                        presence: true,
                        email: true
                    }
                };
            }
        },
        computed: {
            authError() {
                return this.$store.getters.authError;
            }
        }
    };
</script>

<style scoped>
    .error {
        text-align: center;
        color: red;
    }

    .errors {
        color: lightcoral;
        border-radius: 5px;
        padding: 21px 0 2px 0;
    }
</style>
