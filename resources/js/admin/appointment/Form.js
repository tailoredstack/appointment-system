import AppForm from '../app-components/Form/AppForm';

Vue.component('appointment-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                date:  '' ,
                dentist_id:  '' ,
                end:  '' ,
                remarks:  '' ,
                service_id:  '' ,
                start:  '' ,
                status:  '' ,
                
            }
        }
    }

});