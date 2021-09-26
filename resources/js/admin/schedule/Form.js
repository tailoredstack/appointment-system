import AppForm from '../app-components/Form/AppForm';

Vue.component('schedule-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                date:  '' ,
                dentist_id:  '' ,
                end:  '' ,
                start:  '' ,
                
            }
        }
    }

});