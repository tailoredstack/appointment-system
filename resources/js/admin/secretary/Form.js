import AppForm from '../app-components/Form/AppForm';

Vue.component('secretary-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                admin_users_id:  '' ,
                email:  '' ,
                first_name:  '' ,
                last_name:  '' ,
                phone_no:  '' ,
                
            }
        }
    }

});