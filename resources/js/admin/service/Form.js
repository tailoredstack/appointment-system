import AppForm from '../app-components/Form/AppForm';

Vue.component('service-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                description:  '' ,
                duration:  '' ,
                name:  '' ,
                price:  '' ,
                
            }
        }
    }

});