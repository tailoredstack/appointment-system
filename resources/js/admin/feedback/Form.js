import AppForm from '../app-components/Form/AppForm';

Vue.component('feedback-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                content:  '' ,
                patient_id:  '' ,
                
            }
        }
    }

});