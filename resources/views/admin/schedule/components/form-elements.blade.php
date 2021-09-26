<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date'), 'has-success': fields.date && fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.schedule.columns.date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('date'), 'form-control-success': fields.date && fields.date.valid}" id="date" name="date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end'), 'has-success': fields.end && fields.end.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.schedule.columns.end') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.end" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end'), 'form-control-success': fields.end && fields.end.valid}" id="end" name="end" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('end')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start'), 'has-success': fields.start && fields.start.valid }">
    <label for="start" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.schedule.columns.start') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.start" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start'), 'form-control-success': fields.start && fields.start.valid}" id="start" name="start" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start') }}</div>
    </div>
</div>



