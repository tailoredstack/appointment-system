import AppForm from '../app-components/Form/AppForm';

Vue.component('secretary-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});