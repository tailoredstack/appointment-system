@if($mode === 'show')
<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('dentist_id'), 'has-success': fields.dentist_id && fields.dentist_id.valid }">
    <label for="dentist_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.dentist_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span>{{$appointment->dentist->full_name}}</span>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('service_id'), 'has-success': fields.service_id && fields.service_id.valid }">
    <label for="service_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.service_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span>{{$appointment->service->name}}</span>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('date'), 'has-success': fields.date && fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        {{$appointment->date}}
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('start'), 'has-success': fields.start && fields.start.valid }">
    <label for="start" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.start') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span>{{$appointment->start}}</span>
    </div>
</div>


<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('end'), 'has-success': fields.end && fields.end.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.end') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span>{{$appointment->end}}</span>
    </div>
</div>


<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.status') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span class="badge text-uppercase"
            :class="{ 'badge-success': form.status === 'accepted', 'badge-danger': form.status === 'rejected', 'badge-warning': form.status === 'cancelled', 'badge-info': form.status === 'pending' }">{{$appointment->status}}</span>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('remarks'), 'has-success': fields.remarks && fields.remarks.valid }">
    <label for="remarks" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.remarks') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span v-text="'{{$appointment->remarks}}'||'No remarks available'"></span>
    </div>
</div>

@endif


@if($mode === 'edit')
<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('dentist_id'), 'has-success': fields.dentist_id && fields.dentist_id.valid }">
    <label for="dentist_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.dentist_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span>{{$appointment->dentist->full_name}}</span>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('service_id'), 'has-success': fields.service_id && fields.service_id.valid }">
    <label for="service_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.service_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span>{{$appointment->service->name}}</span>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('date'), 'has-success': fields.date && fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        {{$appointment->date}}
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('start'), 'has-success': fields.start && fields.start.valid }">
    <label for="start" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.start') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span>{{$appointment->start}}</span>
    </div>
</div>


<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('end'), 'has-success': fields.end && fields.end.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.end') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <span>{{$appointment->end}}</span>
    </div>
</div>


<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.status') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        @if(in_array($appointment->status, ['pending', 'accepted']))
        <select v-model="form.status" v-validate="'required'" @input="validate($event)"
            class="form-control custom-select"
            :class="{'form-control-danger': errors.has('status'), 'form-control-success': fields.status && fields.status.valid}"
            id="status" name="status" placeholder="{{ trans('admin.appointment.columns.status') }}">
            @if($appointment->status === 'pending')
            @if($owner)
            <option value="pending">PENDING</option>
            <option value="cancelled">CANCEL</option>
            @else
            <option value="pending">PENDING</option>
            <option value="cancelled">CANCEL</option>
            <option value="rejected">REJECT</option>
            <option value="accepted">ACCEPT</option>
            @endif
            @elseif($appointment->status === 'accepted')
            <option value="cancelled">CANCEL</option>
            <option value="accepted">ACCEPT</option>\
            <option value="done">DONE</option>
            @endif
        </select>
        @else
        <span></span>
        @endif
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}
        </div>
    </div>
</div>

<div v-if="form.status !== 'pending'" class="form-group row align-items-center"
    :class="{'has-danger': errors.has('remarks'), 'has-success': fields.remarks && fields.remarks.valid }">
    <label for="remarks" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.remarks') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.remarks"
                v-validate.immediate="'required_if:status,rejected,cancelled'" id="remarks" name="remarks"></textarea>
        </div>
        <div v-if="errors.has('remarks')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('remarks') }}
        </div>
    </div>
</div>
@endif



@if($mode === 'create')
<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('dentist_id'), 'has-success': fields.dentist_id && fields.dentist_id.valid }">
    <label for="dentist_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.dentist_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.dentist_id" v-validate="'required'" @input="validate($event)"
            class="form-control custom-select"
            :class="{'form-control-danger': errors.has('dentist_id'), 'form-control-success': fields.dentist_id && fields.dentist_id.valid}"
            id="dentist_id" name="dentist_id" placeholder="{{ trans('admin.appointment.columns.dentist_id') }}">
            @foreach ($dentists as $dentist)
            <option value="{{$dentist['id']}}">{{$dentist['name']}}</option>
            @endforeach
        </select>
        <div v-if="errors.has('dentist_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('dentist_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('service_id'), 'has-success': fields.service_id && fields.service_id.valid }">
    <label for="service_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.service_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.service_id" v-model="form.service_id" v-validate="'required|integer'"
            @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('service_id'), 'form-control-success': fields.service_id && fields.service_id.valid}"
            id="service_id" name="service_id" placeholder="{{ trans('admin.appointment.columns.service_id') }}">
            @foreach ($services as $service)
            <option value="{{$service['id']}}">{{$service['name']}}</option>
            @endforeach
        </select>
        <div v-if="errors.has('service_id')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('service_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('date'), 'has-success': fields.date && fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date" :config="datePickerConfig"
                v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                :class="{'form-control-danger': errors.has('date'), 'form-control-success': fields.date && fields.date.valid}"
                id="date" name="date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}">
            </datetime>
        </div>
        <div v-if="errors.has('date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('start'), 'has-success': fields.start && fields.start.valid }">
    <label for="start" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.start') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.start" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'"
                class="flatpickr"
                :class="{'form-control-danger': errors.has('start'), 'form-control-success': fields.start && fields.start.valid}"
                id="start" name="start" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}">
            </datetime>
        </div>
        <div v-if="errors.has('start')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start') }}
        </div>
    </div>
</div>


<div class="form-group row align-items-center"
    :class="{'has-danger': errors.has('end'), 'has-success': fields.end && fields.end.valid }">
    <label for="end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.appointment.columns.end') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
            <datetime v-model="form.end" :config="timePickerConfig" v-validate="'required|date_format:HH:mm:ss'"
                class="flatpickr"
                :class="{'form-control-danger': errors.has('end'), 'form-control-success': fields.end && fields.end.valid}"
                id="end" name="end" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_time') }}">
            </datetime>
        </div>
        <div v-if="errors.has('end')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end') }}</div>
    </div>
</div>

@endif
