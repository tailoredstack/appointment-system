@if($mode !== 'show')

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.patient.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}"
            id="email" name="email" placeholder="{{ trans('admin.patient.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('first_name'), 'has-success': fields.first_name && fields.first_name.valid }">
    <label for="first_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.patient.columns.first_name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.first_name" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('first_name'), 'form-control-success': fields.first_name && fields.first_name.valid}"
            id="first_name" name="first_name" placeholder="{{ trans('admin.patient.columns.first_name') }}">
        <div v-if="errors.has('first_name')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('first_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
    <label for="last_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.patient.columns.last_name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.last_name" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': fields.last_name && fields.last_name.valid}"
            id="last_name" name="last_name" placeholder="{{ trans('admin.patient.columns.last_name') }}">
        <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('last_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('phone_no'), 'has-success': fields.phone_no && fields.phone_no.valid }">
    <label for="phone_no" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.patient.columns.phone_no') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone_no" v-validate="'required'" @input="validate($event)"
            class="form-control"
            :class="{'form-control-danger': errors.has('phone_no'), 'form-control-success': fields.phone_no && fields.phone_no.valid}"
            id="phone_no" name="phone_no" placeholder="{{ trans('admin.patient.columns.phone_no') }}">
        <div v-if="errors.has('phone_no')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone_no')
            }}</div>
    </div>
</div>


@elseif($mode === 'show')

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('first_name'), 'has-success': fields.first_name && fields.first_name.valid }">
    <label for="first_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.patient.columns.first_name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span v-text="form.first_name" />
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
    <label for="last_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.patient.columns.last_name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span v-text="form.last_name" />
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.patient.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span v-text="form.email" />
    </div>
</div>


<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('phone_no'), 'has-success': fields.phone_no && fields.phone_no.valid }">
    <label for="phone_no" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.patient.columns.phone_no') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span v-text="form.phone_no" />
    </div>
</div>

@endif
