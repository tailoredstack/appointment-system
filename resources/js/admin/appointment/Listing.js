import AppListing from "../app-components/Listing/AppListing";

Vue.component("appointment-listing", {
    mixins: [AppListing],
    methods: {
        clientArrived: function(appointment_id) {
            const $this = this;
            axios
                .post("/admin/activity-logs", {
                    appointment_id: appointment_id,
                    name: "Patient Arrived"
                })
                .then(
                    function(response) {
                        $this.$notify({
                            type: "success",
                            title: "Success!",
                            text: response.data.message
                                ? response.data.message
                                : "Success"
                        });
                    },
                    function(error) {
                        $this.$notify({
                            type: "error",
                            title: "Error!",
                            text: error.response.data.message
                                ? error.response.data.message
                                : "An error has occured."
                        });
                    }
                );
        }
    }
});
