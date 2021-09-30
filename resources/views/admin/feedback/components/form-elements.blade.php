@if($mode === 'create')

<div class="form-group row align-items-center hidden" :class="{'has-danger': errors.has('patient_id'), 'has-success': fields.patient_id && fields.patient_id.valid }">
    <label for="patient_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.patient_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.patient_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('patient_id'), 'form-control-success': fields.patient_id && fields.patient_id.valid}" id="patient_id" name="patient_id" placeholder="{{ trans('admin.feedback.columns.patient_id') }}">
        <div v-if="errors.has('patient_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('patient_id') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('content'), 'has-success': fields.content && fields.content.valid }">
    <label for="content" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.content') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.content" v-validate="'required'" id="content" name="content"></textarea>
        </div>
        <div v-if="errors.has('content')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('content') }}</div>
    </div>
</div>

@endif

@if($mode === 'edit')

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('content'), 'has-success': fields.content && fields.content.valid }">
    <label for="content" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.content') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.content" v-validate="'required'" id="content" name="content"></textarea>
        </div>
        <div v-if="errors.has('content')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('content') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('patient_id'), 'has-success': fields.patient_id && fields.patient_id.valid }">
    <label for="patient_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.patient_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.patient_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('patient_id'), 'form-control-success': fields.patient_id && fields.patient_id.valid}" id="patient_id" name="patient_id" placeholder="{{ trans('admin.feedback.columns.patient_id') }}">
        <div v-if="errors.has('patient_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('patient_id') }}</div>
    </div>
</div>



@endif

@if($mode === 'show')

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('content'), 'has-success': fields.content && fields.content.valid }">
    <label for="content" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.feedback.columns.content') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span v-text="form.content" />
    </div>
</div>

@endif
