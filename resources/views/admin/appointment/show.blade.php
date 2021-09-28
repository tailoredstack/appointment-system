@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.appointment.actions.edit', ['name' => $appointment->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <appointment-form
                action=""
                v-cloak
                :data="{{ $appointment->toJson() }}"
                inline-template>

                <form class="form-horizontal form-edit" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.appointment.actions.show', ['name' => $appointment->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.appointment.components.form-elements', ['mode' => 'show'])
                    </div>


                    <div class="card-footer">
                        <a href="{{$appointment->resource_url."/edit"}}" class="btn btn-spinner btn-primary {{!in_array($appointment->status, ['pending', 'accepted']) ? 'disabled' : ''}}">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-edit'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.edit') }}
                        </a>
                    </div>

                </form>

        </appointment-form>

        </div>

</div>

@endsection
