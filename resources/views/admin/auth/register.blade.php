@extends('brackets/admin-ui::admin.layout.master')

@section('title', 'Register')

@section('content')
<div class="container" id="app">
    <div class="row align-items-center justify-content-center auth">
        <div class="col-md-6 col-lg-5">
            <div class="card">
                <div class="card-block">
                    <auth-form :action="'{{ url('/admin/register') }}'" :data="{}" inline-template>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}"
                            novalidate>
                            {{ csrf_field() }}
                            <div class="auth-header">
                                <h1 class="auth-title">Register</h1>
                                <p class="auth-subtitle">Create new account</p>
                            </div>
                            <div class="auth-body">
                                <input type="hidden" name="from_registration_page" :value="1" />
                                <input type="hidden" name="roles" :value="2" />
                                <input type="hidden" name="language" value="en" />
                                <input type="hidden" name="forbidden" :value="0" />
                                @include('brackets/admin-auth::admin.auth.includes.messages')
                                <!-- Firstname -->
                                <div class="form-group"
                                    :class="{'has-danger': errors.has('first_name'), 'has-success': fields.first_name && fields.first_name.valid }">
                                    <label for="first_name">Firstname</label>
                                    <div class="input-group input-group--custom">
                                        <div class="input-group-addon"><i class="input-icon input-icon--user"></i></div>
                                        <input type="text" v-model="form.first_name" v-validate="'required'"
                                            class="form-control"
                                            :class="{'form-control-danger': errors.has('first_name'), 'form-control-success': fields.first_name && fields.first_name.valid}"
                                            id="first_name" name="first_name" placeholder="Given name">
                                    </div>
                                    <div v-if="errors.has('first_name')" class="form-control-feedback form-text"
                                        v-cloak>@{{ errors.first('first_name') }}</div>
                                </div>
                                <!-- Last name -->
                                <div class="form-group"
                                    :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
                                    <label for="last_name">Lastname</label>
                                    <div class="input-group input-group--custom">
                                        <div class="input-group-addon"><i class="input-icon input-icon--user"></i></div>
                                        <input type="text" v-model="form.last_name" v-validate="'required'"
                                            class="form-control"
                                            :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': fields.last_name && fields.last_name.valid}"
                                            id="last_name" name="last_name" placeholder="Surname">
                                    </div>
                                    <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>
                                        @{{ errors.first('last_name') }}</div>
                                </div>

                                <!-- Phone -->

                                <div class="form-group"
                                    :class="{'has-danger': errors.has('phone_no'), 'has-success': fields.phone_no && fields.phone_no.valid }">
                                    <label for="phone_no">Phone No</label>
                                    <div class="input-group input-group--custom">
                                        <div class="input-group-addon"><i class="input-icon input-icon--phone"></i>
                                        </div>
                                        <input type="text" v-model="form.phone_no" v-validate="'required'"
                                            class="form-control"
                                            :class="{'form-control-danger': errors.has('phone_no'), 'form-control-success': fields.phone_no && fields.phone_no.valid}"
                                            id="phone_no" name="phone_no" placeholder="Phone Number">
                                    </div>
                                    <div v-if="errors.has('phone_no')" class="form-control-feedback form-text" v-cloak>
                                        @{{ errors.first('phone_no') }}</div>
                                </div>

                                <!-- Email -->
                                <div class="form-group"
                                    :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
                                    <label for="email">{{ trans('brackets/admin-auth::admin.auth_global.email')
                                        }}</label>
                                    <div class="input-group input-group--custom">
                                        <div class="input-group-addon"><i class="input-icon input-icon--mail"></i></div>
                                        <input type="text" v-model="form.email" v-validate="'required|email'"
                                            class="form-control"
                                            :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}"
                                            id="email" name="email"
                                            placeholder="{{ trans('brackets/admin-auth::admin.auth_global.email') }}">
                                    </div>
                                    <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{
                                        errors.first('email') }}</div>
                                </div>

                                <!-- Password -->
                                <div class="form-group"
                                    :class="{'has-danger': errors.has('password'), 'has-success': fields.password && fields.password.valid }">
                                    <label for="password">{{ trans('brackets/admin-auth::admin.auth_global.password')
                                        }}</label>
                                    <div class="input-group input-group--custom">
                                        <div class="input-group-addon"><i class="input-icon input-icon--lock"></i></div>
                                        <input type="password" v-model="form.password" class="form-control"
                                            :class="{'form-control-danger': errors.has('password'), 'form-control-success': fields.password && fields.password.valid}"
                                            id="password" name="password"
                                            placeholder="{{ trans('brackets/admin-auth::admin.auth_global.password') }}">
                                    </div>
                                    <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>
                                        @{{ errors.first('password') }}</div>
                                </div>

                                <div class="form-group"
                                    :class="{'has-danger': errors.has('password_confirmation'), 'has-success': fields.password_confirmation && fields.password_confirmation.valid }">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <div class="input-group input-group--custom">
                                        <div class="input-group-addon"><i class="input-icon input-icon--lock"></i></div>
                                        <input type="password" v-model="form.password_confirmation" class="form-control"
                                            :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': fields.password_confirmation && fields.password_confirmation.valid}"
                                            id="password_confirmation" name="password_confirmation"
                                            placeholder="Confirm password">
                                    </div>
                                    <div v-if="errors.has('password_confirmation')"
                                        class="form-control-feedback form-text" v-cloak>
                                        @{{ errors.first('password_confirmation') }}</div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="remember" value="1">
                                    <button type="submit" class="btn btn-primary btn-block btn-spinner"><i
                                            class="fa"></i> Register</button>
                                </div>
                                <div class="form-group text-center">
                                    <a href="{{ url('/admin/signin') }}" class="auth-ghost-link">Already have an
                                        account?
                                        Login</a>
                                </div>
                            </div>
                        </form>
                    </auth-form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('bottom-scripts')
<script type="text/javascript">
    // fix chrome password autofill
    // https://github.com/vuejs/vue/issues/1331
    document.getElementById('password').dispatchEvent(new Event('input'));
</script>
@endsection
