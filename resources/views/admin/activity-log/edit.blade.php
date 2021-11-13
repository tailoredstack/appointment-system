@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.activity-log.actions.edit', ['name' => $activityLog->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <activity-log-form
                :action="'{{ $activityLog->resource_url }}'"
                :data="{{ $activityLog->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.activity-log.actions.edit', ['name' => $activityLog->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.activity-log.components.form-elements', ['mode' => 'edit'])
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </activity-log-form>

        </div>
    
</div>

@endsection