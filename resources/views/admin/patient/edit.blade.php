@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.patient.actions.edit', ['name' => $patient->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <patient-form
                :action="'{{ $patient->resource_url }}'"
                :data="{{ $patient->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.patient.actions.edit', ['name' => $patient->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.patient.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </patient-form>

        </div>
    
</div>

@endsection