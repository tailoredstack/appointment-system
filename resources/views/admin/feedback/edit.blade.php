@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.feedback.actions.edit', ['name' => $feedback->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <feedback-form
                :action="'{{ $feedback->resource_url }}'"
                :data="{{ $feedback->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.feedback.actions.edit', ['name' => $feedback->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.feedback.components.form-elements', ['mode' => 'edit'])
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </feedback-form>

        </div>
    
</div>

@endsection