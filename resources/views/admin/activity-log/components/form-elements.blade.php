@if($mode === 'create')

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('appointment_id'), 'has-success': fields.appointment_id && fields.appointment_id.valid }">
    <label for="appointment_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.activity-log.columns.appointment_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.appointment_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('appointment_id'), 'form-control-success': fields.appointment_id && fields.appointment_id.valid}" id="appointment_id" name="appointment_id" placeholder="{{ trans('admin.activity-log.columns.appointment_id') }}">
        <div v-if="errors.has('appointment_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('appointment_id') }}</div>
    </div>
</div>


@endif

@if($mode === 'edit')

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('appointment_id'), 'has-success': fields.appointment_id && fields.appointment_id.valid }">
    <label for="appointment_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.activity-log.columns.appointment_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.appointment_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('appointment_id'), 'form-control-success': fields.appointment_id && fields.appointment_id.valid}" id="appointment_id" name="appointment_id" placeholder="{{ trans('admin.activity-log.columns.appointment_id') }}">
        <div v-if="errors.has('appointment_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('appointment_id') }}</div>
    </div>
</div>



@endif

@if($mode === 'show')

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('appointment_id'), 'has-success': fields.appointment_id && fields.appointment_id.valid }">
    <label for="appointment_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.activity-log.columns.appointment_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.appointment_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('appointment_id'), 'form-control-success': fields.appointment_id && fields.appointment_id.valid}" id="appointment_id" name="appointment_id" placeholder="{{ trans('admin.activity-log.columns.appointment_id') }}">
        <div v-if="errors.has('appointment_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('appointment_id') }}</div>
    </div>
</div>



@endif