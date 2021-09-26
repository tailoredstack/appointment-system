@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.appointment.actions.edit', ['name' => $appointment->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <appointment-form
                :action="'{{ $appointment->resource_url }}'"
                :data="{{ $appointment->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.appointment.actions.edit', ['name' => $appointment->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.appointment.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </appointment-form>

        </div>
    
</div>

@endsection