@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.admin-user.actions.show', ['name' => $adminUser->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <admin-user-form
                :action="'{{ $adminUser->resource_url }}'"
                :data="{{ $adminUser->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-show" novalidate>


                    <div class="card-header">
                        <i class="fa fa-eye"></i> Show User
                    </div>

                    <div class="card-body">
                        @include('admin.admin-user.components.form-elements', ['mode' => 'show'])
                    </div>
                </form>

        </admin-user-form>

        </div>

</div>

@endsection
