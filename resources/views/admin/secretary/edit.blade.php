@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.secretary.actions.edit', ['name' => $secretary->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <secretary-form
                :action="'{{ $secretary->resource_url }}'"
                :data="{{ $secretary->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.secretary.actions.edit', ['name' => $secretary->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.secretary.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </secretary-form>

        </div>
    
</div>

@endsection