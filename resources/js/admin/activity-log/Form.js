import AppForm from '../app-components/Form/AppForm';

Vue.component('activity-log-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                appointment_id:  '' ,
                
            }
        }
    }

});